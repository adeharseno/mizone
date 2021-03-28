  <a href="https://www.tokopedia.com/aqua-store/etalase/mizone" id="clickme" target="_blank">Beli Sekarang</a>
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
      Danone uses cookies on this website. With your consent we will use them to measure and analyze usage of the website (analytical cookies), to tailor it to your interests (personalization cookies), and to present you relevant advertising and information (targeting cookies). For more information please read the <a href="<?= base_url('kebijakan-privasi') ?>">cookie statement.</a>
      <a href="#" id="agreeCookies">Accept all cookies</a>
  </div>
  <!-- Optional JavaScript -->
  <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <script src="<?php echo base_url('js/popper.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/main.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/customs.js'); ?>"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/fullview/dist/fullview.min.js"></script>

  <script>
    var mainSlider = new Swiper('.slider-main', {
      cssMode: true,
      loop: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      simulateTouch: false,
      mousewheel: true,
      keyboard: true,
    });
    var productSlider = new Swiper('.slider-product', {
        direction: 'vertical',
        slidesPerView: 1,
        mousewheel: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
    var teamSlider = new Swiper('.slider-team', {
        cssMode: true,
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        mousewheel: true,
        keyboard: true,
    });
    if ($(window).width() < 767) {
        $('.has-submenu').on('click', function() {
            $('.submenu').toggleClass('active');
        })
    };
    // Close Menu
    $('#closeMainmenu').on('click', function(){
        $('.main-menu').removeClass('active');
    });
    $('.burger').on('click', function() {
        $('.menu-container').toggleClass('active');
    });
    $('.swiper-slide .slider-team-trigger').on('click', function() {
        $(this).fadeOut();
        $(this).parent().addClass('active');
        $('.swiper-button-prev, .swiper-button-next').css({
            'cursor': 'none',
            'pointer-events': 'none',
            'opacity': '0.2'
        });
    });
    $('.close-trigger').on('click', function(){
       $(this).parent().parent().removeClass('active'); 
       $('.slider-team-trigger').fadeIn();
       $('.swiper-button-prev, .swiper-button-next').css({
            'cursor': 'pointer',
            'pointer-events': 'auto',
            'opacity': '1'
        });
    });
    $('#fullview .fullview--trigger').on('click', function() {
        $(this).parent().addClass('show'); 
    });
    $('.fullview--close-trigger').on('click', function() {
        $(this).parent().parent().removeClass('show'); 
    });
    
    var url = window.location.href;
    // Get DIV
    // Check if URL contains the keyword
    if (url.search('product-list') > 0) {
      // Display the message
      $('.main-menu').addClass('active');
      $('.menu').addClass('active');
    }
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
    $("#fullview").fullView({
        //Navigation
        navbar: "#triggerTop",
        dots: true,
        dotsPosition: 'right',

        //Scrolling
        easing: 'swing',
        // backToTop: true,

        // Accessibility
        keyboardScrolling: true,

        // Callback
        onViewChange: function (currentView) {
            // console.log(currentView)
        }
    })
  </script>
</body>
</html>