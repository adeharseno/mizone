<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>
    <!-- Demo styles -->
    <style>.swiper-container{width:100%;height:100%;margin-left:auto;margin-right:auto}.swiper-slide{text-align:center;font-size:18px;display:-webkit-box;display:-ms-flexbox;display:-webkit-flex;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;-webkit-justify-content:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;-webkit-align-items:center;align-items:center}.lemon{background-position:left;background-size:cover;background-repeat:no-repeat;background-image:url('<?php echo base_url('images/new-assets/lychee-lemon.jpg'); ?>')}.starfruit{background-position:left;background-size:cover;background-repeat:no-repeat;background-image:url('<?php echo base_url('images/new-assets/starfruit.jpg'); ?>')}.cherry{background-position:left;background-size:cover;background-repeat:no-repeat;background-image:url('<?php echo base_url('images/new-assets/Cherry-Blossom.jpg'); ?>')}.cranberry{background-position:left;background-size:cover;background-repeat:no-repeat;background-image:url('<?php echo base_url('images/new-assets/Cranberry.jpg'); ?>')}@media only screen and (max-width:767px){.lemon{background-image:url('<?php echo base_url('images/new-assets/p-lychee-lemon.jpg'); ?>')}.starfruit{background-image:url('<?php echo base_url('images/new-assets/p-starfruit.jpg'); ?>')}.cherry{background-image:url('<?php echo base_url('images/new-assets/p-cherry-blossom.jpg'); ?>')}.cranberry{background-image:url('<?php echo base_url('images/new-assets/p-cranberry.jpg'); ?>')}.slider-images{width:80%}}.sec-floating{color: white; font-size: 22px; text-align: left; position: absolute; max-width: 600px; bottom: 24%; right: 13%;}@media only screen and (max-width: 767px){.sec-floating{display:none;}}</style>

    <!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="slider-items lemon">
                  <img src="<?php echo base_url('images/new-assets/lemon.png'); ?>" class="slider-images" alt="" />
                  <div class="sec-floating">
                      <p>Keringetan abis beraktivitas penuh dari pagi? Mizone Activ', dengan rasa favorit konsumen: Lychee Lemon, balikin cairan tubuh dan pembentukan energi, bantu badan siap lanjut terus! Kini tersedia dalam 2 ukuran: 500ml & Mini 350ml yang praktis di bawa kemana aja cocok buat kalian yg aktif!</p>
                  </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slider-items starfruit">
                  <img src="<?php echo base_url('images/new-assets/starfruit.png'); ?>" class="slider-images" alt="" />
                  <div class="sec-floating">
                      <p>Panas-panasan di jalanan yang macet? Minum Mizone Move On, rasa Belimbingnya balikin cairan tubuh yang hilang & pembentukan energi, bantu badan siap hadepin kemacetan pulang kantor!</p>
                  </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slider-items cherry">
                  <img src="<?php echo base_url('images/new-assets/cherry.png'); ?>" class="slider-images" alt="" />
                  <div class="sec-floating">
                      <p>Mood down abis cuci piring? Minum Mizone Mood Up, dengan rasa Cranberry-nya, bantu balikin cairan tubuh yang hilang dan pembentukan energi, bantu badan siap bersih-bersih rumah!</p>
                  </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slider-items cranberry">
                  <img src="<?php echo base_url('images/new-assets/cranberry.png'); ?>" class="slider-images" alt="" />
                  <div class="sec-floating">
                      <p>Capek duduk depan laptop meeting seharian dari pagi? Break Free dulu lah dengan Mizone, rasa Cherry Blossom-nya bantu balikin cairan tubuh yang hilang dan pembentukan energi, yang penting untuk siap lanjut kelarin semua deadline lo!</p>
                  </div>
                </div>
            </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>

 <?= $this->endSection() ?>