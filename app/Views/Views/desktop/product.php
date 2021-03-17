<?php
// file headers.php
header("Strict-Transport-Security:max-age=31536000; includeSubDomains; preload");
header('X-XSS-Protection: 1;mode=block');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
$val = json_decode_table($product, default_language());
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="description" content="<?php echo $val['meta_desc']; ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <link rel="icon" href="<?php echo base_url('images/favicon.ico'); ?>" type="image/ico">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('css/styles.css'); ?>">

  <title>Produk Mizone | <?php echo $val['title']; ?></title>

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
                <img src="<?php echo base_url( image_get_src($value["bottle"]) ) ?>" class="img-fluid product-shade" alt="">
              </a>
            </div>
          <?php endforeach; endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container-mz vh-100">
    <div class="row vh-100 align-items-center">
      <div class="col-md-2">
        <a href="/#product-list" class="nav-back"><i class="arrow-back"></i> KEMBALI</a>
        <div class="nav nav-product-tabs flex-column">
        <?php if(isset($products) && count($products) > 0 ): foreach($products as $p): $value = json_decode_table($p, default_language()); ?>
          <a href="<?php echo base_url('product/'.$p['slug']); ?>" class="nav-link mi-<?php echo $p['slug']; ?> <?php echo ($p['slug'] == $slug) ? 'active' : '@@active'.$p['slug']; ?>">
            <img src="<?php echo base_url( image_get_src($value["menu"]) ) ?>" class="is-not-active" alt="">
            <img src="<?php echo base_url( image_get_src($value["menu_hover"]) ) ?>" class="is-active" alt="">
          </a>
        <?php endforeach; endif; ?>
        </div>
      </div>
      
      <div class="col-md-10">
        <div class="for-bg" style="background: url('<?php echo base_url( image_get_src($val["bg_d"]) ) ?>') no-repeat left center"></div>
        <div class="row align-items-center aligntment-row-over">
          <div class="col-8">
            <img src="<?php echo base_url( image_get_src($val["content_d"]) ) ?>" class="img-fluid" alt="">
          </div>
          <div class="col-4">
            <div class="aligntmen-over-left">
              <img src="<?php echo base_url( image_get_src($val["varian"]) ) ?>" class="text-img-d" alt="">
              <h3 class="sub-olo mb-4"><?php echo $val['subtitle']; ?></h3>
              <p class="text-white f-28 mi-desc"><?php echo $val['content']; ?></p>
              <div class="sabi-rig mt-5">
                <h4 class="mb-0">
                  <?php echo $val['sabi']; ?> <br>
                  <span><?php echo $val['sabi_next']; ?></span>
                </h4>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="<?php echo base_url('js/jquery-3.5.1.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/popper.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/main.min.js'); ?>"></script>

  <script>

  </script>
</body>
</html>