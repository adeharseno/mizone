<?php
// file headers.php
header("Strict-Transport-Security:max-age=31536000; includeSubDomains; preload");
header('X-XSS-Protection: 1;mode=block');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY'); 
?>
<!doctype html>
<html lang="en" class="mobile">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="description" content=" Minuman Isotonik + Vitamin B3 B6 B12 bantu badan siap lanjut terus!">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="ScreenOrientation" content="autoRotate:disabled">
  
  <link rel="icon" href="<?php echo base_url('images/favicon.ico'); ?>" type="image/ico"> 

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url('css/all.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('css/customs.css'); ?>">
  <style>
        body {
            overflow: auto;
        }
        .product-showcase {
            width: 200px;
            position: relative;
            bottom: 0px;
            margin: 100px 0;
        }
        .section-product {
            padding: 5px 0;
        }
        .products {
            position: absolute;
            bottom: 11em;
            left: 52%;
        }
        .menu-slider,
        .slide-menu.container-mz {
            display: none !important;
        }
        .main-menu.menu-trans.active {
            left: -20000px !important;
        }
        @media only screen and (max-width: 767px) {
            .menu-container {
                display: block;
                position: fixed;
                background: #003182;
                top: 60px;
                bottom: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                z-index: 999;
            }
            .menu-container.active {
                left: 0;
            }
            .header-main {
                background: #003182;
            }
            .menus {
                width: 100%;
                padding: 0;
            }
            .menu-item {
                display: block;
                margin: 30px 0;
            }
            .slick-slide div {
                width: 100%;
            }
        }

  </style>

  <title>Mizone Isotonik + Vitamin B</title>

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
          <div class="menu menu-mobile trigger-menu">
            <div class="line line-1"></div>
            <div class="line line-2"></div>
            <div class="line line-3"></div>
          </div>
      </div>
    </div>
  </header>
  
  <div class="menu-container">
      <nav class="navbars">
          <ul class="menus">
            <li class="menu-item">
              <a class="anchor" href="<?= base_url('produk') ?>">Produk</a>
            </li>
            <li class="menu-item">
              <a class="anchor has-submenu" href="#">Info Mizone</a>
              <ul class="submenu">
                <li class="submenu-item">
                  <a class="anchor mod-flex"  href="<?= base_url('articles') ?>">
                    <span class="texts">Artikel</span>
                  </a>
                </li>
                <li class="submenu-item">
                  <a class="anchor mod-flex" href="<?= base_url('events') ?>">
                    <span class="texts">Acara</span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a class="anchor" href="<?= base_url('team-mizone') ?>">#TeamMizone</a>
            </li>
            <li class="menu-item">
              <a class="anchor" href="<?= base_url('faq') ?>">FAQ</a>
            </li>
          </ul>
      </nav>
      <form class="d-flex" method="GET" action="<?= base_url('articles') ?>">
        <div class="form-group has-search">
            <span class="form-control-feedback"></span>
            <input type="text" name="search" class="form-control" placeholder="Cari...">
        </div>
      </form>
  </div>

  <div class="main-menu menu-trans normalize">
    <div class="menu-title">
      <h3>MIZONE ISOTONIC</h3>
      <p>OUR PRODUCTS</p>
    </div>
    <div class="menu-slider"></div>
  </div>
  <div class="main-slider">
    <?php if(isset($sliders) && count($sliders) > 0 ): foreach($sliders as $s): $value = json_decode_table($s, default_language()); ?>
      <div class="slide-item is-mobile" style="background: url(<?php echo image_get_src($value["bg_m"]) ?>) no-repeat center center / cover;">
        <div class="row pt-6">
          <div class="col-lg-4 col-ipd">
            <div class="text-img sld-1 fadeInDown animated delay-2">
              <img src="<?php echo image_get_src($value["text_m"]) ?>" class="img-fluid" alt="">
            </div>
          </div>
          <div class="col-lg-8 col-ipd">
            <div class="object-img fadeInDown animated delay-3">
              <img src="<?php echo image_get_src($value["content_m"]) ?>" class="img-fluid" alt="">
            </div>
          </div>
        </div>
        <?php if( !empty($value['video']) || !empty($value["video_url"]) ):?>
          <div class="video-box fadeInUp animated delay-4">
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
  
  <div class="section-product" style="background-image: url('<?php echo base_url('images/new-assets/ph-asnawi-product.jpg'); ?>')">
    <img class="product-showcase d-none d-md-block d-lg-block" src="<?php echo base_url('images/new-assets/MINI-350ML.png'); ?>" alt="">
    <img class="product-showcase d-block d-md-none d-lg-none" src="<?php echo base_url('images/new-assets/packshot-mizone.png'); ?>" alt="">
    <div class="container">
      <div class="row">
         <div class="col-12">
            <a href="<?= base_url('produk') ?>" class="btn btn-primary products">Produk Lainnya</a>
         </div>
      </div>
    </div>
  </div>
  
  <div class="section-article" style="background-image: url('<?php echo base_url('images/new-assets/bg-article.jpg'); ?>');">
    <div class="container">
      <div class="row">
        <div class="col">
          <h4 class="title-main-bold text-center mb-4">Info Mizone</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <h5 class="title-secondary mb-4">Artikel</h5>
        </div>
        <div class="col-6">
          <a href="<?= base_url('articles') ?>" class="link">Lebih Banyak ></a>
        </div>
      </div>
      <div class="row">
      <?php if(isset($articles) && count($articles) > 0 ): foreach($articles as $article): $value = json_decode_table($article, default_language()); ?>
        <div class="col-12 col-md-4">
          <div class="card">
              <div class="card-img" style="background-image: url('<?php echo image_get_src($value["image"]) ?>');">
                <a href="<?= base_url('article').'/'.$value['slug'] ?>"><h5 class="title-card"><?= $value['title'] ?></h5></a>
              </div>
              <div class="card-content">
                <p> <?= strip_tags($value['excerpt']) ?> </p>
                <a href="<?= base_url('article').'/'.$value['slug'] ?>" class="btn btn-secondary">Selengkapnya</a>
              </div>
          </div>
        </div>
      <?php endforeach; endif; ?>
      </div>
      <div class="row">
        <div class="col-6">
          <h5 class="title-secondary mb-4">Acara</h5>
        </div>
        <div class="col-6">
          <a href="<?= base_url('events') ?>" class="link">Lebih Banyak ></a>
        </div>
      </div>
      <div class="row">
      <?php if(isset($events) && count($events) > 0 ): foreach($events as $event): $value = json_decode_table($event, default_language()); ?>
        <div class="col-12 col-md-4">
          <div class="card">
              <div class="card-img" style="background-image: url('<?php echo image_get_src($value["image"]) ?>');">
                <a href="<?= base_url('event').'/'.$value['slug'] ?>"><h5 class="title-card"><?= $value['title'] ?></h5></a>
              </div>
              <div class="card-content">
                <p> <?= strip_tags($value['excerpt']) ?> </p>
                <a href="<?= base_url('event').'/'.$value['slug'] ?>" class="btn btn-secondary">Selengkapnya</a>
              </div>
          </div>
        </div>
      <?php endforeach; endif; ?>
      </div>
    </div>
  </div>

  
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <h3 class="title-footer">BELI MIZONE DI</h3>
          <ul>
            <li><a href="https://www.tokopedia.com/aqua-store/etalase/mizone"><img src="<?php echo base_url('images/new-assets/tokopedia.png'); ?>" alt="Tokopedia"></a></li>
            <li><a href="https://www.blibli.com/brand/aqua-official-store?promoTab=false&excludeProductList=false&brand=MIZONE"><img src="<?php echo base_url('images/new-assets/blibli.png'); ?>" alt="Blibli"></a></li>
            <li><a href="https://shopee.co.id/shop/47694662/search?shopCollection=8485409"><img src="<?php echo base_url('images/new-assets/shopee.png'); ?>" alt="Shopee"></a></li>
            <br />
            <li class="footer-customisation"><a href="https://www.jd.id/product/_12734716/106480790.html?addOrigin=epi_camp_24803-757056"><img src="<?php echo base_url('images/new-assets/jd.png'); ?>" alt="JD"></a></li>
            <li><a href="https://www.klikindomaret.com/search/?key=mizone"><img src="<?php echo base_url('images/new-assets/klikindomart.png'); ?>" alt="Klik"></a></li>
            <li><a href="https://www.alfacart.com/product/mizone-activ-pet-500ml-707179"><img src="<?php echo base_url('images/new-assets/alfacart.png'); ?>" alt="Alfacart"></a></li>
          </ul>
          <h3 class="title-footer mt-4">TEMUKAN KAMI</h3>
          <ul>
            <li><a href="https://www.instagram.com/mizoneid/"><img src="<?php echo base_url('images/new-assets/instagram.png'); ?>" alt="Instagram"></a></li>
            <li><a href="https://www.facebook.com/mizone"><img src="<?php echo base_url('images/new-assets/facebook.png'); ?>" alt="Facebook"></a></li>
            <li><a href="https://twitter.com/mizoneid"><img src="<?php echo base_url('images/new-assets/twitter.png'); ?>" alt="Twitter"></a></li>
          </ul>
          <p>COPYRIGHT MIZONE 2021</p>
        </div>
      </div>
    </div>
  </footer>

  
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="<?php echo base_url('js/jquery-3.5.1.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/popper.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/mediaelement-and-player.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/main.min.js'); ?>"></script>
  <script>
    
    var prod = false;
    $( document ).ready(function() {
        setTimeout(function(){ get_products(); }, 10000);
    });
    
    $('.trigger-menu').on('click', function() {
        $('.menu-container').toggleClass('active');
    })
    
    $('.menu-mobile').on('click', function(){
        get_products();
    });
    
    if ($(window).width() < 767) {
        $('.has-submenu').on('click', function() {
            $('.submenu').toggleClass('active');
        })
    }
    
    function get_products(){
        if( prod == false ){
            $.ajax({
              url: "<?php echo base_url('products-all'); ?>",
            })
              .done(function( data ) {
                  
                $('.menu-slider').html( jQuery.parseJSON(data) );
                $('.menu-slider').slick({
                  dots: true,
                });
                $(".is-view-content").hide(),
                $(".view-content").on("click", ".btn-view", function (i) {
                    i.preventDefault(), $(this).closest(".view-content").find(".is-view-content").slideToggle(400);
                }),
                $(".is-view-content").on("click", ".close-view", function () {
                    $(this).closest(".is-view-content").slideToggle(400);
                }),
                $(".menu-slider").on("click", ".slick-next", function () {
                    $(".is-view-content").slideUp(400);
                }),
                $(".menu-slider").on("click", ".slick-prev", function () {
                    $(".is-view-content").slideUp(400);
                });
                $('.menu-slider').on('swipe', function(event, slick, direction){
                  $('.is-view-content').slideUp(400);
                });
                
                prod = true;
            });
        }
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