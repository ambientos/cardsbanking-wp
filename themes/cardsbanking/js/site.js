(function($){
	var body = $('body')

	/**
	 * Dropdown menu
	 */
	
	$('.header-menu > .dropdown').hover(
		function(){
			body.addClass('is-dropdown-active')
		},
		function(){
			body.removeClass('is-dropdown-active')
		}
	)
})(jQuery)