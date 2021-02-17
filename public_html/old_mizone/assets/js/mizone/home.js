$(function(){
    $('*').click(function(event) {
        player.pauseVideo();
    });
    
    function loadComplete() {
        var preloaderOutTl = new TimelineMax({onComplete:animationCompleted});

        preloaderOutTl
            .set($('header'), { autoAlpha: 0})
            .set($('header .logo, header .btn'), { autoAlpha: 0, y:-10})
            .set($('.extra'), { autoAlpha: 0, x:-100})
            .set($('.text .whiteisotonic'), { autoAlpha: 0, x:100})
            .set($('.text'), { autoAlpha: 0})
            .set($('.vid-button'), { autoAlpha: 0})
            .set($('.mizone-bottle .ingredient'), { autoAlpha: 0})
            .set($('.arrow'), { autoAlpha: 0, x:-200})
            .set($('.mizone-bottle'), { autoAlpha: 1, y:1000, rotation: 0})
            // .set($('.mizone-bottle'), { autoAlpha: 1, y:-800, rotation: -10})
            .set($('.arrow .arrow-grid'), { autoAlpha: 0, x:-100})
            .to($('header'), 1, {autoAlpha: 1, ease:Expo.easeInOut}, 0)
            .to($('.text'), 1, {autoAlpha: 1, ease:Expo.easeInOut }, 0)
            .to($('.text .whiteisotonic'), 1.5, {autoAlpha: 1, x: 0, ease:Expo.easeInOut}, .5)
            .to($('.arrow'), 1, {autoAlpha: 1, x: 0, ease:Expo.easeInOut }, 1)
            .to($('.arrow-grid'), 1.3, {autoAlpha: 1, x: 0, ease:Expo.easeInOut }, 1)
            .to($('.extra'), 2, {autoAlpha: 1, x: 0, ease: Elastic.easeOut.config(1, 0.3) }, 2)
            // .to($('.mizone-bottle'), .85, {autoAlpha: 1, y: 0, ease: Bounce.easeOut }, 2)
            .to($('.mizone-bottle'), .85, {autoAlpha: 1, y: 0, ease:Expo.easeInOut }, 2)
            // .to($('.mizone-bottle'), .85, {rotation: 0, ease: Bounce.easeOut }, 2.35)
            .to($('header .logo, header .btn, .mizone-bottle .ingredient'), 1, {autoAlpha: 1, y: 0, ease:Expo.easeInOut}, 3)
            .to($('.vid-button'), .25, {autoAlpha: 1, ease:Expo.easeInOut }, 2)
            .set($('.vid-button'), {className: '+=open'}, 3)
            .set($('.menu-product'), {className: '+=load'}, 3)
            .set($('.menu-product'), {className: '-=load'}, 4)
            .set($('.menu-product'), {className: '+=finish'}, 4)
            ;

        preloaderOutTl;
    }

    function animationCompleted() {
        $('header .logo, header .btn').removeAttr('style');
        
        $('.menu-product .row').mouseenter(function(event) {
            TweenMax.killAll(false, true, false);
            var preloaderOutTl = new TimelineMax();

            preloaderOutTl
                .set($('#content'), {css: {zIndex:3}})
                .set($('#MainHome .bg'), {css: {display:'none'}})
                .set($('.bg-menu'), {className: '+=open'})
                .set($('.menu-product'), {className: '+=up'})
                ;
            preloaderOutTl;
        });        
        $('.menu-product .row').mouseleave(function(event) {
            TweenMax.killAll(false, true, false);
            var preloaderOutTl = new TimelineMax();

            preloaderOutTl
                .set($('.menu-product'), {className: '-=up'}, .5)
                .set($('.menu-product'), {className: '+=down'})
                .set($('.bg-menu'), {className: '-=open'}, 1)
                .set($('#MainHome .bg'), {css: {display:'block'}}, 1)
                .set($('#content'), {css: {zIndex:0}}, 1)
                ;
            preloaderOutTl;
        });

        $('body').on('wheel', _.debounce(function(e){
            var delta = e.originalEvent.deltaY;

            if (delta > 0){
                TweenMax.killAll(false, true, false);
                var preloaderOutTl = new TimelineMax();

                preloaderOutTl
                    .set($('#content'), {css: {zIndex:3}})
                    .set($('#MainHome .bg'), {css: {display:'none'}})
                    .set($('.bg-menu'), {className: '+=open'})
                    .set($('.menu-product'), {className: '+=up'})
                    ;
                preloaderOutTl;
            } else {
                TweenMax.killAll(false, true, false);
                var preloaderOutTl = new TimelineMax();

                preloaderOutTl
                    .set($('.menu-product'), {className: '-=up'}, .5)
                    .set($('.menu-product'), {className: '+=down'})
                    .set($('.bg-menu'), {className: '-=open'}, 1)
                    .set($('#MainHome .bg'), {css: {display:'block'}}, 1)
                    .set($('#content'), {css: {zIndex:0}}, 1)
                    ;
                preloaderOutTl;
            }
        }, 100));

    }
    // var width = 100,
    //     perfData = window.performance.timing, // The PerformanceTiming interface represents timing-related performance information for the given page.
    //     EstimatedTime = -(perfData.loadEventEnd - perfData.navigationStart),
    //     time = parseInt((EstimatedTime/1000)%60)*100;

    // // Loadbar Animation
    // $(".loadbar").animate({
    //   width: width + "%"
    // }, time);

    // // Fading Out Loadbar on Finised
    // setTimeout(function(){
    //   $('.preloader-wrap').fadeOut(300);
    //   if (window.location.hash) {
    //     checkhash();
    //   }else{
    //     loadComplete();
    //   }
    //   // $('body').removeClass('noscroll');
    // }, time);

    loadComplete();

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

    function goToVideo() {
        var $currPage = $('section#MainHome'),
        $nextPage = $('section#HomeVideo'), 
        outClass = 'pt-page-moveToLeftEasing pt-page-ontop',
        inClass = 'pt-page-moveFromRight';

        pageTransition($nextPage, $currPage, outClass, inClass);
        $('.backhome').fadeIn();
    }

    function goToHome() {
        var $nextPage = $('section#MainHome'),
        $currPage = $('section#HomeVideo'), 
        outClass = 'pt-page-moveToRightEasing pt-page-ontop',
        inClass = 'pt-page-moveFromLeft';
        player.stopVideo();

        pageTransition($nextPage, $currPage, outClass, inClass);
        $('.backhome').fadeOut();
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

    $('.vid-button').click(function(event) {
        goToVideo();
    });

    $(document).on("click", ".menu-vid a", function(event) {
        event.preventDefault();
        var id = $(this).attr('data-id');
        $('.text-container .content').hide();
        $('.text-container .content[data-id="'+ id +'"]').show();
        player.loadVideoById(id, 0, "default");
    });
    

    $(document).on("click", ".ingredient .trigger", function(event) {
        if($(window).width() > 576){        
            $(this).toggleClass('active');
            $(this).siblings('.ingredient-detail').slideToggle('fast');
        }else{
            slug = $(this).attr('data-slug');
            $('#IngredientModal[data-slug="'+ slug +'"]').modal('show');
        }
    });

    $(document).on("click", "nav a[data-slug='home']", function(event) {
        event.preventDefault();
        if(!$('section#MainHome').hasClass('current')){        
            $('header .btn').click();
            setTimeout(function(){
                goToHome();
            }, 1000);
        }
    });

    $(document).on("click", "a.backhome", function(event) {
        event.preventDefault();
        goToHome();
    });

    // scrollbar video
    let viewport = document.querySelector('.menu-vid')
    let content = viewport.querySelector('.track')

    let sb = new ScrollBooster({
            viewport, // this parameter is required
            content, // scrollable element
            mode: 'x', // scroll only in horizontal dimension
            bounce: false,
            onUpdate: (data)=> {
                content.style.transform = `translateX(${-data.position.x}px)`;
            },
             onClick: (data, event) => {
                event.preventDefault()
                // if (event.target.classList.contains('link')) {
            }         
    });
});