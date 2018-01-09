<div class="wrap">
	<h1><?php esc_html_e( 'MP Theme Options', 'mptheme' ); ?></h1>

	<form action="" method="post" id="mptheme_frm">

		<?php wp_nonce_field( 'mptheme_options' ) ?>
		
		<?php settings_fields( 'mptheme_options' ); ?>
		<?php do_settings_sections( 'MP Theme Options' ); ?>

		<hr>

		<input type="submit" value="<?php _e('Save settings', 'mp_clp'); ?>" class="button button-primary" name="submit" />
	</form>
</div>