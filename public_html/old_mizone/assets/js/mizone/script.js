$(document).ready(function() {

    $("img").mousedown(function(){
        return false;
    });

    heightBody();

    $(window).resize(function(event) {
        heightBody();
    });
    
    function heightBody(){
        $('body').height($(window).innerHeight());
    }

    // function to open/close nav
    function toggleNav(){
      // if nav is open, close it
        if($("nav").is(":visible")){
            $("nav").fadeOut();
            $("header").delay(2000).removeClass("open-nav");
            $(".btn-mobile").removeClass("open");
        }
        // if nav is closed, open it
        else{
            $(".btn-mobile").addClass("open");
            $("header").addClass("open-nav");
            $("nav").fadeIn();
        }
    }

    // when clicking + or ☰ button
    $(".btn, .btn-mobile").click(function(event){
        event.preventDefault();
        toggleNav();
    });
    
    // var path = anime.path('path');

    // var easings = ['linear', 'easeInCubic', 'easeOutCubic', 'easeInOutCubic'];

    // var motionPath = anime({
    //   targets: '.square',
    //   translateX: path('x'),
    //   translateY: path('y'),
    //   rotate: path('angle'),
    //   easing: 'linear',
    //   duration: 10000,
    //   loop: true,
    //   update: function(anim) {
    //     if(anim.progress > 50){
    //         $('.square').addClass('back');
    //     }else{
    //         $('.square').removeClass('back');
    //     }
    //   }
    // });

    // $('.square').hover(function() {
    //     motionPath.pause();
    // }, function() {
    //     motionPath.play();
    // });

    // $('.square').click(function(event) {
    //     console.log('test3');
    //     $('.stop').click();
    // });
    // $('.stop').click(function(event) {
    //     event.preventDefault();
    //     console.log('test');
    //     motionPath.pause();
    // });
});