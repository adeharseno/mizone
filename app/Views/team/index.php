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
  <link rel="stylesheet" href="<?php echo base_url('css/customs.css'); ?>">
  <style>
    .main-slider .slider-items .img-fluid {
        height: 100vh !important;
        bottom: 0 !important;
    }
    .menu-item ul li a { 
        color: #1c4094;
    }
    .form-group.has-search input {
        border: 2px solid #1c4094;
        color: #1c4094;
    }
    .form-group.has-search input::-webkit-input-placeholder {
        color: #1c4094;
    }
    .form-group.has-search input:-ms-input-placeholder {
        color: #1c4094;
    }
    .form-group.has-search input::placeholder {
        color: #1c4094;
    }
  </style>
  

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
      <div class="col-12 col-md-4">
        <a href="/"><div class="logo"></div></a>
      </div>
      <div class="col-12 col-md-8 text-right">
          <div class="menu-item">
              <ul>
                  <li><a href="#">Produk</a></li>
                  <li>
                      <a href="#">Info Mizone</a>
                      <ul class="menu-inside">
                          <li><a href="#">Artikel</a></li>
                          <li><a href="#">Acara</a></li>
                      </ul>
                  </li>
                  <li><a href="#">#TeamMizone</a></li>
                  <li><a href="#">#FAQ</a></li>
              </ul>
              <form class="d-flex">
                <div class="form-group has-search">
                    <span class="form-control-feedback"><img src="<?php echo base_url('images/new-assets/search.png'); ?>" alt="Search" /></span>
                    <input type="text" class="form-control" placeholder="Cari...">
                </div>
              </form>
          </div>
          <!--<div class="menu">-->
          <!--  <div class="line line-1"></div>-->
          <!--  <div class="line line-2"></div>-->
          <!--  <div class="line line-3"></div>-->
          <!--</div>-->
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
    <div class="slider-items" style="background-color: white; no-repeat center center ; background-size: cover;">
      <div class="row vh-100">
        <div class="col-12 align-self-center">
          <img src="<?php echo base_url('images/new-assets/1.png'); ?>" class="img-fluid" alt="">
        </div>
      </div>
    </div>
    <div class="slider-items" style="background-color: white; no-repeat center center ; background-size: cover;">
      <div class="row vh-100">
        <div class="col-12 align-self-center">
          <img src="<?php echo base_url('images/new-assets/2.png'); ?>" class="img-fluid" alt="">
        </div>
      </div>
    </div>
    <div class="slider-items" style="background-color: white; no-repeat center center ; background-size: cover;">
      <div class="row vh-100">
        <div class="col-12 align-self-center">
          <img src="<?php echo base_url('images/new-assets/3.png'); ?>" class="img-fluid" alt="">
        </div>
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
            <li><a href="https://www.jd.id/product/_12734716/106480790.html?addOrigin=epi_camp_24803-757056"><img src="<?php echo base_url('images/new-assets/jd.png'); ?>" alt="JD"></a></li>
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
  <!--<script src="js/jquery-3.4.1.min.js"></script>-->
  <script src="<?php echo base_url('js/jquery-3.5.1.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/popper.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/mediaelement-and-player.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/main.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/customs.js'); ?>"></script>

  <script>
    
    // Sticky Header
    $(window).scroll(function() {
        if ($(this).scrollTop() > 250){  
            $('.header-main').addClass("sticky");
        }
        else{
            $('.header-main').removeClass("sticky");
        }
    });
    
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