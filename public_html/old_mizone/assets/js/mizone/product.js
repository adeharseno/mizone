$(function(){
    var animated = false;
    var slugGlobal;
    var hash = window.location.hash.substr(1);

    // scrollbar video
    let viewport = document.querySelector('.product-list')
    let content = viewport.querySelector('.track')

    let sb = new ScrollBooster({
            viewport, // this parameter is required
            content, // scrollable element
            mode: 'x', // scroll only in horizontal dimension
            bounce: true,
            onUpdate: (data)=> {
                content.style.transform = `translateX(${-data.position.x}px)`
            },
             onClick: (data, event) => {
                content.style.transform = `translateX(${-data.position.x}px)`
                // event.preventDefault()
                // if (event.target.classList.contains('link')) { alert('click'); }
            }         
    });

    console.log(hash);
    
    if(hash != ''){
        updateProdMenu(hash);
        firstLoad(hash);
        $('#productDetail').addClass('current');
        $('.backhome').fadeIn();
    }else{
        $('#productIndex').addClass('current');
        loadIndex();
    }

    function loadIndex() {
        var preloaderOutTl = new TimelineMax({onComplete:loadIndexCompleted});

        preloaderOutTl
            .set($('header'), { autoAlpha: 0})
            .set($('header .logo, header .btn'), { autoAlpha: 0, y:-10})
            .set($('#productIndex .title'), { autoAlpha: 0})
            .to($('header'), 1, {autoAlpha: 1, ease:Expo.easeInOut}, 0)
            .to($('#productIndex .title'), 1, {autoAlpha: 1, y: 0, ease:Expo.easeInOut}, 0)
            .set($('#productIndex .product-list'), {css: {display:'block'}}, .5)
            .to($('header .logo, header .btn'), 1, {autoAlpha: 1, y: 0, ease:Expo.easeInOut}, 1)
            ;

        preloaderOutTl;        
    }

    function loadIndexCompleted() {
        $('header .logo, header .btn').removeAttr('style');
        sb.updateMetrics();
    }

    function firstLoad($slug) {
        var $nextContainer = $('#productDetail .container[data-slug="'+$slug+'"]');
        animated = true;
        var preloaderOutTl = new TimelineMax({onComplete:resetStyle});

        preloaderOutTl
            .set($('#productDetail .menu-product'), {css: {display:'block'}})
            .set($nextContainer, {className: '+=active'}, 0)
            .to($nextContainer.find('.img-bottle, .img-bottle-mobile'),       .85, {autoAlpha: 1, y: 0, rotation: 10, ease: Bounce.easeOut }, 0.5)
            .to($nextContainer.find('.img-bottle, .img-bottle-mobile'),       .85, {rotation: 0, ease: Bounce.easeOut }, 0.85)
            .to($nextContainer.find('.arrow'),            1, {autoAlpha: 1, y: 0, x:0, ease:Back.easeOut}, .5)
            .to($nextContainer.find('.text .whiteisotonic'), .85, {autoAlpha: 1, y: 0, x:0, ease:Expo.easeInOut}, .5)
            .to($nextContainer.find('.text .title'),      .85, {autoAlpha: 1, ease:Expo.easeInOut}, .5)
            .to($nextContainer.find('.text .img-label'),  .85, {autoAlpha: 1, y: 0, x:0, ease:Expo.easeInOut}, .5)
            .to($nextContainer.find('.text p'),           .85, {autoAlpha: 1, ease:Expo.easeInOut}, .5)
            ;

        preloaderOutTl;        
    }

    function openProduct($slug) {
        var $containerActive = $('#productDetail .container.active');
        var $nextContainer = $('#productDetail .container[data-slug="'+$slug+'"]');
        animated = true;
        var preloaderOutTl = new TimelineMax({onComplete:resetStyle});

        preloaderOutTl
            .to($containerActive, .5, {autoAlpha: 0, ease:Expo.easeInOut }, 0)
            .set($containerActive, {className: '-=active'}, 0)
            .to($containerActive.find('.img-bottle, .img-bottle-mobile'), .85, {autoAlpha: 0, y: -1000, rotation: 0, ease: Bounce.easeOut }, 0)
            .to($containerActive.find('.arrow[data-direction="up"]'), .85, {autoAlpha: 0, y: -100, ease:Back.easeOut }, 0)
            .to($containerActive.find('.arrow[data-direction="left"]'), .85, {autoAlpha: 0, x: 200, ease:Back.easeOut }, 0)
            .to($containerActive.find('.text .whiteisotonic'), .85, {autoAlpha: 0, y: 50, ease:Expo.easeInOut }, 0)
            .to($containerActive.find('.text .img-label'), .85, {autoAlpha: 0, x: 100, ease:Expo.easeInOut }, 0)
            .set($containerActive.find('.img-bottle, .img-bottle-mobile'), { y: -1000})
            .set($containerActive.find('.arrow[data-direction="up"]'), { y: 100})
            .set($containerActive.find('.arrow[data-direction="left"]'),{x:-200})
            .set($containerActive.find('.text .whiteisotonic'), { y: -50})
            .set($containerActive.find('.text .img-label'),  { x: -50})
            .set($nextContainer, {className: '+=active'}, 0)
            .to($nextContainer.find('.img-bottle, .img-bottle-mobile'),       .85, {autoAlpha: 1, y: 0, rotation: 10, ease: Bounce.easeOut }, 1)
            .to($nextContainer.find('.img-bottle, .img-bottle-mobile'),       .85, {rotation: 0, ease: Bounce.easeOut }, 1.35)
            .to($nextContainer.find('.arrow'),            1, {autoAlpha: 1, y: 0, x:0, ease:Back.easeOut}, 1)
            .to($nextContainer.find('.text .whiteisotonic'), .85, {autoAlpha: 1, y: 0, x:0, ease:Expo.easeInOut}, 1)
            .to($nextContainer.find('.text .title'),      .85, {autoAlpha: 1, ease:Expo.easeInOut}, 1)
            .to($nextContainer.find('.text .img-label'),  .85, {autoAlpha: 1, y: 0, x:0, ease:Expo.easeInOut}, 1)
            .to($nextContainer.find('.text p'),           .85, {autoAlpha: 1, ease:Expo.easeInOut}, 1)
            ;

        preloaderOutTl;        
    }

    function resetStyle() {
        animated = false;
        $('#productDetail .container:not(.active)').removeAttr('style');
        $('#productDetail .container:not(.active) *').removeAttr('style');
    }

    function updateProdMenu($slug) {
        $('#productDetail .menu-product a').removeClass('active');
        $('#productDetail .menu-product a[data-slug="'+$slug+'"]').addClass('active');
        if(history.pushState) {
            history.pushState(null, null, '#'+$slug);
        }
        else {
            location.hash = '#'+$slug;
        }
    }

   var animEndEventNames = {
        'WebkitAnimation' : 'webkitAnimationEnd',
        'OAnimation' : 'oAnimationEnd',
        'msAnimation' : 'MSAnimationEnd',
        'animation' : 'animationend'
    },
    // animation end event name
    animEndEventName = animEndEventNames[ Modernizr.prefixed( 'animation' ) ],
    // support css animations
    support = Modernizr.cssanimations;

    function goToDetail() {
        var $currPage = $('section#productIndex'),
        $nextPage = $('section#productDetail'), 
        outClass = 'pt-page-moveToLeftEasing pt-page-ontop',
        inClass = 'pt-page-moveFromRight';

        var preloaderOutTl = new TimelineMax();

        preloaderOutTl
            .set($('#productIndex .product-list'), {className: '+=hideproduct'})
            .to($('#productIndex .title'), 1, {autoAlpha: 0, y: 0, ease:Expo.easeInOut}, .5)
            .set($('#productIndex .product-list'), {css: {display:'none'}}, .5)
            .set($('#productIndex .product-list'), {className: '-=hideproduct'}, .5)
            ;

        preloaderOutTl;     

        setTimeout(function(){
            pageTransition($nextPage, $currPage, outClass, inClass);
            $('.backhome').fadeIn();
        }, 1000);
        
    }

    function loadBackIndex() {
        var preloaderOutTl = new TimelineMax({onComplete:loadIndexCompleted});

        preloaderOutTl
            .to($('#productIndex .title'), 1, {autoAlpha: 1, y: 0, ease:Expo.easeInOut}, 1)
            .set($('#productIndex .product-list'), {css: {display:'block'}}, 1.5)
            ;

        preloaderOutTl;        
    }

    function pageTransition($nextPage, $currPage, outClass, inClass) {
        var endCurrPage = false,
        endNextPage = false;

        $nextPage.addClass( 'current' );

        $currPage.addClass( outClass ).on( animEndEventName, function() {
            $currPage.off( animEndEventName );
            endCurrPage = true;
            if( endNextPage ) {
                $currPage.removeClass( outClass );
                $currPage.removeClass( 'current' );
                $nextPage.removeClass( inClass );
            }
        } );

        $nextPage.addClass( inClass ).on( animEndEventName, function() {
            $nextPage.off( animEndEventName );
            endNextPage = true;
            if( endCurrPage ) {
            }
        } );
    }

    $('body').on("click", "#productDetail .menu-product a", function(event) {
        event.preventDefault();
        if(!animated){        
            var slug = $(this).attr('data-slug');
            console.log(this);
            updateProdMenu(slug);
            openProduct(slug);        
        }
    });

    $('body').on("click", "#productIndex .product-list a", function(event) {
        event.preventDefault();
        goToDetail();
        var slug = $(this).attr('data-slug');
        setTimeout(function(){
            updateProdMenu(slug);
            firstLoad(slug); 
        }, 1500);        

    });

    $('body').on("click", "#productDetail .menu-product .back, .backhome", function(event) {
        var $nextPage = $('section#productIndex'),
        $currPage = $('section#productDetail'), 
        outClass = 'pt-page-moveToRightEasing pt-page-ontop',
        inClass = 'pt-page-moveFromLeft';

        var $containerActive = $('#productDetail .container.active');

        var preloaderOutTl = new TimelineMax({onComplete:resetStyle});

        preloaderOutTl
            .to($containerActive, .5, {autoAlpha: 0, ease:Expo.easeInOut }, 0)
            .set($containerActive, {className: '-=active'}, 0)
            .to($containerActive.find('.img-bottle, .img-bottle-mobile'), .85, {autoAlpha: 0, y: -1000, rotation: 0, ease: Bounce.easeOut }, 0)
            .to($containerActive.find('.arrow[data-direction="up"]'), .85, {autoAlpha: 0, y: -100, ease:Back.easeOut }, 0)
            .to($containerActive.find('.arrow[data-direction="left"]'), .85, {autoAlpha: 0, x: 200, ease:Back.easeOut }, 0)
            .to($containerActive.find('.text .whiteisotonic'), .85, {autoAlpha: 0, y: 50, ease:Expo.easeInOut }, 0)
            .to($containerActive.find('.text .img-label'), .85, {autoAlpha: 0, x: 100, ease:Expo.easeInOut }, 0)
            .to($("#productDetail .menu-product"), .85, {autoAlpha: 0, ease:Expo.easeInOut }, 0)
            .set($containerActive.find('.img-bottle, .img-bottle-mobile'), { y: -1000})
            .set($containerActive.find('.arrow[data-direction="up"]'), { y: 100})
            .set($containerActive.find('.arrow[data-direction="left"]'),{x:-200})
            .set($containerActive.find('.text .whiteisotonic'), { y: -50})
            .set($containerActive.find('.text .img-label'),  { x: -50})
            .set($("#productDetail .menu-product"),  { css: {display: 'none'}})
            ;

        preloaderOutTl;        

        setTimeout(function(){
            $('#productDetail .menu-product').removeAttr('style');
            pageTransition($nextPage, $currPage, outClass, inClass);
            history.replaceState(null, null, ' ');
            loadBackIndex();
            $('.backhome').fadeOut();
        }, 1200);
    });

});

