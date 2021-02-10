<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <link rel="icon" href="<?php echo base_url('images/favicon.ico'); ?>" type="image/ico">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
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
      <?php $value = json_decode_table($product, default_language()); ?>
      <div class="col-md-10">
        <div class="for-bg" style="background: url('<?php echo base_url( image_get_src($value["bg_d"]) ) ?>') no-repeat left center"></div>
        <div class="row align-items-center aligntment-row-over">
          <div class="col-8">
            <img src="<?php echo base_url( image_get_src($value["content_d"]) ) ?>" class="img-fluid" alt="">
          </div>
          <div class="col-4">
            <div class="aligntmen-over-left">
              <img src="<?php echo base_url( image_get_src($value["varian"]) ) ?>" class="text-img-d" alt="">
              <h3 class="sub-olo mb-4"><?php echo $value['subtitle']; ?></h3>
              <p class="text-white f-28 mi-desc"><?php echo $value['content']; ?></p>
              <div class="sabi-rig mt-5">
                <h4 class="mb-0">
                  <?php echo $value['sabi']; ?> <br>
                  <span><?php echo $value['sabi_next']; ?></span>
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
  <script src="<?php echo base_url('js/jquery-3.4.1.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/popper.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/main.min.js'); ?>"></script>

  <script>

  </script>
</body>
</html>