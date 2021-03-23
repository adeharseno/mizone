<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>
    <style>.asnawi{top:0;position:absolute;background-size:cover;background-position:-30px;background-repeat:no-repeat;background-image:url("<?php echo base_url("images/new-assets/tm-asnawi-m.jpg"); ?>")}.grace{top:0;position:absolute;background-size:cover;background-position:-30px;background-repeat:no-repeat;background-image:url("<?php echo base_url("images/new-assets/tm-grace-m.jpg"); ?>")}.tiago{top:0;position:absolute;background-size:cover;background-position:-30px;background-repeat:no-repeat;background-image:url("<?php echo base_url("images/new-assets/tm-tiago-m.jpg"); ?>")}.slider-items .row .col-12{position:relative;height:100%;overflow:hidden;display:block}.team-slider{top:86px}@media only screen and (min-width:769px){.asnawi{background-size:cover;background-position:center;background-repeat:no-repeat;background-image:url("<?php echo base_url("images/new-assets/bg-team.jpg"); ?>")}.grace{background-size:cover;background-position:center;background-repeat:no-repeat;background-image:url("<?php echo base_url("images/new-assets/bg-team.jpg"); ?>")}.tiago{background-size:cover;background-position:center;background-repeat:no-repeat;background-image:url("<?php echo base_url("images/new-assets/bg-team.jpg"); ?>")}}@media (min-device-width:768px) and (max-device-width:1024px){.asnawi,.grace,.tiago{background-position:left}}</style>

    <div class="main-slider slideInLeft animated team-slider">
        <div class="slider-items asnawi">
          <div class="row vh-100">
            <div class="col-12 align-self-center">
              <img src="<?php echo base_url('images/Asnawi-new.png'); ?>" class="img-fluid d-none d-md-none d-lg-block" alt="">
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
              <img src="<?php echo base_url('images/Grace-new.png'); ?>" class="img-fluid  d-none d-md-none d-lg-block" alt="">
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
              <img src="<?php echo base_url('images/Tiago-new.png'); ?>" class="img-fluid  d-none d-md-none d-lg-block" alt="">
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