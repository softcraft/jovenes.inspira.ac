/**
 * Inspira.ac scripts
 * ------------------
**/
var inspira = (function(window, document, $, undefined) {
    'use strict';

    $(document).ready(function() {

        /* Home Carousel */
        $('.news-carousel').owlCarousel({
            items              : 1,
            itemsDesktop       : false,
            itemsDesktopSmall  : false,
            itemsTablet        : false,
            itemsTabletSmall   : false,
            itemsMobile        : false,
            itemsCustom        : false,
            singleItem         : true,
            autoPlay           : 5000,
            stopOnHover        : true
        });

        /* Featured Carousel */
        $('.featured-carousel').owlCarousel({
            items              : 4,
            singleItem         : false,
            autoPlay           : 5000,
            stopOnHover        : true,
            pagination         : false
        });

        /* Contact */
        var $citySelect = $('.contacto-ciudad'),
            $addresses  = $('.address-wrap');

        $addresses.hide();
        $citySelect.on('change keyup', function() {

            $addresses.hide();
            $addresses.filter(function(index, address) {
              return $(address).data('city') === $citySelect.val();
            }).show();

        });

        /* Nosotros */
        $('.valores').on('click', 'li', function() {
            var $el = $(this);

            $el.toggleClass('active');
        });

        /* Participa */
        $('.headless-slider').owlCarousel({
            items              : 1,
            itemsDesktop       : false,
            itemsDesktopSmall  : false,
            itemsTablet        : false,
            itemsTabletSmall   : false,
            itemsMobile        : false,
            itemsCustom        : false,
            singleItem         : true,
            autoPlay           : 3000,
            stopOnHover        : false,
            pagination         : false
        });

        /* Smooth Scroll */
        var target    = window.location.hash,
            $targetEl = $(target);

        if ($targetEl.length && $targetEl.is(':visible')) {
            $('html, body').animate({
                scrollTop: $targetEl.offset().top
            }, 2000);
        }

    });
})(this, this.document, jQuery);
