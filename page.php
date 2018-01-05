<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mptheme
 */

get_header();


// If page has a Revolution Slider set
if ( get_post_meta($post->ID, 'mptheme_page_setup_revslider', true) ) {

$page_slider = get_post_meta($post->ID, 'mptheme_page_setup_revslider', true);
	echo do_shortcode( '[rev_slider alias="'. $page_slider .'"]' );
}
?>

	<div class="container">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div>

<?php
get_footer();