<?php
/**
 *
 * @package mptheme
 */


/**
 * Meta box for page setup
 */
function page_setup_metabox(){
	$screens = array( 'post', 'page' );
	add_meta_box( 'mptheme-page-setup', 'Page setup', 'page_setup_metabox_content', $screens, 'side', 'low' );
}

function page_setup_metabox_content( $post ){
	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'mptheme_layout_save_meta_box', 'mptheme_page_setup_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$mptheme_page_setup_show_heading = get_post_meta( $post->ID, 'mptheme_page_setup_show_heading', true );

	if(!$mptheme_page_setup_show_heading){
		$mptheme_page_setup_show_heading = 'true';
	}
	?>
		<p class="post-attributes-label-wrapper">
			<label class="post-attributes-label"> <?php _e( 'Show page heading', 'mptheme' ); ?> </label>
		</p>
		<select name="mptheme_page_setup_show_heading">
			<option value="true" <?php echo selected( $mptheme_page_setup_show_heading, 'true', false); ?>> <?php _e( 'Enable', 'mptheme' ); ?></option>
			<option value="false" <?php echo selected( $mptheme_page_setup_show_heading, 'false', false); ?>> <?php _e( 'Disable', 'mptheme' ); ?></option>;
		</select>

	<?php
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function mptheme_layout_save_meta_box( $post_id ){

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['mptheme_page_setup_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['mptheme_page_setup_meta_box_nonce'], 'mptheme_layout_save_meta_box' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	/* OK, it's safe for us to save the data now. */
	
	// Make sure that it is set.
	if ( isset( $_POST['mptheme_page_setup_show_heading'] ) ) {
		// Sanitize user input.
		$sq_data = sanitize_text_field( $_POST['mptheme_page_setup_show_heading'] );
		// Update the meta field in the database.
		update_post_meta( $post_id, 'mptheme_page_setup_show_heading', $sq_data );
	}
		
}

add_action( 'save_post', 'mptheme_layout_save_meta_box' );

add_action( 'add_meta_boxes', 'page_setup_metabox' );