<footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <h3 class="title-footer">BELI MIZONE DI</h3>
          <ul>
            <li><a href="#"><img src="<?php echo base_url('images/new-assets/tokopedia.png'); ?>" alt="Tokopedia"></a></li>
            <li><a href="#"><img src="<?php echo base_url('images/new-assets/blibli.png'); ?>" alt="Blibli"></a></li>
            <li><a href="#"><img src="<?php echo base_url('images/new-assets/shopee.png'); ?>" alt="Shopee"></a></li>
            <br />
            <li><a href="#"><img src="<?php echo base_url('images/new-assets/jd.png'); ?>" alt="JD"></a></li>
            <li><a href="#"><img src="<?php echo base_url('images/new-assets/klikindomart.png'); ?>" alt="Klik"></a></li>
            <li><a href="#"><img src="<?php echo base_url('images/new-assets/alfacart.png'); ?>" alt="Alfacart"></a></li>
          </ul>
          <h3 class="title-footer mt-4">TEMUKAN KAMI</h3>
          <ul>
            <li><a href="#"><img src="<?php echo base_url('images/new-assets/instagram.png'); ?>" alt="Instagram"></a></li>
            <li><a href="#"><img src="<?php echo base_url('images/new-assets/facebook.png'); ?>" alt="Facebook"></a></li>
            <li><a href="#"><img src="<?php echo base_url('images/new-assets/twitter.png'); ?>" alt="Twitter"></a></li>
          </ul>
          <p>COPYRIGHT MIZONE 2021</p>
        </div>
      </div>
    </div>
  </footer>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <!--<script src="js/jquery-3.4.1.min.js"></script>-->
  <script src="<?php echo base_url('js/jquery-3.5.1.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/popper.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/mediaelement-and-player.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/main.min.js'); ?>"></script>

  <script>
    var url = window.location.href;
    // Get DIV
    // Check if URL contains the keyword
    if (url.search('product-list') > 0) {
      // Display the message
      $('.main-menu').addClass('active');
      $('.menu').addClass('active');
    }
    $('video').mediaelementplayer({
        enableAutosize: true,
        alwaysShowControls: true,
        defaultVideoWidth: 480,
        defaultVideoHeight: 270,
        videoWidth: -1,
        videoHeight: -1,
        audioWidth: 400,
        audioHeight: 30,
    });
    <?php if(isset($sliders) && count($sliders) > 0 ): foreach($sliders as $s): $value = json_decode_table($s, default_language()); ?>
      <?php if( !empty($value['video']) || !empty($value["video_url"]) ):?>
        
        $('#videocontent-<?php echo $value['id']; ?>').on("hidden.bs.modal", function (i) {
            $(".main-slider").slick("slickPlay"),
            $(this).find('#video1-<?php echo $value['id']; ?>').trigger('pause');
           
        });
        
        $('#videocontent-<?php echo $value['id']; ?>').on("show.bs.modal", function (i) {
            $(".main-slider").slick("slickPause"),
            $(this).find('#video1-<?php echo $value['id']; ?>').trigger('play');
            $(this).find('#video1-<?php echo $value['id']; ?>')[0].setCurrentTime(0);
            
        });
      <?php endif; ?>
    <?php endforeach; endif; ?>
      
  
  </script>
</body>
</html>