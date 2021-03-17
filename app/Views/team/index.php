<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>
    <style>.asnawi{background-size:cover;background-position:-30px;background-repeat:no-repeat;background-image:url("<?php echo base_url("images/new-assets/tm-asnawi-m.jpg"); ?>")}.grace{background-size:cover;background-position:-30px;background-repeat:no-repeat;background-image:url("<?php echo base_url("images/new-assets/tm-grace-m.jpg"); ?>")}.tiago{background-size:cover;background-position:-30px;background-repeat:no-repeat;background-image:url("<?php echo base_url("images/new-assets/tm-tiago-m.jpg"); ?>")}.slider-items .row .col-12{position:relative;height:100%;overflow:hidden;display:block}.hiddens{background:#fff;padding:10px 24px;position:absolute;bottom:-500px;left:0;font-size:18px;right:0;width:100%;height:260px;transition:all .1s ease}.hiddens.active{bottom:0}.trigger-hiddens{position:absolute;width:93%;left:15px;right:0;bottom:0;z-index:999999999;text-align:center;background:rgba(243,107,33,.6);transition:all .1s ease}.trigger-hiddens.active{bottom:260px}.trigger-hiddens span{font-size:30px;font-weight:800;color:#fff;height:10px;display:block;position:relative;top:-18px}.trigger-hiddens p{font-size:16px;color:#fff}@media only screen and (min-width:767px){.anchor{color:#1c4094}.form-group.has-search input{border:2px solid #1c4094;color:#1c4094}.form-group.has-search input::-webkit-input-placeholder{color:#1c4094}.form-group.has-search input:-ms-input-placeholder{color:#1c4094}.form-group.has-search input::placeholder{color:#1c4094}.texts{color:#fff}.has-search .form-control-feedback:before{background-image:url(../images/new-assets/search-blue.png)}.asnawi{background-size:cover;background-position:center;background-repeat:no-repeat;background-image:url("<?php echo base_url("images/new-assets/bg-team.jpg"); ?>")}.grace{background-size:cover;background-position:center;background-repeat:no-repeat;background-image:url("<?php echo base_url("images/new-assets/bg-team.jpg"); ?>")}.tiago{background-size:cover;background-position:center;background-repeat:no-repeat;background-image:url("<?php echo base_url("images/new-assets/bg-team.jpg"); ?>")}.hiddens,.trigger-hiddens{display:none}}</style>

    <div class="main-slider slideInLeft animated team-slider">
        <div class="slider-items asnawi">
          <div class="row vh-100">
            <div class="col-12 align-self-center">
              <img src="<?php echo base_url('images/Asnawi-new.png'); ?>" class="img-fluid d-none d-md-block d-lg-block" alt="">
              <a href="javascript:;" class="trigger-hiddens">
                  <span>^</span>
                  <p>LIHAT PROFIL LENGKAP</p>
              </a>
              <div class="hiddens">Sebagai pemain bola, Asnawi sudah berkarir sejak tahun 2014 di PSM Makasar, dan masuk nominasi Pemain Muda Terbaik Liga I Indonesia di tahun 2019. <br />Sebelum bermain di SEA Games Manila 2019, Asnawi pernah tergabung sejak tahun 2013 dalam Timnas U-16, U-19, U-23 sampai tim senior Indonesia untuk kualifikasi piala dunia baru-baru ini. <br /> Di tengah pandemi COVID-19 dan kualifikasi yang vakum, Asnawi memulai karir internasionalnya dengan berkompetisi di liga korea bersama tim Ansan Greeners FC selama 1 musim.</div>
            </div>
          </div>
        </div>
        <div class="slider-items grace">
          <div class="row vh-100">
            <div class="col-12 align-self-center">
              <img src="<?php echo base_url('images/Grace-new.png'); ?>" class="img-fluid  d-none d-md-block d-lg-block" alt="">
              <a href="javascript:;" class="trigger-hiddens">
                  <span>^</span>
                  <p>LIHAT PROFIL LENGKAP</p>
              </a>
              <div class="hiddens">Dr. Grace Joselini, MMRS, Sp. KO. adalah Dokter Spesialis Kedokteran Olahraga, dan pernah tergabung dalam Tim Medis Timnas Putri di Asian Games 2018. <br />Selain suka berolahraga, Dr. Grace adalah finalis Puteri Indonesia 2009, dan menyandang gelar Puteri Indonesia Kepulauan Kalimantan di ajang tersebut. <br />Sebagai spesialis kedokteran olahraga, Dr. Grace sering menjadi narasumber kesehatan di berbagai acara TV dan webinar di instansi swasta maupun pemerintah.</div>
            </div>
          </div>
        </div>
        <div class="slider-items tiago">
          <div class="row vh-100">
            <div class="col-12 align-self-center">
              <img src="<?php echo base_url('images/Tiago-new.png'); ?>" class="img-fluid  d-none d-md-block d-lg-block" alt="">
              <a href="javascript:;" class="trigger-hiddens">
                  <span>^</span>
                  <p>LIHAT PROFIL LENGKAP</p>
              </a>
              <div class="hiddens">Sebagai pemain bola, Asnawi sudah berkarir sejak tahun 2014 di PSM Makasar, dan masuk nominasi Pemain Muda Terbaik Liga I Indonesia di tahun 2019. <br /> Sebelum bermain di SEA Games Manila 2019, Asnawi pernah tergabung sejak tahun 2013 dalam Timnas U-16, U-19, U-23 sampai tim senior Indonesia untuk kualifikasi piala dunia baru-baru ini. <br /> Di tengah pandemi COVID-19 dan kualifikasi yang vakum, Asnawi memulai karir internasionalnya dengan berkompetisi di liga korea bersama tim Ansan Greeners FC selama 1 musim.</div>
            </div>
          </div>
        </div>
    </div>

 <?= $this->endSection() ?>