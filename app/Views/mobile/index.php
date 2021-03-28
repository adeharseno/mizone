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
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <style>body{overflow:auto}.product-showcase{width:160px;position:relative;bottom:0}.section-product{padding:120px 0}.menu-slider,.slide-menu.container-mz{display:none!important}.main-menu.menu-trans.active{left:-20000px!important}.swiper-container{width:100%;height:100%}.swiper-slide{text-align:center;font-size:18px;background:#fff;display:-webkit-box;display:-ms-flexbox;display:-webkit-flex;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;-webkit-justify-content:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;-webkit-align-items:center;align-items:center}.swiper-container{height:calc(100% - 50px);margin-top:50px}.swiper-slide a{width:100%;height:100%}.menu-mobile{margin-top:0!important}.swiper-pagination-bullet{margin:4px 6px!important}.section-product p{font-family:myriad;font-size:14px!important}@media only screen and (max-width:767px){.menu-container{display:block;position:fixed;background:#003182;top:49px;bottom:0;left:-100%;width:100%;height:100%;z-index:999}.menu-container.active{left:0}.header-main{background:#003182}.menus{width:100%;padding-left:28px}.menu-item{display:block;margin:30px 0}.slick-slide div{width:100%}}.title-secondary{font-size:20px}.title-main{font-size:40px;margin:0}.section-product label{font-size:18px}.section-product p{font-size:16px}</style>

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
  
  <div class="swiper-container">
    <div class="swiper-wrapper">
        <?php if(isset($sliders) && count($sliders) > 0 ): foreach($sliders as $s): $value = json_decode_table($s, default_language()); ?>
        <div class="swiper-slide" style="background: url(<?php echo image_get_src($value["bg_m"]) ?>) no-repeat center center / cover;">
            <?php if (!empty($value['target_url'])): ?>
                <a href="<?= $value['target_url'] ?>">
            <?php endif; ?>
            <?php if (!empty($value['target_url'])): ?>
                </a>
            <?php endif; ?>
        </div>
        <?php endforeach; endif; ?>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
  </div>
  
  <div class="section-product" style="background-image: url('<?php echo base_url('images/new-assets/ph-asnawi-product.jpg'); ?>')">
    <div class="container">
      <div class="row">
         <div class="col-5">
            <img class="product-showcase" src="<?php echo base_url('images/new-assets/packshot-mizone.png'); ?>" alt="">
         </div>
         <div class="col-7">
            <h5 class="title-secondary">ACTIV'</h5>
            <h4 class="title-main">LYCHEE LEMON</h4>
            <label>500 ML & 350 ML</label>
            <p>Keringetan abis beraktivitas penuh dari pagi?
            Mizone Activ, dengan rasa favorit konsumen: Lychee Lemon!
            Bisa balikin cairan tubuh dan pembentukan energi, bantu badan siap lanjut terus!
            Kini tersedia dalam 2 ukuran 500ml & Mini 350ml yang praktis dibawa ke mana aja, cocok buat kalian yang aktif!</p>
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
  
  <a href="https://www.tokopedia.com/aqua-store/etalase/mizone" id="clickme" target="_blank">Beli Sekarang</a>
  
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
  <script src="<?php echo base_url('js/main.min.js'); ?>"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper('.swiper-container', {
      spaceBetween: 30,
      centeredSlides: true,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      }
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
    
  </script>
</body>

</html>