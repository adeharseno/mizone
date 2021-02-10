(function() {
'use strict';
    $(window).on('load', function(){
        $('.loader').fadeOut();
        $('.main-slider').addClass('delay-1');
        $('.video-box').addClass('delay-4');
        $('.nav1').addClass('delay-1');
        $('.nav2').addClass('delay-2');
        $('.nav3').addClass('delay-3');
        $('.nav4').addClass('delay-4');
        $('.nav5').addClass('delay-5');
        $('.nav6').addClass('delay-6');
        $('.main-slider').slick({
            draggable: false,
            autoplay: true,
            autoplaySpeed: 4000,
            pauseOnFocus: false,
            pauseOnHover: false,
            pauseOnDotsHover: false
        });
    });

    $('.menu').click(function(){
        $(this).toggleClass('active');
        $('.main-menu').toggleClass('active');
    });
    
    $('.is-view-content').hide();
    $('.view-content').on('click', '.btn-view', function(e){
        e.preventDefault();
        
        $(this).closest('.view-content').find('.is-view-content').slideToggle(400);
        
    });
    $('.is-view-content').on('click', '.close-view', function(){
        $(this).closest('.is-view-content').slideToggle(400);
    });
    $('.modal-video').on('hidden.bs.modal', function (e) {
        $('.main-slider').slick('slickPlay');
        videojs('myVideo').ready(function() {
            this.pause();
        });
    });
    $('.modal-video').on('show.bs.modal', function (e) {
        $('.main-slider').slick('slickPause');
        videojs('myVideo').ready(function() {
            this.currentTime(1);
            this.play();
        });

    });
    $('.menu-slider').on('click', '.slick-next', function(){
        $('.is-view-content').slideUp(400);
        
    });
    $('.menu-slider').on('click', '.slick-prev', function(){
        $('.is-view-content').slideUp(400);
        
    });
})();