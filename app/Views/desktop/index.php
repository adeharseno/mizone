<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="description" content="Minuman Isotonik dengan Vitamin B3, B6, B12 bantu lo semangat terus!!">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="icon" href="images/favicon.ico" type="image/ico">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url('css/all.min.css'); ?>">

  <title>Mizone Isotonik | 100% Mizone, Semangat Terus!!</title>
   <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KDQLRG4');</script>
    <!-- End Google Tag Manager -->


</head>
<body>
     <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KDQLRG4"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

  <div class="loader">
    <div class="loader-content">
      <i class="spinner"></i>
      <p>LOADING</p>
    </div>
  </div>
  <header class="header-main">
    <div class="row align-items-center">
      <div class="col">
        <a href="/"><div class="logo"></div></a>
      </div>
      <div class="col text-right">
          <div class="menu">
            <div class="line line-1"></div>
            <div class="line line-2"></div>
            <div class="line line-3"></div>
          </div>
      </div>
    </div>
  </header>

  <div class="main-menu">
    <div class="container-mz">
      <div class="row align-items-center">
        <div class="col-md-4">
          <h2 class="title-2">
            MIZONE
            <span class="title-iso">ISOTONIC</span>
          </h2>
          <h3 class="title-our">OUR PRODUCTS</h3>
        </div>
        <div class="col-md-8">
          <div class="row">
            <?php if(isset($products) && count($products) > 0 ): foreach($products as $p): $value = json_decode_table($p, default_language()); ?>
              <div class="col text-center">
                <a href="product/<?php echo $p['slug']; ?>" class="product-link">
                  <img src="<?php echo image_get_src($value["bottle"]) ?>" class="img-fluid product-shade" alt="">
                </a>
              </div>
            <?php endforeach; endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="main-slider slideInLeft animated">
    <?php if(isset($sliders) && count($sliders) > 0 ): foreach($sliders as $s): $value = json_decode_table($s, default_language()); ?>
      <div class="slider-items" style="background:url(<?php echo image_get_src($value["bg_d"]) ?>) no-repeat center center ; background-size: cover;">
        <div class="row vh-100">
          <div class="col-12 align-self-center">
            <img src="<?php echo image_get_src($value["content_d"]) ?>" class="img-fluid" alt="">
          </div>
        </div>
        <?php if( !empty($value['video']) || !empty($value["video_url"]) ):?>
          <div class="video-box fadeInDown animated">
            <img src="<?php echo image_get_src($value["video_thumb"]) ?>" alt="">
            <a href="#videocontent-<?php echo $value['id']; ?>" data-toggle="modal" class="btn-play-vid">
              <div class="play-btn">
                <div class="arrow-play">
                  <i class="ico-play"></i>
                </div>
                <p class="mb-0"><?php echo $value['video_title']; ?></p>
              </div>
            </a>
          </div>
        <?php endif; ?>
      </div>
    <?php endforeach; endif; ?>
  </div>

  <?php if(isset($sliders) && count($sliders) > 0 ): foreach($sliders as $s): $value = json_decode_table($s, default_language()); ?>
    <?php if( !empty($value['video']) || !empty($value["video_url"]) ):?>
      <!-- Video Modal -->
      <div class="modal fade modal-video" id="videocontent-<?php echo $value['id']; ?>" role="dialog" aria-labelledby="videocontentTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-body p-0 rounded-0">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><span class="close-text">CLOSE</span> &times; </span>
              </button>
              <?php if( !empty($value["video_url"]) ): ?>
                <!-- This is for video youtube embed -->
                 <div class="videoWrapper">
                     <video id="video1-<?php echo $value['id']; ?>" width="640" height="360">
                        <source src="<?php echo $value["video_url"]; ?>" type="video/youtube" >
                    </video>
                    
                </div>
              <?php else: ?>
                <!-- This is for video file upload -->
                <div class="videoWrapper">
                    <video id="video1-<?php echo $value['id']; ?>" width="320" height="240" controls="controls" preload="none" >
                        <source class="srcv" src="<?php echo image_get_src($value["video"]) ?>" type="video/mp4">
                    </video>  
                </div>

              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <!-- Video Modal End -->
    <?php endif; ?>
  <?php endforeach; endif; ?>

  <div class="nav-bottom">
    <ul class="nav nav-pills nav-fill">
    <?php if(isset($products) && count($products) > 0 ): $i=0; foreach($products as $p): $value = json_decode_table($p, default_language()); $i++;?>
      <li class="nav-item">
        <a class="nav-link nav<?php echo $i; ?> slideInUp animated delay-<?php echo $i; ?>" href="product/<?php echo $p['slug']; ?>" style="background: url(<?php echo image_get_src($value["nav_bg"]) ?>) no-repeat 100% / cover;">
          <i class="ico-nav tab-<?php echo $p['slug']; ?>" style="background: url(<?php echo image_get_src($value["nav"]) ?>) no-repeat 50%/contain;"></i>
        </a>
      </li>
    <?php endforeach; endif; ?>
    </ul>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <!--<script src="js/jquery-3.4.1.min.js"></script>-->
  <script src="<?php echo base_url('js/jquery-3.5.1.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/popper.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/mediaelement-and-player.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/main.min.js'); ?>"></script>

  <script>
    var url = window.location.href;
    // Get DIV
    // Check if URL contains the keyword
    if (url.search('product-list') > 0) {
      // Display the message
      $('.main-menu').addClass('active');
      $('.menu').addClass('active');
    }
    $('video').mediaelementplayer({
        enableAutosize: true,
        alwaysShowControls: true,
        defaultVideoWidth: 480,
        defaultVideoHeight: 270,
        videoWidth: -1,
        videoHeight: -1,
        audioWidth: 400,
        audioHeight: 30,
    });
    <?php if(isset($sliders) && count($sliders) > 0 ): foreach($sliders as $s): $value = json_decode_table($s, default_language()); ?>
      <?php if( !empty($value['video']) || !empty($value["video_url"]) ):?>
        
        $('#videocontent-<?php echo $value['id']; ?>').on("hidden.bs.modal", function (i) {
            $(".main-slider").slick("slickPlay"),
            $(this).find('#video1-<?php echo $value['id']; ?>').trigger('pause');
           
        });
        
        $('#videocontent-<?php echo $value['id']; ?>').on("show.bs.modal", function (i) {
            $(".main-slider").slick("slickPause"),
            $(this).find('#video1-<?php echo $value['id']; ?>').trigger('play');
            $(this).find('#video1-<?php echo $value['id']; ?>')[0].setCurrentTime(0);
            
        });
      <?php endif; ?>
    <?php endforeach; endif; ?>
      
  
  </script>
</body>
</html>