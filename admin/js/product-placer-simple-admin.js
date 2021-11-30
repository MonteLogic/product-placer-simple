(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

		
	 $(document).on("click", ".upload_image_button", function (e) {



		console.log(5);

			e.preventDefault();
			// Create a new media frame.
			var aw_uploader = wp.media({
				title: 'Custom image',
				button: {
					text: 'Use this image'
				},
				multiple: false
			}).on('select', function() {
				var attachment = aw_uploader.state().get('selection').first().toJSON();
				$('#profile-picture').val(attachment.url);
				$('#profile-picture-preview').css('background-image','url(' + attachment.url + ')')
				console.log(attachment.url);
			})
			.open();

	 });



	  $(document).on("click", "#remove-picture", function (e) {

		e.preventDefault();
		var answer = confirm("Are you sure you want to remove your Profile Picture?");
		if( answer == true ){
			$('#profile-picture').val('null');
			$('.pps-general-form').submit();
		}
		return;
	});


 
 

})( jQuery );
