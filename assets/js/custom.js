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

});
