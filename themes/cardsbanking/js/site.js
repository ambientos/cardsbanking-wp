(function($){
	var $body = $('body')

	/**
	 * Dropdown menu
	 */
	
	$('.header-menu > .dropdown')
		// Show/Hide Content Overlay
		.hover(
			function(){
				$body.addClass('is-dropdown-active')
			},
			function(){
				$body.removeClass('is-dropdown-active')
			}
		)

		// Show/Hide dropdown menu for mobiles
		.on('click', function(e){
			var windowWidth = $(window).width()

			if ( windowWidth < 992 && 'A' != e.target.nodeName && 'a' != e.target.nodeName ) {
				e.stopPropagation()

				$(this)
					.toggleClass('open')
			}
		})

	/**
	 * Owl Carousel
	 */

	$('.carousel-container').each(function(){
		let $container = $(this),
			$carousel = $container.find('.carousel'),
			autoplay = $container.data('autoplay') || 0,
			items = +$container.data('items') || 1,
			loop = $container.data('loop') || 0,
			margin = $container.data('margin') || 0,
			nav = $container.data('nav') || 0,
			navContainer = $container.data('nav-container') || 0,
			dots = $container.data('dots') || 0


		options = {
			items: items,
			margin: +margin,
			loop: loop,
			nav: nav,
			navSpeed: 600,
			dots: dots,
			navText: [
				'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20" class="icon"><path d="M231.536 475.535l7.071-7.07c4.686-4.686 4.686-12.284 0-16.971L60.113 273H436c6.627 0 12-5.373 12-12v-10c0-6.627-5.373-12-12-12H60.113L238.607 60.506c4.686-4.686 4.686-12.284 0-16.971l-7.071-7.07c-4.686-4.686-12.284-4.686-16.97 0L3.515 247.515c-4.686 4.686-4.686 12.284 0 16.971l211.051 211.05c4.686 4.686 12.284 4.686 16.97-.001z"></path></svg>',
				'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20" class="icon"><path d="M216.464 36.465l-7.071 7.07c-4.686 4.686-4.686 12.284 0 16.971L387.887 239H12c-6.627 0-12 5.373-12 12v10c0 6.627 5.373 12 12 12h375.887L209.393 451.494c-4.686 4.686-4.686 12.284 0 16.971l7.071 7.07c4.686 4.686 12.284 4.686 16.97 0l211.051-211.05c4.686-4.686 4.686-12.284 0-16.971L233.434 36.465c-4.686-4.687-12.284-4.687-16.97 0z"></path></svg>'
			]
		}

		if ( autoplay ) {
			options.autoplay = true
			options.autoplaySpeed = 800
			options.autoplayTimeout = 7000
		}

		if ( items === 3 ) {
			options.responsive = {
				0: {
					items: 1
				},
				768: {
					items: 2
				},
				992: {
					items: 2
				},
				1200: {
					items: 3
				}
			}
		}

		if ( items === 4 ) {
			options.responsive = {
				0: {
					items: 1
				},
				768: {
					items: 2
				},
				992: {
					items: 3
				},
				1200: {
					items: 4
				}
			}
		}

		if ( navContainer ) {
			options.navContainer = navContainer
		}

		$carousel.owlCarousel(options)
	})
})(jQuery)