<?= $this->extend('partials/main') ?>
  
<?= $this->section('content') ?>
  <style>body {color: #1c4094;}</style>

  <div class="section-article-single">
    <div class="container mt-0 mt-lg-5">
        <div class="row mt-0 mt-lg-5">
            <div class="col mt-5">
                <h1 class="title-main-bold mt-5"><?= $article['title'] ?></h1>
                <h5 class="mb-4">Ditulis: <?= format_indo(date('Y-m-d', strtotime($article['publish_date']))) ?> |Ditulis oleh: <?= !empty($article['author']) ? $article['author'] : 'mizone' ?></h5>
            </div>
        </div>
    </div>
    <div class="container-fluid mb-3">
        <img src="<?php echo base_url(image_get_src($article["image"])) ?>" class="w-100" alt="">
    </div>
    <div class="container">
      <div class="row">
          <div class="col">
              <div class="article-main">
                <?= str_replace('../../../', '../', $article['content']) ?>
              </div>
          </div>
      </div>
      <div class="row justify-content-center mt-5">
      <?php if(isset($articles) && count($articles) > 0 ): foreach($articles as $index => $article): $value = json_decode_table($article, default_language()); ?>
        <div class="col-12 col-md-4">
          <div class="card">
              <div class="card-img" style="background-image: url('<?php echo base_url(image_get_src($value["image"])) ?>');">
                <a href="<?= base_url('article').'/'.$value['slug'] ?>"><h5 class="title-card"><?= $value['title'] ?></h5></a>
              </div>
              <?php if ($index === 0): ?>
                <a href="<?= base_url('article').'/'.$value['slug'] ?>" class="link-article">< Sebelumnya</a>
              <?php else: ?>
                <a href="<?= base_url('article').'/'.$value['slug'] ?>" class="link-article text-right">Selanjutnya ></a>
              <?php endif; ?>
          </div>
        </div>
      <?php endforeach; endif; ?>
      </div>
    </div>
  </div>

  <?= $this->endSection() ?>