<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullview/dist/fullview.min.css" />
    <style>#fv-dots ul a.active span{background-color:#003182!important}.cherry,.cranberry,.lemon,.starfruit{background-position:left;background-size:cover;background-repeat:no-repeat;height:100%!important;position:relative}.cherry .container,.cherry .row,.cranberry .container,.cranberry .row,.lemon .container,.lemon .row,.starfruit .container,.starfruit .row{height:100%}.lemon{background-image:url("<?php echo base_url("images/new-assets/lychee-lemon.jpg"); ?>")}.starfruit{background-image:url("<?php echo base_url("images/new-assets/starfruit.jpg"); ?>")}.cherry{background-image:url("<?php echo base_url("images/new-assets/Cherry-Blossom.jpg"); ?>")}.cranberry{background-image:url("<?php echo base_url("images/new-assets/Cranberry.jpg"); ?>")}.center-vertical{color:#fff;font-size:22px;text-align:left;max-width:600px;position:absolute;top:50%;transform:translate(0,-50%)}.center-vertical label{font-size:36px}.center-vertical img{width:100%;margin-left:-24px}.swiper-pagination{height:100%;top:auto!important}@media only screen and (max-width:892px){.lemon{background-image:url("<?php echo base_url("images/new-assets/p-lychee-lemon.jpg"); ?>")}.starfruit{background-image:url("<?php echo base_url("images/new-assets/p-starfruit.jpg"); ?>")}.cherry{background-image:url("<?php echo base_url("images/new-assets/p-cherry-blossom.jpg"); ?>")}.cranberry{background-image:url("<?php echo base_url("images/new-assets/p-cranberry.jpg"); ?>")}.cherry.show .fullview--hidden,.cranberry.show .fullview--hidden,.lemon.show .fullview--hidden,.starfruit.show .fullview--hidden{bottom:0}.slider-images{width:60%}.center-vertical{position:relative;top:0;transform:translate(0);max-width:none;margin-top:82px}.center-vertical .text-custom{display:none}.center-vertical img{margin-left:-14px}.lemon .fullview--trigger{background:rgba(243,107,33,.4)}.starfruit .fullview--trigger{background:rgb(26 117 17 / 40%)}.cherry .fullview--trigger{background:rgba(230 27 76 / 40%)}.cranberry .fullview--trigger{background:rgba(187 44 126 / 40%)}.lemon .fullview--hidden{background:rgba(243,107,33,.9)}.starfruit .fullview--hidden{background:rgba(26 117 17 / 90%)}.cherry .fullview--hidden{background:rgba(230 27 76 / 90%)}.cranberry .fullview--hidden{background:rgba(187 44 126 / 90%)}.fullview--trigger{text-align:center;position:absolute;bottom:0;left:0;right:0;width:100%;height:40px;transition:all .1s ease}.fullview--trigger span{font-size:30px;font-weight:800;color:#fff;height:10px;display:block;position:relative;top:-16px}.fullview--trigger p{font-size:16px;color:#fff}.fullview--hidden{color:#fff;padding:100px 24px;position:absolute;bottom:-100%;left:0;font-size:16px;right:0;width:100%;height:100%;transition:all .1s ease;display:block;font-family:myriad}.fullview--close-trigger{display:block;margin-bottom:50px;color:#fff;font-size:20px;text-align:center}.fullview--close-trigger label{display:block;margin:0}.fullview--close-trigger span{display:block;transform:rotate(180deg);margin-top:-10px;font-weight:700}}@media (min-device-height:800px) and (max-device-width:820px){.slider-images{width:70%}}@media (min-device-width:892px) and (max-device-width:1024px){.slider-images{width:55%}.cherry,.cranberry,.lemon,.starfruit{background-position:left}}@media (min-device-width:1024px) and (max-device-width:1366px){.sec-floating{max-width:520px;bottom:40%;right:5%}}</style>
    <div id="fullview">
        <div id="activ" class="lemon">
            <img src="<?php echo base_url('images/new-assets/lemon.png'); ?>" class="slider-images" alt="" />
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 offset-lg-5 col-lg-8">
                        <div class="center-vertical">
                          <img src="<?php echo base_url('images/new-assets/lychee-text.png'); ?>" class="w-100" alt="" />
                          <label>500ML & 300ML</label>
                          <p class="text-custom">Keringetan abis beraktivitas penuh dari pagi? Mizone Activ', dengan rasa favorit konsumen: Lychee Lemon, balikin cairan tubuh dan pembentukan energi, bantu badan siap lanjut terus! Kini tersedia dalam 2 ukuran: 500ml & Mini 350ml yang praktis di bawa kemana aja cocok buat kalian yg aktif!</p>
                        </div>
                    </div>
                </div>
            </div>
            <a href="javascript:;" class="fullview--trigger">
                <span>^</span>
                <p>LIHAT DESKRIPSI</p>
            </a>
            <div class="fullview--hidden">
                <a href="javascript:;" class="fullview--close-trigger"><label>Close</label><span>^</span></a>
                <p class="text-custom">Keringetan abis beraktivitas penuh dari pagi? Mizone Activ', dengan rasa favorit konsumen: Lychee Lemon, balikin cairan tubuh dan pembentukan energi, bantu badan siap lanjut terus! Kini tersedia dalam 2 ukuran: 500ml & Mini 350ml yang praktis di bawa kemana aja cocok buat kalian yg aktif!</p>
            </div>
        </div>
        <div id="move-on" class="starfruit">
            <img src="<?php echo base_url('images/new-assets/starfruit.png'); ?>" class="slider-images" alt="" />
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 offset-lg-5 col-lg-8">
                        <div class="center-vertical">
                          <img src="<?php echo base_url('images/new-assets/starfruit-text.png'); ?>" alt="" />
                          <label>500ML</label>
                          <p class="text-custom">Panas-panasan di jalanan yang macet? Minum Mizone Move On, rasa Belimbingnya balikin cairan tubuh yang hilang & pembentukan energi, bantu badan siap hadepin kemacetan pulang kantor!</p>
                        </div>
                    </div>
                </div>
            </div>
            <a href="javascript:;" class="fullview--trigger">
                <span>^</span>
                <p>LIHAT DESKRIPSI</p>
            </a>
            <div class="fullview--hidden">
                <a href="javascript:;" class="fullview--close-trigger"><label>Close</label><span>^</span></a>
                <p class="text-custom">Panas-panasan di jalanan yang macet? Minum Mizone Move On, rasa Belimbingnya balikin cairan tubuh yang hilang & pembentukan energi, bantu badan siap hadepin kemacetan pulang kantor!</p>
            </div>
        </div>
        <div id="break-free" class="cherry">
            <img src="<?php echo base_url('images/new-assets/cherry.png'); ?>" class="slider-images" alt="" />
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 offset-lg-5 col-lg-8">
                        <div class="center-vertical">
                          <img src="<?php echo base_url('images/new-assets/cherry-text.png'); ?>" alt="" />
                          <label>500ML</label>
                          <p class="text-custom">Mood down abis cuci piring? Minum Mizone Mood Up, dengan rasa Cranberry-nya, bantu balikin cairan tubuh yang hilang dan pembentukan energi, bantu badan siap bersih-bersih rumah!</p>
                        </div>
                    </div>
                </div>
            </div>
            <a href="javascript:;" class="fullview--trigger">
                <span>^</span>
                <p>LIHAT DESKRIPSI</p>
            </a>
            <div class="fullview--hidden">
                <a href="javascript:;" class="fullview--close-trigger"><label>Close</label><span>^</span></a>
                <p class="text-custom">Mood down abis cuci piring? Minum Mizone Mood Up, dengan rasa Cranberry-nya, bantu balikin cairan tubuh yang hilang dan pembentukan energi, bantu badan siap bersih-bersih rumah!</p>
            </div>
        </div>
        <div id="mood-up" class="cranberry">
            <img src="<?php echo base_url('images/new-assets/cranberry.png'); ?>" class="slider-images" alt="" />
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 offset-lg-5 col-lg-8">
                        <div class="center-vertical">
                          <img src="<?php echo base_url('images/new-assets/cranberry-text.png'); ?>" alt="" />
                          <label>500ML</label>
                          <p class="text-custom">Capek duduk depan laptop meeting seharian dari pagi? Break Free dulu lah dengan Mizone, rasa Cherry Blossom-nya bantu balikin cairan tubuh yang hilang dan pembentukan energi, yang penting untuk siap lanjut kelarin semua deadline lo!</p>
                        </div>
                    </div>
                </div>
            </div>
            <a href="javascript:;" class="fullview--trigger">
                <span>^</span>
                <p>LIHAT DESKRIPSI</p>
            </a>
            <div class="fullview--hidden">
                <a href="javascript:;" class="fullview--close-trigger"><label>Close</label><span>^</span></a>
                <p class="text-custom">Capek duduk depan laptop meeting seharian dari pagi? Break Free dulu lah dengan Mizone, rasa Cherry Blossom-nya bantu balikin cairan tubuh yang hilang dan pembentukan energi, yang penting untuk siap lanjut kelarin semua deadline lo!</p>
            </div>
        </div>
    </div>

 <?= $this->endSection() ?>