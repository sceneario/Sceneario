/*
 * http://www.sceneario.com 2012
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright ©madeforweb2012
 */

jQuery(function($)
{
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
        
       
        $(window).bind("load", function() { 
            var timeout = setTimeout(function() {$("img.lazy").trigger("sporty")}, 2000);
        }); 
        
        
         $('#submitconcourstep1').click(function(e){
            var values = $("input[class='concours_reponses']").map(function(){
                return $(this).val();
            }).get();
            var emptyFields = new Array();
            for(var i in values){
                var value = values[i];
                if(value == '' || value == ' '){
                    emptyFields.push(value);
                    $('#messageValidation').html('Vous n\'avez pas indiqu&eacute; de r&eacute;ponse');
                    break;
                }
            }
            
            if( emptyFields.length == 0 ){
                $('#form_questions').submit();
            }
            //console.log( emptyFields.length == 0 );
            
        });
       
        $('#submitconcourstep2').click(function(e){
            var values = $("input[class='participant_details']").map(function(){
                return $(this).val();
            }).get();
              var emptyFields = new Array();
            for(var i in values){
                //console.log( values[i] ) ;
                var value = values[i];
                if(value == '' || value == ' '){
                    emptyFields.push(value);
                    $('#messageValidation').html('Veuillez remplir tous les champs');
                    break;
                }
                
                if( !checkUserRecipient($('#email').val())  ||  !checkUserRecipient($('#email2').val())  ){
                    emptyFields.push('mail_syntax_failed');
                    $('#messageValidation').html('L\'adresse email que vous avez indiqu&eacute; n\'est pas valide');
                    break;
                }else{
                    if($('#email').val() != $('#email2').val()){
                        emptyFields.push('mail_comparison_failed');
                        $('#messageValidation').html('Les adresses emails ne sont pas identiques');
                    }
                }
            }
            if( emptyFields.length == 0 ){
                $('#form_coord').submit();
            }
            //console.log( emptyFields.length == 0 );
        });

        $('.contact').on('submit', '.form-contact', function(e) {
            e.preventDefault();
            e.stopPropagation();

            var $form   = $(e.currentTarget),
                url    = $form.attr('action'),
                status = 'data-is-loading';

            if($form.attr(status)) return;
            $form.attr(status, true);

            $.ajax({
                type: 'POST',
                url : url,
                data: $form.serialize(),
                dataType: 'json'
            }).done(function(response) {
                isLoading = false;
                if (response != null && response != '') {
                    if(response.status){
                        if(response.msg){
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

        function checkUserRecipient(recipient)
        {
            var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');
            return(reg.test(recipient));
        }
        
        /*
         * tabs sur la home
         */
        
        $('.onglet-home-bd').each(function(i){
            var btName = '.tab_' + (i + 1) ;
            
            $(btName).click(function(){
                //$.get('/index/' + URLsTabs[i], function(data){
                    homeTabsOptions('/index/' + URLsTabs[i], btName );
                //});
            });
        });
           
      
        function homeTabsOptions ( u, b )
        {
            $('.albums-slider').load(u, function(data) {
                var imgs      = $(data).find('img');
                var imgLoaded = 0;
                imgs.load(function() {
                    imgLoaded++;
                    if (imgLoaded >= imgs.length * (1 - 10 / 100)) {
                        setScrollBar();
                        $('.onglet-home-bd').removeClass('selected');
                        $(b).addClass('selected');
                    }
                });
            });
        }
        
        
        
        /*OUT - NOUVELLE VERSION EST APRES*/
        /*
	// Le header ne doit pas se fixer sur IE7 et inférieur (problème de z-index sinon)
	if (getInternetExplorerVersion() > 7.0 || getInternetExplorerVersion() == -1) {
		//hauteur du div de pub
		var hpub = $("#pub").height();
		// Début du stick
		debut = hpub;
		$(window).scroll(function () {
			// On recupere la coordonnee du scroll
			var scrollVar = $(window).scrollTop();
			
			// Si on depasse la coordonnÃ©e du debut du stick, 
			// on passe l'element en position fixed avec la marge en top
			if(scrollVar >= debut){
				$("#main-head").css({position:"fixed",top:0,zIndex:5000000});
				$("#head").css({paddingTop:"5px",paddingBottom:"5px"});
				$(".search").css({top:18});
			}
			// Si on est avant le début du stick, par exemple si on remonte la page, 
			// on remet la position a fixes et la marge en top.
			// On remet aussi en right:0 puisqu'on est revenu en absolute
			if(scrollVar < debut){
				$("#main-head").css({position:"absolute",top:"auto",zIndex:5000000});
				$("#head").css({paddingTop:"15px",paddingBottom:"15px"});
				$(".search").css({top:30});
			}
		});
	}*/
        
        /*NOUVELLE VERSION*/
        // Le header ne doit pas se fixer sur IE7 et inférieur (problème de z-index sinon)
	if (getInternetExplorerVersion() > 7.0 || getInternetExplorerVersion() == -1) {
		
        // MODIFS DU 18/10   
		$(window).scroll(function () {
			// On récupère la hauteur de la bannière de pub comme debut du scroll
			debut = $("#pub").height();
			// On recupere la coordonnee du scroll
			var scrollVar = $(window).scrollTop();
			
			// Si on depasse la coordonnÃ©e du debut du stick, 
			// on passe l'element en position fixed avec la marge en top
			if(scrollVar >= debut){
				$("#main-head").css({position:"fixed",top:0,zIndex:5000});
				$("#head").css({paddingTop:"5px",paddingBottom:"5px"});
				$(".search").css({top:18});
			}
			// Si on est avant le début du stick, par exemple si on remonte la page, 
			// on remet la position a fixes et la marge en top.
			// On remet aussi en right:0 puisqu'on est revenu en absolute
			if(scrollVar < debut){
				$("#main-head").css({position:"absolute",top:"auto",zIndex:5000});
				$("#head").css({paddingTop:"15px",paddingBottom:"15px"});
				$(".search").css({top:30});
			}
		});
            
	}
	
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

    $(window).load(function() {
        setScrollBar();
	});

    function setScrollBar(){
        if (getInternetExplorerVersion() > 8.0 || getInternetExplorerVersion() == -1) {
            $('.albums-slider').mCustomScrollbar({
                mouseWheel:false,
                horizontalScroll:true,
                set_width:940
            });
        }
    }
	
	
	$("img.behind").rotate(-10);
	$("img.behind2").rotate(5);
	
	$(".galerieSlider img").each(function(){
		$(this).not(".norotate").rotate((Math.floor(Math.random()*7))-3);
	});
	
	$("div#infobar a.close").click(function(e) {
		$(this).parent().hide();
		e.preventDefault();
		return false;
	});
	
	// Icones pages album/série ----------------------------------------------------------------
	// -----------------------------------------------------------------------------------------
	
	$("div.rightSide div.icons a").mouseover(function() {
            if ($(this).attr('class') == undefined || $(this).attr('class') == 'off') {
                    $(this).css({
                            backgroundPositionY : -29
                    });
            }
            else {}
	});
	
	$("div.rightSide div.icons a").mouseout(function() {
            if ($(this).attr('class') == undefined || $(this).attr('class') == 'off') {
                    $(this).css({
                            backgroundPositionY : 0
                    });
            }
            else {}
	});
	/*
	$("div.rightSide div.icons a").click(function(e) {
            if ($(this).attr('id') == undefined || $(this).attr('id') == 'off') {
                    //$(this).css({
                    //        backgroundPositionY : -58
                    //});
                    //$(this).attr('id','on');
            }
            else {
                    $(this).css({
                            backgroundPositionY : 0
                    });
                    $(this).attr('id','off');
            }

            e.preventDefault();
            return false;
	});
        */
	
	// Onglets sur les albums ------------------------------------------------------------------
	// -----------------------------------------------------------------------------------------
	
	$("ul.call-sections li").click(function() {
            var id = $(this).attr('id');
            $(this).parent().find('li.active').removeAttr('class');
            $(this).attr('class','active');

            $("section.album-details section").hide();
            $("section.album-details section."+id).show();
	});
	
	// Bouton acheter un album -----------------------------------------------------------------
	// -----------------------------------------------------------------------------------------
	
	$("div.acheter > a").click(function(e) {
            var li_height = $(this).parent().find('li:first-child').height();
            var li_nb = $(this).parent().find('li').length + 1;
            var heightMenu = li_nb*li_height;

            if ($(this).attr('class') == undefined || $(this).attr('class') == 'closed') {
                    $(this).parent().animate({
                            height:heightMenu
                    },500);
                    $(this).attr('class','opened');
            }
            else {
                    $(this).parent().animate({
                            height:27
                    },500);
                    $(this).attr('class','closed');
            }

            e.preventDefault();
            return false;
	});
	
	// Menu déroulant recherche ----------------------------------------------------------------
	// -----------------------------------------------------------------------------------------
	
        /*
	$("header.header-mauve div.menu > a").click(function(e) {
            var li_height = $(this).parent().find('li:first-child').height();
            var li_nb = $(this).parent().find('li').length + 1;
            var heightMenu = li_nb*li_height + 10;

            if ($(this).attr('class') == undefined || $(this).attr('class') == 'closed') {
                    $(this).parent().animate({
                            height:heightMenu
                    },300);
                    $(this).attr('class','opened');
            }
            else {
                    $(this).parent().animate({
                            height:23
                    },300);
                    $(this).attr('class','closed');
            }

            e.preventDefault();
            return false;
	});
	*/
	$("header.header-mauve div.menu li").click(function() {
            var val = $(this).text();
            $(this).parent().parent().find("a").text(val);
            $(this).parent().parent().animate({
                    height:23
            },300);
            $(this).parent().parent().find("a").attr('class','closed');
            $("input[type='hidden']").val(val);
	});
	
	// Couvertures sur la page série -----------------------------------------------------------
	// -----------------------------------------------------------------------------------------
	
	$("section.albums-serie ul li").mouseenter(function() {
            $(this).find("span").animate({
                    bottom:0
            },100);

            $(this).find("hgroup").animate({
                    top:130
            },100);
	});
	
	$("section.albums-serie ul li").mouseleave(function() {
            $(this).find("span").animate({
                    bottom:-90
            },100);

            $(this).find("hgroup").animate({
                    top:220
            },100);
	});

	// Survol des items du calendrier ----------------------------------------------------------
	// -----------------------------------------------------------------------------------------
	
	$("table ul li").mouseenter(function() {
		$(this).find("span[class!=arrow]").show();
	});
	
	$("table ul li").mouseleave(function() {
		$(this).find("span[class!=arrow]").hide();
	});
});

// CENTRAGE DES VISUELS
$(window).load(function() {
	$("figure.center").each(function(){
		// On récupère les dimensions de l'image
		var imageWidth = $(this).find(".illus").outerWidth();
		var imageHeight = $(this).find(".illus").outerHeight();
		// On récupère les dimensions du figure
		var blocWidth = $(this).width();
		var blocHeight = $(this).height();
		// On calcule de combien on doit décaler l'image en largeur et hauteur
		var decalageWidth = (imageWidth-blocWidth)/2;
		var decalageHeight = (imageHeight-blocHeight)/2;
		// On décale l'image
		$(this).find(".illus").css( "left" , -decalageWidth );
		$(this).find(".illus").css( "top"  , -decalageHeight );
	});
});


function addCdc(bt, id)
{
    var u = '/cdc/'+id ;
    //alert(u);
    if(id != null){
        $.get(u , function(data){
            //console.log(data);
            if(data == "1"){
                $(bt).attr('class','likeon');
                return true;
            }
            /*
            else{
                $(bt).attr('class','off');
            }*/
        });
    }
    return false;
}

function addalbum(bt,id,list)
{
    //$('#widget-ma-bdtheque')
    var url = (list == 'achat') ? '/bedetheque/ajoutlisteachat/' : '/bedetheque/ajout/' ;
    u = url+id ;
    //alert(u);
    if(id != null){
        $.get(u , function(data){
            //console.log(data);
            if(data == "1"){
                if (list == 'achat') {
                	$(bt).attr('class','prixon');
                	$('.acheteron').attr('class','acheter') ;
                	$('.acheter').removeClass( 'acheteron') ;
                	
                	
                }
                else{
	            	$(bt).attr('class','acheteron');
	            	$('.prixon').attr('class','prix'); 
	            	$('.prix').removeClass( 'prixon') ;
	            	 
	            	//alert('ajout');
                } 
                updateAccountWidget(id);
                return true;
            }
            else{
              
		    	testDeco(data);
	    	 
            }
            
        });
    }
    return false;
}

function updateAccountWidget(id){
	if(id != null){
		var u = '/bd_'  +  id + '.html';
        
     }else{
	    var u = 'bande-dessinee/bedetheque.html';
     }
     $.get(u , function(data){
    	 var updatedWidget = $(data).find('section.mon-compte ul');
    	 $('section.mon-compte ul').html( $(updatedWidget) );
    });
}

function deleteAlbumFromBdtech(id){
	if(id != null){
		if (!confirm("Supprimer cet album de votre bédéthèque ?")) { 
           return false;
        }
		var u = '/userbdtheque/delete/?id='  +  id ;
        $.get(u , function(data){
        	//console.log(data);
        	if(data == "1"){
	    		$('#id-'+id).fadeOut();
	    		updateAccountWidget();
	    		return true;
	    	}else{
		    	testDeco(data);
	    	}
        });
     }
}

function testDeco(response){
	if(response == 'USER_DECONNEXION'){
		//console.log(response);
		alert('Vous êtes déconnecté !');    	
	}
}



