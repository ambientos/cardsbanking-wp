(function($){
	var body = $('body')

	/**
	 * Dropdown menu
	 */
	
	$('.header-menu > .dropdown')
		// Show/Hide Content Overlay
		.hover(
			function(){
				body.addClass('is-dropdown-active')
			},
			function(){
				body.removeClass('is-dropdown-active')
			}
		)

		// Show/Hide dropdown menu for mobiles
		.on('click', function(e){
			var windowWidth = $(window).width()

			if ( windowWidth < 992 && 'A' != e.target.nodeName && 'a' != e.target.nodeName ) {
				e.stopPropagation()

				$(this)
					.toggleClass('open')
					//.find('.dropdown-menu:first').slideToggle()
			}
		})
})(jQuery)