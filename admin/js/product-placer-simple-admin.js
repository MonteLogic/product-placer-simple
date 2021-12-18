

	 jQuery(document).ready( function($){

		var mediaUploader;

		$('.upload_image_button_pps').on('click',function(e) {
		console.log(5);

			e.preventDefault();

			if( mediaUploader ){
				mediaUploader.open();
				return;
			}


			// Create a new media frame.
			mediaUploader = wp.media.frames.file_frame = wp.media({
				title: 'Custom image',
				button: {
					text: 'Use this image'
				},
				multiple: false
			});
			
			mediaUploader.on('select', function() {
				attachment = mediaUploader.state().get('selection').first().toJSON();
				$('#profile-picture').val(attachment.url);
				$('#profile-picture-preview').css('background-image','url(' + attachment.url + ')')
				console.log(attachment.url);
			});
			mediaUploader.open();

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



});

