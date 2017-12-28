<div class="wrap">
	<h1><?php esc_html_e( 'MP Theme Options', 'mptheme' ); ?></h1>

	<form action="" method="post" id="mptheme_frm">

		<?php wp_nonce_field() ?>
		
		<?php settings_fields( 'mptheme_options' ); ?>
		<?php do_settings_sections( 'Header options' ); ?>



		<hr>

		<input type="submit" value="<?php _e('Save settings', 'mp_clp'); ?>" class="button button-primary" name="submit" />
	</form>

	<?php if (get_option( 'mptheme_logo_image' )): ?>
		<div class="mp-card">
			<div class="mp-card-title">
				<h3><?php _e( 'Current logo image', 'mp_clp' ); ?></h3>
			</div><!-- /.mp-card-title -->

			<div class="mp-card-content">
				<div id="background-image-current" style="background-image: url(<?php echo get_option( 'mptheme_logo_image' ); ?>); height: 100px; background-size: cover"></div>
			</div><!-- /.mp-card-content -->
		</div><!-- /.mp-card -->
	<?php endif; ?>
</div>