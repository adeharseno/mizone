  <a href="javascript:;" id="clickme">Beli Sekarang</a>
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <h3 class="title-footer">BELI MIZONE DI</h3>
          <ul>
            <li><a href="https://www.tokopedia.com/aqua-store/etalase/mizone"><img src="<?php echo base_url('images/new-assets/tokopedia.png'); ?>" alt="Tokopedia"></a></li>
            <li><a href="https://www.blibli.com/brand/aqua-official-store?promoTab=false&excludeProductList=false&brand=MIZONE"><img src="<?php echo base_url('images/new-assets/blibli.png'); ?>" alt="Blibli"></a></li>
            <li><a href="https://shopee.co.id/shop/47694662/search?shopCollection=8485409"><img src="<?php echo base_url('images/new-assets/shopee.png'); ?>" alt="Shopee"></a></li>
            <br />
            <li class="footer-customisation"><a href="https://www.jd.id/product/_12734716/106480790.html?addOrigin=epi_camp_24803-757056"><img src="<?php echo base_url('images/new-assets/jd.png'); ?>" alt="JD"></a></li>
            <li><a href="https://www.klikindomaret.com/search/?key=mizone"><img src="<?php echo base_url('images/new-assets/klikindomart.png'); ?>" alt="Klik"></a></li>
            <li><a href="https://www.alfacart.com/product/mizone-activ-pet-500ml-707179"><img src="<?php echo base_url('images/new-assets/alfacart.png'); ?>" alt="Alfacart"></a></li>
          </ul>
          <h3 class="title-footer mt-4">TEMUKAN KAMI</h3>
          <ul>
            <li><a href="https://www.instagram.com/mizoneid/"><img src="<?php echo base_url('images/new-assets/instagram.png'); ?>" alt="Instagram"></a></li>
            <li><a href="https://www.facebook.com/mizone"><img src="<?php echo base_url('images/new-assets/facebook.png'); ?>" alt="Facebook"></a></li>
            <li><a href="https://twitter.com/mizoneid"><img src="<?php echo base_url('images/new-assets/twitter.png'); ?>" alt="Twitter"></a></li>
          </ul>
          <p>COPYRIGHT MIZONE 2021</p>
        </div>
      </div>
    </div>
  </footer>
  <div class="popup-cookie" style="display: none;">
      Situs web ini menggunakan cookie untuk memastikan Anda mendapatkan pengalaman terbaik di situs web kami. Pelajari lebih lanjut
      <a href="#" id="agreeCookies">Ok</a>
  </div>
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <!--<script src="<?php //echo base_url('js/jquery-3.5.1.min.js'); ?>"></script>-->
  <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <script src="<?php echo base_url('js/popper.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/mediaelement-and-player.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/main.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/customs.js'); ?>"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  <script>
    var swiper = new Swiper('.swiper-container', {
        direction: 'vertical',
        slidesPerView: 1,
        mousewheel: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
    
    // Sticky Header
    $(window).scroll(function() {
        if ($(this).scrollTop() > 250){  
            $('header').addClass("sticky");
        }
        else{
            $('header').removeClass("sticky");
        }
    });
    
    if ($(window).width() < 767) {
        $('.has-submenu').on('click', function() {
            $('.submenu').toggleClass('active');
        })
    }
   
    // Scroll to
    $("#clickme").click(function (){
        $('html, body').animate({
            scrollTop: $(".footer").offset().top
        }, 2000);
    });
    
    // Close Menu
    $('#closeMainmenu').on('click', function(){
        $('.main-menu').removeClass('active');
    })
    
    $('.burger').on('click', function() {
        $('.menu-container').toggleClass('active');
    })
    
    $('.trigger-hiddens').on('click', function() {
        $('.hiddens').toggleClass('active');
        $('.trigger-hiddens').toggleClass('active');
    })
    
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
    const agreeCookies = getCookie('agree_cookies')
    if (!agreeCookies) $('.popup-cookie').show();
    $('#agreeCookies').on('click', function() {
      if (!agreeCookies) setCookie('agree_cookies', 1, 365)
      $('.popup-cookie').hide();
    })

    function setCookie(name,value,days) {
      var expires = "";
      if (days) {
          var date = new Date();
          date.setTime(date.getTime() + (days*24*60*60*1000));
          expires = "; expires=" + date.toUTCString();
      }
      document.cookie = name + "=" + (value || "")  + expires + "; path=/";
    }
    function getCookie(name) {
      var nameEQ = name + "=";
      var ca = document.cookie.split(';');
      for(var i=0;i < ca.length;i++) {
          var c = ca[i];
          while (c.charAt(0)==' ') c = c.substring(1,c.length);
          if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
      }
      return null;
    }
    function eraseCookie(name) {   
      document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    }

    $('#formContact').submit(function(e) {
      e.preventDefault();
      $("#btnContact").attr("disabled", "disabled");

			$.ajax({
				type: 'POST',
				url: $('#submitContactURL').val(),
				data: $('#formContact').serializeArray(),
				dataType: 'JSON',
				success: function(data) {
					if (data.status === 200) {
            $("#btnContact").removeAttr("disabled", "disabled");
            $('#formContact').trigger("reset");
            alert('data kamu berhasil terkirim')
					} else {
            $("#btnContact").removeAttr("disabled", "disabled");
            alert('gagal mengirim data kamu, silahkan coba kembali')
					}
				}
			})
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