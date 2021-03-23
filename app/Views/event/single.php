<?= $this->extend('partials/main') ?>
  
<?= $this->section('content') ?>
  <style>body {color: #1c4094;}</style>
  
  <div class="section-article-single">
    <div class="container mt-5">
        <div class="row mt-5">
            <div class="col mt-5">
                <h1 class="title-main-bold mt-5"><?= $event['title'] ?></h1>
                <h5 class="mb-4">Ditulis: <?= format_indo(date('Y-m-d', strtotime($event['publish_date']))) ?> |Ditulis oleh: <?= !empty($event['author']) ? $event['author'] : 'mizone' ?></h5>
            </div>
        </div>
    </div>
    <div class="container-fluid mb-3">
        <img src="<?php echo base_url(image_get_src($event["image"])) ?>" class="w-100" alt="">
    </div>
    <div class="container">
      <div class="row">
          <div class="col">
              <div class="article-main">
                <?= str_replace('../../../', '../', $event['content']) ?>
              </div>
          </div>
      </div>
      <div class="row justify-content-center mt-5">
      <?php if(isset($events) && count($events) > 0 ): foreach($events as $index => $event): $value = json_decode_table($event, default_language()); ?>
        <div class="col-12 col-md-4">
          <div class="card">
              <div class="card-img" style="background-image: url('<?php echo base_url(image_get_src($value["image"])) ?>');">
                <a href="<?= base_url('event').'/'.$value['slug'] ?>"><h5 class="title-card"><?= $value['title'] ?></h5></a>
              </div>
              <?php if ($index === 0): ?>
                <a href="<?= base_url('event').'/'.$value['slug'] ?>" class="link-article">< Sebelumnya</a>
              <?php else: ?>
                <a href="<?= base_url('event').'/'.$value['slug'] ?>" class="link-article text-right">Selanjutnya ></a>
              <?php endif; ?>
          </div>
        </div>
      <?php endforeach; endif; ?>
      </div>
    </div>
  </div>
  
  <?= $this->endSection() ?>