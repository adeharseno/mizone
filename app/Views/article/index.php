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

  <div class="section-article" style="background-image: url('<?php echo base_url('images/new-assets/bg-article.jpg'); ?>');">
    <div class="container mt-5">
      <div class="row mt-5">
        <div class="col mt-5">
          <h5 class="title-secondary mb-4">Artikel</h5>
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
          <div class="col-12 text-center">
                <nav class="d-flex" aria-label="Page navigation">
                  <ul class="pagination">
                    <li class="page-item">
                      <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                      </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                      </a>
                    </li>
                  </ul>
                </nav>
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
            <li><a href="#"><img src="<?php echo base_url('images/new-assets/tokopedia.png'); ?>" alt="Tokopedia"></a></li>
            <li><a href="#"><img src="<?php echo base_url('images/new-assets/blibli.png'); ?>" alt="Blibli"></a></li>
            <li><a href="#"><img src="<?php echo base_url('images/new-assets/shopee.png'); ?>" alt="Shopee"></a></li>
            <br />
            <li><a href="#"><img src="<?php echo base_url('images/new-assets/jd.png'); ?>" alt="JD"></a></li>
            <li><a href="#"><img src="<?php echo base_url('images/new-assets/klikindomart.png'); ?>" alt="Klik"></a></li>
            <li><a href="#"><img src="<?php echo base_url('images/new-assets/alfacart.png'); ?>" alt="Alfacart"></a></li>
          </ul>
          <h3 class="title-footer mt-4">TEMUKAN KAMI</h3>
          <ul>
            <li><a href="#"><img src="<?php echo base_url('images/new-assets/instagram.png'); ?>" alt="Instagram"></a></li>
            <li><a href="#"><img src="<?php echo base_url('images/new-assets/facebook.png'); ?>" alt="Facebook"></a></li>
            <li><a href="#"><img src="<?php echo base_url('images/new-assets/twitter.png'); ?>" alt="Twitter"></a></li>
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