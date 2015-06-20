var cafe=0;
var timeout;
function slider(speed,next,prev,pagination,slideContainer,delay,autoResize){
    // iNiTiALiSATiON
    var i=0; // initialisation
    if(delay!=null){
        slideShow();
    }
    moveSpeed = speed; // Durée du mouvement des slides (en ms)

    btnNext = $(next);
    btnPrev = $(prev);
    btnPagination = $(pagination);
    slidesContainer = $(slideContainer);
    widthSlide = $(slideContainer + ' .slide').width(); // Taille des slides (en px)
    btnPagination.eq(0).addClass("active"); // Allumage du premier repère
    nbslides = slidesContainer.children().length; // Calcul du nombre de slides
    slidesContainer.css("width",(nbslides)*widthSlide); // Redimentionnement du conteneur des slides en ftn du nbre de slides
    $(slideContainer + ' .slide').width(widthSlide);
    $(slideContainer).height($(slideContainer + ' .slide').eq(0).height());
    $(slideContainer).parent().height($(slideContainer + ' .slide').eq(0).height());
    $(next).height($(slideContainer + ' .slide').eq(0).height());
    $(prev).height($(slideContainer + ' .slide').eq(0).height());

    // EVENEMENTS
    // Au clic sur le bouton suivant
    if(btnNext!=null){
    btnNext.click(function(){
        moveNext();
        return false;
    });
    }

    // Au clic sur le bouton précédent
    if(btnPrev!=null){
    btnPrev.click(function(){
        movePrev();
        return false;
    });
    }

    // Au clic sur un repère de pagination
    btnPagination.click(function(){
        slideindex = btnPagination.index(this); // on récupère l'index du repère cliqué
        cafe = slideindex; // On redefinit i
        moveSlide(); // on bouge les slides
        initSlideShow();
        return false;
    });

    // Au touches clavier
    $(window).keydown(function(e){
        switch (e.keyCode) {
            case 37: // flèche gauche
                movePrev();
                break;
            case 39: // flèche droite
                moveNext();
                break;
        }
    });

    //Rollover
    slidesContainer.hover(
       function() {
          clearTimeout(timeout);
       },
       function() {
          slideShow();
       }
    );

    //FONCTiONS
    // Déplacement des slides
    function moveSlide(){
        activePagination(); // on allume le bon repere de pagination
        if (autoResize) {
            $(slideContainer).height($(slideContainer + ' .slide').eq(cafe).height());
            $(slideContainer).parent().height($(slideContainer + ' .slide').eq(cafe).height());
            $(next).height($(slideContainer + ' .slide').eq(cafe).height());
            $(prev).height($(slideContainer + ' .slide').eq(cafe).height());
        }
        slidesContainer.animate({left:-widthSlide*cafe},moveSpeed); // on deplace les slides
    }

    // Calcul du slide suivant
    function nextSlide(){
        // Si c'est le dernier slide, on réinitialise pour repartir du premier
        if(cafe==nbslides-1){
            cafe=-1;
        }
        cafe = cafe+1; // On incremente i
        return cafe; // On renvoi i
    }

    // Calcul du slide precedent
    function prevSlide(){
        // Si c'est le premier slide, on donne le i du dernier slide
        if(cafe==0){
            cafe=nbslides;
        }
        cafe = cafe-1; // On decremente i
        return cafe; // On renvoi i
    }

    // Allumage des reperes
    function activePagination() {
        btnPagination.removeClass("active"); // On eteind le precedent repere
        btnPagination.eq(cafe).addClass("active"); // On allume le nouveau
    }

    function moveNext(){
        nextSlide(); // on calcule l'id du slide suivant
        moveSlide(); // on bouge les slides
        initSlideShow();
        return false;
    }
    function movePrev(){
        prevSlide(); // on calcule l'id du slide précédent
        moveSlide(); // on bouge les slides
        initSlideShow();
        return false;
    }


    function slideShow(){
        if(delay!=null){
            timeout = setTimeout(function(){
                moveNext();
            }
            , delay);
        }
    }

    function initSlideShow(){
        if(delay!=null){
            clearTimeout(timeout);
            slideShow();
        }
    }
}