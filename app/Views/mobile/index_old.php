<!doctype html>
<html lang="en" class="mobile">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="ScreenOrientation" content="autoRotate:disabled">
  <link rel="icon" href="<?php echo base_url('images/favicon.ico'); ?>" type="image/ico"> 

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('css/video-js.css'); ?>" />
  <link rel="stylesheet" href="<?php echo base_url('css/styles.css'); ?>">

  <title>Mizone</title>
</head>

<body>
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
          <div class="menu menu-mobile">
            <div class="line line-1"></div>
            <div class="line line-2"></div>
            <div class="line line-3"></div>
          </div>
      </div>
    </div>
  </header>

  <div class="main-menu menu-trans normalize">
    <div class="menu-title">
      <h3>MIZONE ISOTONIC</h3>
      <p>OUR PRODUCTS</p>
    </div>
    <div class="menu-slider">
      <?php if(isset($products) && count($products) > 0 ): foreach($products as $p): $value = json_decode_table($p, default_language()); ?>
        <div class="slide-item is-mobile" style="background: url(<?php echo image_get_src($value["bg_m"]) ?>) no-repeat center center;">
          <div class="container-mz slide-menu">
            <div class="row aligntment f-100">
              <div class="col-lg-5 col-ipd">
                <div class="section-text">
                  <img src="<?php echo image_get_src($value["varian"]) ?>" class="img-text size-act" alt="">
                  <h3 class="sub-olo mb-0"><?php echo $value['subtitle']; ?></h3>
                </div>
              </div>
              <div class="col-lg-7 col-ipd">
                  <div class="product-img">
                    <img src="<?php echo image_get_src($value["content_m"]) ?>" class="img-fluid" alt="">
                  </div>
              </div>
            </div>
            <div class="view-content">
              <a href="#" class="btn btn-primary btn-view">VIEW PRODUCT</a>
              <div class="is-view-content">
                <p><?php echo $value['content'];?> <br> <?php echo $value['sabi']; ?> <?php echo $value['sabi_next'];?></p>
                
                <button class="btn btn-primary btn-block mt-4 close-view">CLOSE DETAIL</button>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; endif; ?>
    </div>
  </div>
  <div class="main-slider">
    <?php if(isset($sliders) && count($sliders) > 0 ): foreach($sliders as $s): $value = json_decode_table($s, default_language()); ?>
      <div class="slide-item is-mobile" style="background: url(<?php echo image_get_src($value["bg_m"]) ?>) no-repeat center center / cover;">
        <div class="row pt-6">
          <div class="col-lg-4 col-ipd">
            <div class="text-img">
              <img src="<?php echo image_get_src($value["text_m"]) ?>" class="img-fluid" alt="">
            </div>
          </div>
          <div class="col-lg-8 col-ipd">
            <div class="object-img">
              <img src="<?php echo image_get_src($value["content_m"]) ?>" class="img-fluid" alt="">
            </div>
          </div>
        </div>
        <?php if( !empty($value['video']) ):?>
          <div class="video-box">
            <a href="#videocontent-<?php echo $value['id']; ?>" data-toggle="modal">
              <img src="<?php echo image_get_src($value["video_thumb"]) ?>" alt="">
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
    <?php if( !empty($value['video']) ):?>
      <!-- Video Modal -->
      <div class="modal fade" id="videocontent-<?php echo $value['id']; ?>" role="dialog" aria-labelledby="videocontentTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-body p-0 rounded-0">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <video id="myVideo" class="video-js vjs-fluid" controls preload="auto" width="640" height="264"
                poster="<?php echo image_get_src($value["video_thumb"]) ?>" data-setup="{}">
                <source src="<?php echo image_get_src($value["video"]) ?>" type="video/mp4" />
              </video>
            </div>
          </div>
        </div>
      </div>
      <!-- Video Modal End -->
    <?php endif; ?>
  <?php endforeach; endif; ?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="<?php echo base_url('js/jquery-3.4.1.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/popper.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/videojs-ie8.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/video.js'); ?>"></script>
  <script src="<?php echo base_url('js/main.min.js'); ?>"></script>

  <script>
    $("#videocontent").on('hidden.bs.modal', function (e) {
      $(this).find('video')[0].pause();
    });

    $('.main-slider').slick({
      draggable: false,
    });
    $('.menu-slider').slick({
      dots: true,
    });

  </script>
</body>

</html>