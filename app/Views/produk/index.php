<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>
    <!-- Demo styles -->
    <style>.lemon{height:100vh!important;background-position:left;background-size:cover;background-repeat:no-repeat;background-image:url("<?php echo base_url("images/new-assets/lychee-lemon.jpg"); ?>")}.starfruit{height:100vh!important;background-position:left;background-size:cover;background-repeat:no-repeat;background-image:url("<?php echo base_url("images/new-assets/starfruit.jpg"); ?>")}.cherry{height:100vh!important;background-position:left;background-size:cover;background-repeat:no-repeat;background-image:url("<?php echo base_url("images/new-assets/Cherry-Blossom.jpg"); ?>")}.cranberry{height:100vh!important;background-position:left;background-size:cover;background-repeat:no-repeat;background-image:url("<?php echo base_url("images/new-assets/Cranberry.jpg"); ?>")}.swiper-container{top:86px;height:calc(100% - 55px)}.sec-floating{color:#fff;font-size:22px;text-align:left;position:absolute;max-width:600px;bottom:24%;right:13%}.text-custom{font-family:myriad;font-size:18px}@media only screen and (max-width:768px){.lemon{background-position:-30px;background-image:url("<?php echo base_url("images/new-assets/p-lychee-lemon.jpg"); ?>")}.starfruit{background-position:-30px;background-image:url("<?php echo base_url("images/new-assets/p-starfruit.jpg"); ?>")}.cherry{background-position:-30px;background-image:url("<?php echo base_url("images/new-assets/p-cherry-blossom.jpg"); ?>")}.cranberry{background-position:-30px;background-image:url("<?php echo base_url("images/new-assets/p-cranberry.jpg"); ?>")}.slider-images{width:60%}.sec-floating{display:none}}@media only screen and (min-height:800px){.slider-images{width:70%}}@media (min-device-width:768px) and (max-device-width:1024px){.slider-images{width:55%}.cherry,.cranberry,.lemon,.starfruit{background-position:left}}@media (min-device-width:1024px) and (max-device-width:1366px){.sec-floating{max-width:520px;bottom:40%;right:5%}}</style>

    <!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div id="activ" class="swiper-slide">
                <div class="slider-items lemon">
                  <img src="<?php echo base_url('images/new-assets/lemon.png'); ?>" class="slider-images" alt="" />
                  <div class="sec-floating">
                      <img src="<?php echo base_url('images/new-assets/lychee-text.png'); ?>" alt="" />
                      <p class="text-custom">Keringetan abis beraktivitas penuh dari pagi? Mizone Activ', dengan rasa favorit konsumen: Lychee Lemon, balikin cairan tubuh dan pembentukan energi, bantu badan siap lanjut terus! Kini tersedia dalam 2 ukuran: 500ml & Mini 350ml yang praktis di bawa kemana aja cocok buat kalian yg aktif!</p>
                  </div>
                </div>
            </div>
            <div id="move-on" class="swiper-slide">
                <div class="slider-items starfruit">
                  <img src="<?php echo base_url('images/new-assets/starfruit.png'); ?>" class="slider-images" alt="" />
                  <div class="sec-floating">
                      <img src="<?php echo base_url('images/new-assets/starfruit-text.png'); ?>" alt="" />
                      <p class="text-custom">Panas-panasan di jalanan yang macet? Minum Mizone Move On, rasa Belimbingnya balikin cairan tubuh yang hilang & pembentukan energi, bantu badan siap hadepin kemacetan pulang kantor!</p>
                  </div>
                </div>
            </div>
            <div id="break-free" class="swiper-slide">
                <div class="slider-items cherry">
                  <img src="<?php echo base_url('images/new-assets/cherry.png'); ?>" class="slider-images" alt="" />
                  <div class="sec-floating">
                      <img src="<?php echo base_url('images/new-assets/cherry-text.png'); ?>" alt="" />
                      <p class="text-custom">Mood down abis cuci piring? Minum Mizone Mood Up, dengan rasa Cranberry-nya, bantu balikin cairan tubuh yang hilang dan pembentukan energi, bantu badan siap bersih-bersih rumah!</p>
                  </div>
                </div>
            </div>
            <div id="mood-up" class="swiper-slide">
                <div class="slider-items cranberry">
                  <img src="<?php echo base_url('images/new-assets/cranberry.png'); ?>" class="slider-images" alt="" />
                  <div class="sec-floating">
                      <img src="<?php echo base_url('images/new-assets/cranberry-text.png'); ?>" alt="" />
                      <p class="text-custom">Capek duduk depan laptop meeting seharian dari pagi? Break Free dulu lah dengan Mizone, rasa Cherry Blossom-nya bantu balikin cairan tubuh yang hilang dan pembentukan energi, yang penting untuk siap lanjut kelarin semua deadline lo!</p>
                  </div>
                </div>
            </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>

 <?= $this->endSection() ?>