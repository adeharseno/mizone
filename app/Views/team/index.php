<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>
    <style>.swiper-wrapper {overflow: hidden !important;}</style>
    <div class="swiper-container slider-team">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="slider-team-desktop">
                    <img src="<?php echo base_url('images/Asnawi-new.png'); ?>" alt="" />
                </div>
                <div class="slider-team-mobile">
                    <img src="<?php echo base_url('images/new-assets/tm-asnawi-m.jpg'); ?>" alt="" />
                    <a href="javascript:;" class="slider-team-trigger">
                        <span>^</span>
                        <p>LIHAT PROFIL LENGKAP</p>
                    </a>
                    <div class="slider-team-hiddens">
                        <a href="javascript:;" class="close-trigger"><label>Close</label><span>^</span></a>
                        Sebagai pemain bola, Asnawi sudah berkarir sejak tahun 2014 di PSM Makasar, dan masuk nominasi Pemain Muda Terbaik Liga I Indonesia di tahun 2019. <br />Sebelum bermain di SEA Games Manila 2019, Asnawi pernah tergabung sejak tahun 2013 dalam Timnas U-16, U-19, U-23 sampai tim senior Indonesia untuk kualifikasi piala dunia baru-baru ini. <br /> Di tengah pandemi COVID-19 dan kualifikasi yang vakum, Asnawi memulai karir internasionalnya dengan berkompetisi di liga korea bersama tim Ansan Greeners FC selama 1 musim.
                    </div>
                </div>    
            </div>
            <div class="swiper-slide">
                <div class="slider-team-desktop">
                    <img src="<?php echo base_url('images/Grace-new.png'); ?>" alt="" />
                </div>
                <div class="slider-team-mobile">
                    <img src="<?php echo base_url('images/new-assets/tm-grace-m.jpg'); ?>" alt="" />
                    <a href="javascript:;" class="slider-team-trigger">
                        <span>^</span>
                        <p>LIHAT PROFIL LENGKAP</p>
                    </a>
                    <div class="slider-team-hiddens">
                        <a href="javascript:;" class="close-trigger"><label>Close</label><span>^</span></a>
                        Dr. Grace Joselini, MMRS, Sp. KO. adalah Dokter Spesialis Kedokteran Olahraga, dan pernah tergabung dalam Tim Medis Timnas Putri di Asian Games 2018. <br />Selain suka berolahraga, Dr. Grace adalah finalis Puteri Indonesia 2009, dan menyandang gelar Puteri Indonesia Kepulauan Kalimantan di ajang tersebut. <br />Sebagai spesialis kedokteran olahraga, Dr. Grace sering menjadi narasumber kesehatan di berbagai acara TV dan webinar di instansi swasta maupun pemerintah.
                    </div>
                </div>  
            </div>
            <div class="swiper-slide">
                <div class="slider-team-desktop">
                    <img src="<?php echo base_url('images/Tiago-new.png'); ?>" alt="" />
                </div>
                <div class="slider-team-mobile">
                    <img src="<?php echo base_url('images/new-assets/tm-tiago-m.jpg'); ?>" alt="" />
                    <a href="javascript:;" class="slider-team-trigger">
                        <span>^</span>
                        <p>LIHAT PROFIL LENGKAP</p>
                    </a>
                    <div class="slider-team-hiddens">
                        <a href="javascript:;" class="close-trigger"><label>Close</label><span>^</span></a>
                        Coach Jacksen F. Tiago adalah pelatih Persipura Jayapura berdarah Brasil. Ia memulai karirnya sebagai pemain sepak bola di Indonesia di Persebaya FC Surabaya, dan mendapat gelar pemain terbaik Liga Indonesia musim 1996/1997, sebelum beralih menjadi pelatih Persipura Jayapura tahun 2000 dan mendapatkan tiga gelar Liga Super Indonesia berturut-turut selama 3 musim. PSSI meminta Coach Jacksen untuk menjadi Asisten Pelatih Timnas sebelum menjadi Kepala Pelatih di tahun 2013.
                    </div>
                </div>  
            </div>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
 <?= $this->endSection() ?>