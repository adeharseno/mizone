<?= $this->extend('partials\main') ?>

<?= $this->section('content') ?>
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
      <?php if (!empty($value['target_url'])): ?>
      <a href="<?= $value['target_url'] ?>">
      <?php endif; ?>
        <div class="slider-items" style="background:url(<?php echo image_get_src($value["bg_d"]) ?>) no-repeat center center ; background-size: cover;">
          <div class="row vh-100">
            <div class="col-12 align-self-center">
              <img src="<?php echo image_get_src($value["content_d"]) ?>" class="img-fluid" alt="">
            </div>
          </div>
          <?php if( !empty($value['video']) || !empty($value["video_url"]) ):?>
            <div class="video-box fadeInDown animated">
              <img src="<?php echo image_get_src($value["video_thumb"]) ?>" alt="">
              <a href="#videocontent-<?php echo $value['id']; ?>" data-toggle="modal" class="btn-play-vid">
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
      <?php if (!empty($value['target_url'])): ?>
      </a>
      <?php endif; ?>
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
  
  <div class="section-product" style="background-image: url('<?php echo base_url('images/new-assets/bg-activ.jpg'); ?>')">
    <img class="product-showcase" src="<?php echo base_url('images/new-assets/MINI-350ML.png'); ?>" alt="">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-5"></div>
        <div class="col-12 col-md-7">
          <h5 class="title-secondary">ACTIV'</h5>
          <h4 class="title-main">LYCHEE LEMON</h4>
          <label>500 ML & 350 ML</label>
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus voluptatibus facere, corrupti quia voluptas cumque iure perspiciatis impedit veritatis vero fugiat modi quam qui reiciendis, repellendus beatae, quis corporis. Nesciunt?</p>
          <a href="<?= base_url('products') ?>" class="btn btn-primary">Produk Lainnya</a>
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