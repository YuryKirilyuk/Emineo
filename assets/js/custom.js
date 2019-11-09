var Cache = {
    cacheData: {},

    get: (key) => {
        if (Cache.cacheData.hasOwnProperty(key) && Cache.cacheData[key].val) {
            return Cache.cacheData[key].val;
        }
        return false;
    },

    set: (key, value, expiry) => {

        Cache.clear(key); // Clear before we store it so we can clean up the timeout.

        var to = false;

        Cache.cacheData[key] = {
            expiry: expiry,
            val: value,
            timeout: to,
        };
    },

    clear: (key) => {
        if (Cache.cacheData.hasOwnProperty(key)) {

            delete Cache.cacheData[key];
            return true;
        }

        return false;
    },
};


jQuery(window).on('load', function () {
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
        jQuery('body').addClass('ios');
    } else{
        jQuery('body').addClass('web');
    }

    jQuery('.elementor-accordion-item').first().addClass('active');

});


/* ==========================================================================
   When the window is scrolled, do
   ========================================================================== */

jQuery(window).scroll(function() {


});

/* ==========================================================================
   When the window is resized, do
   ========================================================================== */

jQuery(window).resize(function() {


});


jQuery(function($){

    $('.elementor-accordion-item').on('click', function(){
        $(this).addClass('active').siblings().removeClass('active');
    });

    $('.support-toggle').on('click', function() {
        $('.section-support').toggleClass('show');
    });

    $('.section-services .elementor-inner-column').on('mouseenter mouseleave', function() {
        $(this).find('.elementor-icon-box-description').slideToggle();
        $(this).find('.elementor-widget-button').slideToggle();
    });

    $('.js-toggle-list > a').on('click', function(e){
        e.preventDefault();
        //$(this).closest('.js-toggle-list').toggleClass('current');
        //$(this).find('.sub-menu').slideToggle();
    });



    //swiper on Karriere page
    if($('.jobs-list').length) {
        var swiper = new Swiper('.karriere .swiper-container', {
            slidesPerView: 2,
            slidesPerColumn: 2,
            spaceBetween: 30,
            breakpoints: {
                580: {
                    autoHeight: true,
                    slidesPerView: 1,
                    slidesPerColumn: 1
                }
            },
            pagination: {
                el: '.karriere .swiper-pagination',
                clickable: true,
                renderBullet: function (index, className) {
                    return '<span class="' + className + '">' + (index + 1) + '</span>';
                },
            },
            navigation: {
                nextEl: '.karriere .swiper-button-next',
                prevEl: '.karriere .swiper-button-prev',
            },
        });
    }


    if($('.elementor-widget-testimonial-carousel').length){
        var testimonialSwiper = document.querySelector('.elementor-widget-testimonial-carousel .swiper-container').swiper;
        testimonialSwiper.destroy();

        var swiper_2 = new Swiper('.elementor-widget-testimonial-carousel .swiper-container', {
            slidesPerView: 'auto',
            spaceBetween: 30,
            centeredSlides: true,
            initialSlide: 1,
            loop: true,
            pagination: {
                el: '.elementor-widget-testimonial-carousel .swiper-pagination',
                clickable: true,
            },
        });
    }



    //file input on contact page
    $('.elementor-field-type-upload input[type="file"]').change(function() {

        var input = $(this),
            label = input.siblings('label'),
            getPath = input.val();

        function getName (str){
            if (str.lastIndexOf('\\')){var i = str.lastIndexOf('\\')+1;}
            else{var i = str.lastIndexOf('/')+1;}
            var filename = str.slice(i);
            $(label).attr('title', filename).text(filename);
        }
        getName(getPath);

    });


    //contact page address tabs
    $('.section-tabs .elementor-column').on('click', function(){
        var address = $(this).attr('id');

        console.log(address);
        $(this).addClass('active').siblings().removeClass('active');


        $('#map').attr('data-tab', address);
        $('.map-and-markers').find('.' + address + '').addClass('active').siblings().removeClass('active');

    });

    $('.map-and-markers [class*="address"]').on('click', function(){
        var address = $(this).attr('class');

        console.log(address);
        $(this).addClass('active').siblings().removeClass('active');


        //$('.section-tab').attr('data-tab', address);
        $('#' + address + '').addClass('active').siblings().removeClass('active');

    });


    jQuery(document).on('click', '.success-stories-filter > ul > li a', function(e) {
        e.preventDefault();
        jQuery(this).toggleClass('active').closest('li').find('ul').slideToggle();
    });

    jQuery(document).on('click', '.success-stories-filter li li a', function(e) {
        e.preventDefault();
        var term_id = jQuery(this).data('itemid');
        var type = jQuery(this).data('type');
        var post_type = jQuery(this).data('posttype');
        if(!Cache.get('term_'+term_id+'_items')) {
            var ajaxdata = {
                action: 'ajax_get_filtered_data',
                term_id: term_id,
                type: type,
                post_type: post_type
            };
            jQuery.post(ajaxurl, ajaxdata, function(res) {
                Cache.set('term_'+term_id+'_items',res);
                jQuery('.story-description').html(res.description);
                jQuery('.story-items-inner-container').html(res.items);
            });
        }
        else {
            var result = Cache.get('term_'+term_id+'_items');
            if(result) {
                jQuery('.story-description').html(result.description);
                jQuery('.story-items-inner-container').html(result.items);
            }
        }
    });



});
