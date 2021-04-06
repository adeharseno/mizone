<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="description" content="<?= (isset($meta_desc) && !empty($meta_desc)) ? $meta_desc : 'Minuman Isotonik + Vitamin B3 B6 B12 bantu badan siap lanjut terus!' ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

  <link rel="icon" href="images/favicon.ico" type="image/ico">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url('css/all.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('css/customs.css'); ?>">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
  <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css" />

  <title><?= (isset($meta_title) && !empty($meta_title)) ? $meta_title : 'Mizone Isotonik + Vitamin B' ?></title>
   <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KDQLRG4');</script>
    <!-- End Google Tag Manager -->


</head>
<body>
  <?php
    if (isset($different_class) && $different_class) $classNav = 'aaaa';
    else $classNav = 'bbbb';
  ?>
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
  <header class="header-main" id="headerMain">
    <div class="row align-items-center">
      <div class="col-3">
        <a href="/"><div class="logo"></div></a>
      </div>
      <div class="col-9 text-right">
          <div class="burger">
              <div class="menu menu-mobile">
                <div class="line line-1"></div>
                <div class="line line-2"></div>
                <div class="line line-3"></div>
              </div>
          </div>
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
      </div>
    </div>
  </header>
