<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="icon" href="images/favicon.ico" type="image/ico">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/video-js.css" />
  <link rel="stylesheet" href="css/animate.min.css" />
  <link rel="stylesheet" href="css/styles.css">
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
            <a href="#videocontent-<?php echo $value['id']; ?>" data-toggle="modal">
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
      <div class="modal fade" id="videocontent-<?php echo $value['id']; ?>" role="dialog" aria-labelledby="videocontentTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-body p-0 rounded-0">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><span class="close-text">CLOSE</span> &times; </span>
              </button>
              <?php if( !empty($value["video_url"]) ): ?>
                <!-- This is for video youtube embed -->
                <video id="myVideo" class="video-js vjs-fluid" controls width="640" height="264"
                  data-setup='{"techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "<?php echo $value["video_url"]; ?>"}], "youtube": { "iv_load_policy": 1 }}'>
                </video>
              <?php else: ?>
                <!-- This is for video file upload -->
                <video id="myVideo" class="video-js vjs-fluid" controls width="640" height="264"
                  data-setup='{"sources": [{ "type": "video/mp4", "src": "<?php echo image_get_src($value["video"]) ?>"}]}'>
                </video>
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
        <a class="nav-link nav<?php echo $i; ?> slideInUp animated" href="product/<?php echo $p['slug']; ?>" style="background: url(<?php echo image_get_src($value["nav_bg"]) ?>) no-repeat 100% / cover;">
          <i class="ico-nav tab-<?php echo $p['slug']; ?>" style="background: url(<?php echo image_get_src($value["nav"]) ?>) no-repeat 50%/contain;"></i>
        </a>
      </li>
    <?php endforeach; endif; ?>
    </ul>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/videojs-ie8.min.js"></script>
  <script src="js/video.js"></script>
  <script src="js/Youtube.min.js"></script>
  <script src="js/main.min.js"></script>

  <script>
    var url = window.location.href;
    // Get DIV
    // Check if URL contains the keyword
    if (url.search('product-list') > 0) {
      // Display the message
      $('.main-menu').addClass('active');
      $('.menu').addClass('active');
    }
  </script>
</body>
</html>