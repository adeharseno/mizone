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
  <?php
    if (isset($different_class) && $different_class) $classNav = 'aaaa';
    else $classNav = 'bbbb';
  ?>
     <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KDQLRG4"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

  <div class="loader d-none">
    <div class="loader-content">
      <i class="spinner"></i>
      <p>LOADING</p>
    </div>
  </div>
  <header class="header-main" id="headerMain">
    <div class="row align-items-center">
      <div class="col-12 col-md-4">
        <a href="/"><div class="logo"></div></a>
      </div>
      <div class="col-12 col-md-8 text-right">
          <div class="menu-container">
              <nav class="navbars">
                  <ul class="menus">
                    <li class="menu-item">
                      <a class="anchor" href="<?= base_url('produk') ?>">Produk</a>
                    </li>
                    <li class="menu-item">
                      <a class="anchor" href="#">Info Mizone</a>
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
                      <a class="anchor" href="<?= base_url('faq') ?>">#FAQ</a>
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
