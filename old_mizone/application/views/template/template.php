<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Mizone 100% Sabi</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"> 
        <meta http-equiv="Content-Security-Policy" content="script-src 'self';"> 
       <!--  <meta http-equiv="Content-Security-Policy"  
        content="default-src * 'unsafe-inline' 'unsafe-eval'"/> -->
        <!-- Bootstrap Core CSS -->
        <link href="assets/mizone/css/bootstrap.css" rel="stylesheet">
        <link href="assets/mizone/css/animations.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="assets/mizone/css/default.css" rel="stylesheet">
        <!-- js -->
        <script type="text/javascript" src="assets/mizone/js/modernizr.js"></script>
        <script type="text/javascript" src="assets/mizone/js/jquery.js"></script>
        <script type="text/javascript" src="assets/mizone/js/scrollbooster.min.js"></script>
        <script type="text/javascript" src="assets/mizone/js/lodash.min.js"></script>
        <!-- <script type="text/javascript" src="assets/mizone/js/bootstrap.js"></script> -->
        <script type="text/javascript" src="assets/mizone/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/mizone/js/jquery.ui.widget.js"></script>
        <script type="text/javascript" src="assets/mizone/js/jquery.event.drag.js"></script>
        <script type="text/javascript" src="assets/mizone/js/jquery.rs.carousel.js"></script>
        <script type="text/javascript" src="assets/mizone/js/jquery.rs.carousel-touch.js"></script>
        <!-- <script type="text/javascript" src="assets/mizone/js/anime.min.js"></script> -->
        <script type="text/javascript" src="assets/mizone/js/TweenMax.min.js"></script>
        <!-- <script type="text/javascript" src="assets/mizone/js/MorphSVGPlugin.min.js"></script> -->
        <!-- <script type="text/javascript" src="assets/mizone/js/video.js"></script>
        <script type="text/javascript" src="assets/mizone/js/script.js"></script> -->
        <!-- Facebook Pixel Code -->

        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window,document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '197139557875693');
            fbq('track', 'PageView');
        </script>
        <noscript>
            <img height="1" width="1"
            src="https://www.facebook.com/tr?id=197139557875693&ev=PageView
            &noscript=1"/>
        </noscript>

        <!-- End Facebook Pixel Code -->

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-149282080-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-149282080-1');
        </script> -->

        <!-- Global site tag (gtag.js) - Google Ads: 705049509 -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=AW-705049509"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'AW-705049509');
        </script>

    </head>
    <body class="<?php echo $this->router->fetch_method(); ?>">  

        <?php 

        require_once('header.php'); ?>        
        <div id="content">  
         <?php echo $_content ?>
        </div>

<script type="text/javascript">
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
});



    // 2. This code loads the IFrame Player API code asynchronously.
    var tag = document.createElement('script');

    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    // 3. This function creates an <iframe> (and YouTube player)
    //    after the API code downloads.
    var player;

    function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
            height: '390',
            width: '640',
            videoId: 'Wkr7lNb4G6g',
            playerVars: {
                'autoplay': 0,
                'controls': 1
            },
            events: {
                'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
            }
        });

    }

    var playerReady = false;
    // 4. The API will call this function when the video player is ready.
    function onPlayerReady(event) {
        playerReady = true;

        $('iframe').attr('data-src', function() { return $(this).attr('src'); })
        // .attr('src','');


    }

    // 5. The API calls this function when the player's state changes.
    //    The function indicates that when playing a video (state=1),
    //    the player should play for six seconds and then stop.
    function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.ENDED) {
            // alert('done');

        }
    }


    function init() {
    var vidDefer = document.getElementsByTagName('iframe');
    for (var i=0; i<vidDefer.length; i++) {
    if(vidDefer[i].getAttribute('data-src')) {
    vidDefer[i].setAttribute('src',vidDefer[i].getAttribute('data-src'));
    } } }
    window.onload = init;
</script>

        <!-- <script type="text/javascript">
            function init() {
            var vidDefer = document.getElementsByTagName('iframe');
            for (var i=0; i<vidDefer.length; i++) {
            if(vidDefer[i].getAttribute('data-src')) {
            vidDefer[i].setAttribute('src',vidDefer[i].getAttribute('data-src'));
            } } }
            window.onload = init;
        </script> -->
    </body>
</html>