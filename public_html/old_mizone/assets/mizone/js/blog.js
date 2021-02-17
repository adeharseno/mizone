$(function(){
    $(window).scroll(function() { 
        if(isPartlyInViewPort($('#blogContent'))){
            $('nav').addClass('with-bg');
        }else{
            $('nav').removeClass('with-bg');
        }

    });

      function isPartlyInViewPort($entry){
          var windowScrollTop = $(window).scrollTop();
          var entryTop = $entry.offset().top;
          var isBelowViewPort = (windowScrollTop + 60) >= entryTop;

          return isBelowViewPort;
      }

});