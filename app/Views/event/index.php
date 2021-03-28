<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>
  <div class="section-article" style="background-image: url('<?php echo base_url('images/new-assets/bg-article.jpg'); ?>');">
    <div class="container mt-0 mt-lg-5">
      <div class="row mt-0 mt-lg-5">
        <div class="col mt-3 mt-lg-5">
          <h5 class="title-secondary mb-4">Acara</h5>
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
      <?php echo $pager->links('custom', 'custom_pagination') ?> 
    </div>
  </div>

<?= $this->endSection() ?>