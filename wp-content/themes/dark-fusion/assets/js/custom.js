(function ($) {

    // remove box on click 
    $("a").keypress(function() {
      this.blur();
      this.hideFocus = false;
      this.style.outline = null;
    });

    $("a").mousedown(function() {
         this.blur();
         this.hideFocus = true;
         this.style.outline = 'none';
    });

    // remove # on URL
    $(".search-icon").click(function(e){
        e.preventDefault();
    });
        

    /* Preloader */
    jQuery(window).on('load', function() {
        var preloaderFadeOutTime = 500;
        function dark_fusion_hidePreloader() {
            var preloader = jQuery('.dark-fusion-loader');
            setTimeout(function() {
                preloader.fadeOut(preloaderFadeOutTime);
            }, 500);
        }
        dark_fusion_hidePreloader();
    }); 

    //Sticky Header
    jQuery(window).bind('scroll', function () {
        if (jQuery(window).scrollTop() > 100)
        {
            jQuery('.header-sticky').addClass('stickymenu');
        } 
        else {
            jQuery('.header-sticky').removeClass('stickymenu');
        }
    });

    // scroll to top
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scroll-up').fadeIn();
        } 
        else {
            $('.scroll-up').fadeOut();
        }
    });

    $('a[href="#totop"]').click(function () {
        $('html, body').animate({scrollTop: 0}, 'slow');
        return false;
    });
})(jQuery);