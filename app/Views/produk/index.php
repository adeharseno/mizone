<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>


  <div class="main-slider slideInLeft animated">
    <div class="slider-items" style="background-image: url('<?php echo base_url('images/new-assets/lychee-lemon.jpg'); ?>'); no-repeat center center ; background-size: cover;">
      <img src="<?php echo base_url('images/new-assets/lemon.png'); ?>" class="slider-images" alt="" />
    </div>
  </div>
  
  <div class="main-slider slideInLeft animated">
    <div class="slider-items" style="background-image: url('<?php echo base_url('images/new-assets/starfruit.jpg'); ?>'); no-repeat center center ; background-size: cover;">
      <img src="<?php echo base_url('images/new-assets/starfruit.png'); ?>" class="slider-images" alt="" />
    </div>
  </div>
  
  <div class="main-slider slideInLeft animated">
    <div class="slider-items" style="background-image: url('<?php echo base_url('images/new-assets/Cherry-Blossom.jpg'); ?>'); no-repeat center center ; background-size: cover;">
      <img src="<?php echo base_url('images/new-assets/cherry.png'); ?>" class="slider-images" alt="" />
    </div>
  </div>
  
  <div class="main-slider slideInLeft animated">
    <div class="slider-items" style="background-image: url('<?php echo base_url('images/new-assets/Cranberry.jpg'); ?>'); no-repeat center center ; background-size: cover;">
      <img src="<?php echo base_url('images/new-assets/cranberry.png'); ?>" class="slider-images" alt="" />
    </div>
  </div>

 <?= $this->endSection() ?>