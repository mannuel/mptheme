jQuery(document).ready( function($) {
	var mediaUploader;

	$('#upload-logo-image-button').on('click',function(e){
		e.preventDefault();
		if (mediaUploader) {
			mediaUploader.open();
			return;
		}

		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose a image for logo',
			button: {
				text: 'Choose a logo'
			},
			multiple: false
		});

		mediaUploader.on('select', function(){
			attachment = mediaUploader.state().get('selection').first().toJSON();
			$('#mptheme-logo-image').val(attachment.url);
			$('#login-image-current').css('background-image','url(' + attachment.url + ')');
		});

		mediaUploader.open();
	});

	$('.wpColorPicker').wpColorPicker();
});