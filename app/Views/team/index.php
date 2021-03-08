<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>
<style>
    .anchor {
        color: #1c4094;
    }
    .form-group.has-search input {
        border: 2px solid #1c4094;
        color: #1c4094;
    }
    .form-group.has-search input::-webkit-input-placeholder {
        color: #1c4094;
    }
    .form-group.has-search input:-ms-input-placeholder {
        color: #1c4094;
    }
    .form-group.has-search input::placeholder {
        color: #1c4094;
    }
    .texts {
        color: white;
    }
    .has-search .form-control-feedback:before {
        background-image: url('../images/new-assets/search-blue.png');
    }
</style>

  <div class="main-slider slideInLeft animated team-slider">
    <div class="slider-items" style="background-color: white; no-repeat center center ; background-size: cover;">
      <div class="row vh-100">
        <div class="col-12 align-self-center">
          <img src="<?php echo base_url('images/new-assets/Asnawi-new.png'); ?>" class="img-fluid" alt="">
        </div>
      </div>
    </div>
    <div class="slider-items" style="background-color: white; no-repeat center center ; background-size: cover;">
      <div class="row vh-100">
        <div class="col-12 align-self-center">
          <img src="<?php echo base_url('images/new-assets/Grace-new.png'); ?>" class="img-fluid" alt="">
        </div>
      </div>
    </div>
    <div class="slider-items" style="background-color: white; no-repeat center center ; background-size: cover;">
      <div class="row vh-100">
        <div class="col-12 align-self-center">
          <img src="<?php echo base_url('images/new-assets/Tiago-new.png'); ?>" class="img-fluid" alt="">
        </div>
      </div>
    </div>
  </div>

 <?= $this->endSection() ?>