<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>
<div class="main-menu">
    <div class="logo-main-menu"><img src="<?php echo base_url('images/logo.png'); ?>" alt=""></div>
    <a href="javascript:;" id="closeMainmenu"><img src="<?php echo base_url('images/new-assets/close.png'); ?>" alt=""></a>
    <div class="container-mz">
      <div class="row align-items-center">
        <div class="col-md-4">
          <img src="<?php echo base_url('images/new-assets/headline-popup.png'); ?>" class="headline-popup" alt="">
        </div>
        <div class="col-md-8">
          <div class="row">
              <div class="col text-center">
                <a href="produk#activ" class="product-link custom">
                    <img src="<?php echo base_url('images/new-assets/MINI-350MLs.png'); ?>" class="img-fluid product-shade" alt="">
                </a>
              </div>
            <?php if(isset($products) && count($products) > 0 ): foreach($products as $p): $value = json_decode_table($p, default_language()); ?>
              <div class="col text-center">
                <a href="produk#<?php echo $p['slug']; ?>" class="product-link">
                  <img src="<?php echo image_get_src($value["bottle"]) ?>" class="img-fluid product-shade" alt="">
                </a>
              </div>
            <?php endforeach; endif; ?>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="swiper-container slider-main">
    <div class="swiper-wrapper">
        <?php if(isset($sliders) && count($sliders) > 0 ): foreach($sliders as $s): $value = json_decode_table($s, default_language()); ?>
            <?php if (!empty($value['target_url'])): ?>
            <a href="<?= $value['target_url'] ?>" class="swiper-slide" style="background-image: url(<?php echo image_get_src($value["bg_d"]) ?>); background-size: cover; background-repeat: no-repeat; background-position: center bottom;">
            <?php endif; ?>
                <div class="row">
                    <div class="col-12 align-self-center">
                        <img src="<?php echo image_get_src($value["content_d"]) ?>" class="img-fluid" alt="">
                    </div>
                </div>
            <?php if (!empty($value['target_url'])): ?>
            </a>
            <?php endif; ?>
      <?php endforeach; endif; ?>
    </div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>
  
<div class="section-product" style="background-image: url('<?php echo base_url('images/new-assets/bg-active-desktop.jpeg'); ?>')">
    <img class="product-showcase" src="<?php echo base_url('images/new-assets/MINI-350ML.png'); ?>" alt="">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-5"></div>
        <div class="col-12 col-md-7">
          <h5 class="title-secondary">ACTIV'</h5>
          <h4 class="title-main">LYCHEE LEMON</h4>
          <label>500 ML & 350 ML</label>
          <p class="text-custom">Keringetan abis beraktivitas penuh dari pagi? <br />
            Mizone Activ, dengan rasa favorit konsumen: Lychee Lemon! <br />
            Bisa balikin cairan tubuh dan pembentukan energi, bantu badan siap lanjut terus! <br />
            Kini tersedia dalam 2 ukuran 500ml & Mini 350ml yang praktis dibawa ke mana aja, cocok buat kalian yang aktif!</p>
          <a href="javascript:;" class="btn btn-primary menu">Produk Lainnya</a>
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

<div class="nav-bottom">
    <ul class="nav nav-pills nav-fill">
    <?php if(isset($products) && count($products) > 0 ): $i=0; foreach($products as $p): $value = json_decode_table($p, default_language()); $i++;?>
      <li class="nav-item">
        <a class="nav-link nav<?php echo $i; ?> slideInUp animated delay-<?php echo $i; ?>" href="product/<?php echo $p['slug']; ?>" style="background: url(<?php echo image_get_src($value["nav_bg"]) ?>) no-repeat 100% / cover;">
          <i class="ico-nav tab-<?php echo $p['slug']; ?>" style="background: url(<?php echo image_get_src($value["nav"]) ?>) no-repeat 50%/contain;"></i>
        </a>
      </li>
    <?php endforeach; endif; ?>
    </ul>
</div>
<?= $this->endSection() ?>
