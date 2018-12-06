(function ($, root, undefined) {

	$(function () {

		'use strict';
		// DOM ready, take it away


		var resizeTimer;
		// fire code once resizing finished (could use debouncing instead for wider use)
		$(window).on('resize', function(e) {

			clearTimeout(resizeTimer);
				resizeTimer = setTimeout(function() {

				// Run code here, resizing has "stopped"

			}, 250);
		});

		// start responsiveslides
		$(".rslides").responsiveSlides({
			auto: true,
			speed: 500,
			pager: false,
			nav: false,
			maxwidth: 960
		});


		// mobile main nav
		$('#toggle').click(function() {
			$(this).toggleClass('active');
			$('#overlay').toggleClass('open');
		});

		// fade gallery thumbs in sequence (i returns index of image)
		$('.portfolio_listings img').css('opacity','0.1');
		$('.portfolio_listings img').each(function( i ){
			$(this).delay(150*i).fadeTo(250,1);
			//console.log(i);
		});

		$('.lightbox-container').magnificPopup({
			delegate: 'a', // child items selector, by clicking on it popup will open
			type: 'image',
			gallery:{
				enabled:true
			},
			image: {
				titleSrc: 'title' 
				// this tells the script which attribute has your caption
			}
			// other options
		});


		// tooltips
		$('.tooltiplink').on('click', function(){
			$('.tooltip').hide();
			$(this).nextAll('.tooltip:first').fadeIn();
		});


	});

})(jQuery, this);
