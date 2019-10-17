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

    var swiper_2 = new Swiper('.elementor-swiper .swiper-container', {
        slidesPerView: 'auto',
        spaceBetween: 30,
        centeredSlides: true,
        initialSlide: 1,
        slidesOffsetBefore: -20,
        breakpoints: {
            660: {
                slidesOffsetBefore: 0
            }
        },
        pagination: {
            el: '.elementor-swiper .swiper-pagination',
            clickable: true,
        },
    });







});
