/*
 * http://www.sceneario.com 2012
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright ©madeforweb2012
 */
var isMobile = false;

$(document).ready(function() {
    isMobile = navigator.userAgent.match(/(iPad|iPhone|iPod|Android|webOS)/g) ? true : false;

    var URLsTabs = new Array('newalbum', 'recentalbum' , 'mostviewed' , 'coupdecoeur' );

    // CHARGEMENT ASYNCHRONE DES IMAGES
    //$("img.lazy").show().lazyload();
    $("img.lazy").lazyload({
        //skip_invisible : false,
        effect : "fadeIn"
    });

    $("img:below-the-fold").lazyload({
        event : "sporty"
    });

    $('.concours #form_questions').submit(function(e) {
        var $form = $(this);
        var values = $("input.concours_reponses").map(function() {
            return $(this).val();
        }).get();

        var emptyFields = new Array();
        for (var i in values) {
            var value = values[i];
            if ($.trim(value) == '') {
                emptyFields.push(value);
                $form.find('.error').html('Vous n\'avez pas indiqu&eacute; de r&eacute;ponse').show();
                break;
            }
        }

        if (emptyFields.length > 0 ) {
            e.preventDefault();
            return false;
        }
    });

    $('.concours #form_coord').submit(function(e) {
        var $form = $(this);
        var values = $("input.participant_details").map(function() {
            return $(this).val();
        }).get();

        var emptyFields = new Array();
        for (var i in values) {
            var value = values[i];
            if ($.trim(value) == '') {
                emptyFields.push(value);
                $form.find('.error').html('Veuillez remplir tous les champs').show();
                break;
            }

            if (!checkUserRecipient($('#email').val()) || !checkUserRecipient($('#email2').val())) {
                emptyFields.push('mail_syntax_failed');
                $form.find('.error').html('L\'adresse email que vous avez indiqu&eacute; n\'est pas valide').show();
                break;
            } else {
                if ($('#email').val() != $('#email2').val()) {
                    emptyFields.push('mail_comparison_failed');
                    $form.find('.error').html('Les adresses emails ne sont pas identiques').show();
                }
            }
        }

        if (emptyFields.length > 0 ) {
            e.preventDefault();
            return false;
        }
    });

    $('.contact').on('submit', '.form-contact', function(e) {
        e.preventDefault();
        e.stopPropagation();

        var $form   = $(e.currentTarget),
             url    = $form.attr('action'),
             status = 'data-is-loading';

        if ($form.attr(status)) return;
        $form.attr(status, true);

        $.ajax({
            type: 'POST',
            url : url,
            data: $form.serialize(),
            dataType: 'json'
        }).done(function(response) {
            isLoading = false;
            if (response != null && response != '') {
                if(response.status) {
                    if(response.msg) {
                        $form.empty().append('<p class="success">' + response.msg + '</p>');
                    }
                } else {
                    $form.replaceWith(response.form);
                }
            }
        }).complete(function() {
                $form.removeAttr(status);
        });
    });

    // tabs sur la home
    $('.onglet-home-bd').each(function(i) {
        var btName = '.tab_' + (i + 1);

        $(btName).click(function() {
            homeTabsOptions('/index/' + URLsTabs[i], btName );
        });
    });

    // Le header ne doit pas se fixer sur IE7 et inférieur (problème de z-index sinon)
    if (!isMobile && (getInternetExplorerVersion() > 7.0 || getInternetExplorerVersion() == -1)) {
        $(window).scroll(function () {
            // On récupère la hauteur de la bannière de pub comme debut du scroll
            debut = $("#pub").height();
            // On recupere la coordonnee du scroll
            var scrollVar = $(window).scrollTop();

            // Si on depasse la coordonnÃ©e du debut du stick,
            // on passe l'element en position fixed avec la marge en top
            if(scrollVar >= debut) {
                $("#main-head").css({position:"fixed",top:0,zIndex:5000});
                //$("#head").css({paddingTop:"5px",paddingBottom:"5px"});
            }
            // Si on est avant le début du stick, par exemple si on remonte la page,
            // on remet la position a fixes et la marge en top.
            // On remet aussi en right:0 puisqu'on est revenu en absolute
            if(scrollVar < debut) {
                $("#main-head").css({position:"absolute",top:"auto",zIndex:5000});
                //$("#head").css({paddingTop:"15px",paddingBottom:"15px"});
            }
        });
    }

    $("div#infobar a.close").click(function(e) {
        $(this).parent().hide();
        e.preventDefault();
        return false;
    });

    $("div.rightSide div.icons a").mouseover(function() {
        if ($(this).attr('class') == undefined || $(this).attr('class') == 'off') {
            $(this).css({backgroundPositionY : -29});
        }
    });

    $("div.rightSide div.icons a").mouseout(function() {
        if ($(this).attr('class') == undefined || $(this).attr('class') == 'off') {
            $(this).css({ backgroundPositionY : 0 });
        }
    });

    $("ul.call-sections li a").click(function(e) {
        e.preventDefault();

        var id = $(this).attr('href');
        $(this).parent().parent().find('li a.active').removeClass('active');
        $(this).addClass('active');

        $(".album-details section").hide();
        $(".album-details "+id).show();
    });

    $(".header-mauve div.menu li").click(function() {
        var val = $(this).text();
        $(this).parent().parent().find("a").text(val);
        $(this).parent().parent().animate({
            height:23
        }, 300);
        $(this).parent().parent().find("a").attr('class','closed');
        $("input[type='hidden']").val(val);
    });

    // Couvertures sur la page série
    $(".albums-serie ul li").mouseenter(function() {
        $(this).find("span").animate({
            bottom:0
        }, 100);

        $(this).find("hgroup").animate({
            top: 130
        }, 100);
    });

    $(".albums-serie ul li").mouseleave(function() {
        $(this).find("span").animate({
            bottom:- 90
        }, 100);

        $(this).find("hgroup").animate({
            top: 220
        }, 100);
    });

    // Survol des items du calendrier
    $("table ul li").mouseenter(function() {
        $(this).find("span[class!=arrow]").show();
    });

    $("table ul li").mouseleave(function() {
        $(this).find("span[class!=arrow]").hide();
    });

    $('#bloc-newsletter form').submit(function(e) {
        $('#bloc-newsletter .alert').hide();
        $('#bloc-newsletter .alert').removeClass('success');
        $('#bloc-newsletter .alert').removeClass('error');
        $.post($(this).attr('action'), $(this).serialize(), function(ret) {
            var data = jQuery.parseJSON(ret);
            $('#bloc-newsletter .alert').addClass(data.status == true ? 'success' : 'error');
            $('#bloc-newsletter .alert').html(data.message);
            $('#bloc-newsletter .alert').show();
        });
        e.preventDefault();
        return false;
    });
});

$(window).load(function() {
    var timeout = setTimeout(function() {$("img.lazy").trigger("sporty")}, 1000);
    setScrollBar();
});

// Scrollbar horizontale personnalisée
function getInternetExplorerVersion() {
    var rv = -1; // Return value assumes failure.
    if (navigator.appName == 'Microsoft Internet Explorer') {
        var ua = navigator.userAgent;
        var re = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
        if (re.exec(ua) != null)
                        rv = parseFloat(RegExp.$1);
    }
    return rv;
}

function setScrollBar() {
    if (getInternetExplorerVersion() > 8.0 || getInternetExplorerVersion() == -1) {
        $('.albums-slider').mCustomScrollbar({
            mouseWheel: false,
            axis: 'x',
            advanced: {
                autoExpandHorizontalScroll:true
            }
        });
    }
}

function checkUserRecipient(recipient) {
    var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');
    return(reg.test(recipient));
}

function homeTabsOptions (u, b) {
    $('.mCSB_container').load(u, function(data) {
        var imgs      = $(data).find('img');
        var imgLoaded = 0;
        imgs.load(function() {
            imgLoaded++;
            if (imgLoaded >= imgs.length) {
                $('.albums-slider').mCustomScrollbar('update');
                $('.onglet-home-bd').removeClass('selected');
                $(b).addClass('selected');
            }
        });
    });
}

function addCdc(bt, id) {
    var u = '/cdc/'+id;
    if(id != null) {
        $.get(u , function(data) {
            if(data == "1") {
                $(bt).attr('class','likeon');
                return true;
            }
        });
    }
    return false;
}

function addalbum(bt,id,list) {
    //$('#widget-ma-bdtheque')
    var url = (list == 'achat') ? '/bedetheque/ajoutlisteachat/' : '/bedetheque/ajout/';
    u = url+id;
    if (id != null) {
        $.get(u, function(data) {
            if (data == "1") {
                if (list == 'achat') {
                    $(bt).attr('class','prixon');
                    $('.acheteron').attr('class','acheter');
                    $('.acheter').removeClass( 'acheteron');
                } else {
                    $(bt).attr('class','acheteron');
                    $('.prixon').attr('class','prix');
                    $('.prix').removeClass( 'prixon');
                }
                updateAccountWidget(id);
                return true;
            } else {
                testDeco(data);
            }
        });
    }
    return false;
}

function updateAccountWidget(id) {
    if (id != null) {
        var u = '/bd_'  +  id + '.html';
    } else {
        var u = 'bande-dessinee/bedetheque.html';
    }
    $.get(u, function(data) {
        var updatedWidget = $(data).find('section.mon-compte ul');
        $('section.mon-compte ul').html( $(updatedWidget) );
    });
}

function deleteAlbumFromBdtech(id) {
    if (id != null) {
        if (!confirm("Supprimer cet album de votre bédéthèque ?")) {
           return false;
        }
        var u = '/userbdtheque/delete/?id='  +  id;
        $.get(u , function(data) {
            if (data == "1") {
                $('#id-'+id).fadeOut();
                updateAccountWidget();
                return true;
            } else {
                testDeco(data);
            }
        });
     }
}

function testDeco(response) {
    if (response == 'USER_DECONNEXION') {
        alert('Vous êtes déconnecté !');
    }
}

function createUrl(count){
    var currentUrl = window.location.href;
    var url ;
    var resultPerPage = 'results='+count;

    if (currentUrl.indexOf('results=') != -1) {
        var nb = currentUrl.indexOf('results=') ;
        currentUrl = currentUrl.substring(0, nb-1);
    }

    if (currentUrl.indexOf('?') == -1) {
        url = currentUrl + '?' + resultPerPage ;
    } else {
        url = currentUrl + '&' + resultPerPage ;
    }

    self.location.href = url ;
}

window.twttr = (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0],
        t = window.twttr || {};
    if (d.getElementById(id)) return t;
    js = d.createElement(s);
    js.id = id;
    js.src = "https://platform.twitter.com/widgets.js";
    fjs.parentNode.insertBefore(js, fjs);

    t._e = [];
    t.ready = function(f) {
        t._e.push(f);
    };

    return t;
}(document, "script", "twitter-wjs"));

window.___gcfg = {lang: 'fr'};

(function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();