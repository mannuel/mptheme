<?php
/*  
 * ========================
 *      Getting values
 * ========================
 */

/*
 * Typography menu
 */
$top_bar_background = mptheme_theme_mods( 'background_top_bar' );
$top_bar_color      = mptheme_theme_mods( 'color_top_bar' );
/* --- END Typography menu --- */

/*
 * Color scheme
 */
$header_background      = mptheme_theme_mods( 'header_background' );
$main_color             = mptheme_theme_mods( 'main_color' );
$secondary_color        = mptheme_theme_mods( 'secondary_color' );
$body_background_color  = mptheme_theme_mods( 'body_background_color' );
$body_background_image  = mptheme_theme_mods( 'body_background_image' );
$body_background_repeat = mptheme_theme_mods( 'body_background_repeat' );
$body_background_size   = mptheme_theme_mods( 'body_background_size' );
/* --- END Color scheme --- */

/*
 * Typography body
 */
$body_font_size   = mptheme_theme_mods( 'typography_body_size' );
$body_font_family = mptheme_theme_mods( 'typography_body' );
$body_color       = mptheme_theme_mods( 'typography_body_color' );
$body_font_weight = mptheme_theme_mods( 'typography_body_weight' );

$h1_font_size     = mptheme_theme_mods( 'typography_h1_size' );
$h1_font_family   = mptheme_theme_mods( 'typography_h1' );
$h2_font_size     = mptheme_theme_mods( 'typography_h2_size' );
$h2_font_family   = mptheme_theme_mods( 'typography_h2' );
$h3_font_size     = mptheme_theme_mods( 'typography_h3_size' );
$h3_font_family   = mptheme_theme_mods( 'typography_h3' );
$h4_font_size     = mptheme_theme_mods( 'typography_h4_size' );
$h4_font_family   = mptheme_theme_mods( 'typography_h4' );
$h5_font_size     = mptheme_theme_mods( 'typography_h5_size' );
$h5_font_family   = mptheme_theme_mods( 'typography_h5' );
$h6_font_size     = mptheme_theme_mods( 'typography_h6_size' );
$h6_font_family   = mptheme_theme_mods( 'typography_h6' );
/* --- END Typography body --- */

/*
 * Typography menu
 */
$menu_color       = mptheme_theme_mods( 'typography_menu_color' );
$menu_font_weight = mptheme_theme_mods( 'typography_menu_weight' );
$menu_font_size   = mptheme_theme_mods( 'typography_menu_size' );
/* --- END Typography menu --- */
?>

<style type="text/css">
	body{
		<?php if ($body_color): ?>
			color: <?php echo $body_color; ?>;
		<?php endif; ?>

		<?php if ($body_font_family): ?>
			font-family: <?php echo $body_font_family; ?>;
		<?php endif; ?>

		<?php if ($body_font_size): ?>
			font-size: <?php echo $body_font_size; ?>;
		<?php endif; ?>

		<?php if ($body_font_weight): ?>
			font-weight: <?php echo $body_font_weight; ?>;
		<?php endif; ?>

		<?php if ($body_background_color): ?>
			background: <?php echo $body_background_color; ?>;
		<?php endif; ?>

		<?php if ($body_background_image): ?>
			background-image: url(<?php echo $body_background_image; ?>);

			<?php if ($body_background_repeat): ?>
				background-repeat: <?php echo $body_background_repeat; ?>;
			<?php endif; ?>

			<?php if ($body_background_size): ?>
				background-size: <?php echo $body_background_size; ?>;
			<?php endif; ?>
		<?php endif; ?>
	}

	<?php if ($top_bar_background): ?>
		.top-bar{ background: <?php echo $top_bar_background; ?>  }
	<?php endif; ?>

	<?php if ($top_bar_color): ?>
		.top-bar, .top-bar a{ color: <?php echo $top_bar_color ?>  }
	<?php endif; ?>

	<?php if ($header_background): ?>
		.site-header{ background: <?php echo $header_background; ?>  }
	<?php endif; ?>

	.main-menu li a,
	.main-menu-right li a{
		<?php if ($menu_color): ?>
			color: <?php echo $menu_color; ?>;
		<?php endif; ?>

		<?php if (get_option( "typography_menu" )): ?>
			font-family: <?php echo get_option( "typography_menu" ); ?>;
		<?php endif; ?>

		<?php if ($menu_font_weight): ?>
			font-weight: <?php echo $menu_font_weight; ?>;
		<?php endif; ?>

		<?php if ($menu_font_size): ?>
			font-size: <?php echo $menu_font_size; ?>;
		<?php endif; ?>
	}

	<?php if ($h1_font_size || $h1_font_family && $h1_font_family != 'default'): ?>
		h1{
			<?php if ($h1_font_size): ?>
				font-size: <?php echo $h1_font_size; ?>;
			<?php endif; ?>

			<?php if ($h1_font_family && $h1_font_family != 'default'): ?>
				font-family: <?php echo $h1_font_family; ?>;
			<?php endif; ?>
		}
	<?php endif ?>

	<?php if ($h2_font_size || $h2_font_family && $h2_font_family != 'default'): ?>
		h2{
			<?php if ($h2_font_size): ?>
				font-size: <?php echo $h2_font_size; ?>;
			<?php endif; ?>

			<?php if ($h2_font_family): ?>
				font-family: <?php echo $h2_font_family; ?>;
			<?php endif; ?>
		}
	<?php endif ?>

	<?php if ($h3_font_size || $h3_font_family && $h3_font_family != 'default'): ?>
		h3{
			<?php if ($h3_font_size): ?>
				font-size: <?php echo $h3_font_size; ?>;
			<?php endif; ?>

			<?php if ($h3_font_family ): ?>
				font-family: <?php echo $h3_font_family ; ?>;
			<?php endif; ?>
		}
	<?php endif ?>

	<?php if ($h4_font_size || $h4_font_family && $h4_font_family != 'default'): ?>
		h4{
			<?php if ($h4_font_size): ?>
				font-size: <?php echo $h4_font_size; ?>;
			<?php endif; ?>

			<?php if ($h4_font_family): ?>
				font-family: <?php echo $h4_font_family; ?>;
			<?php endif; ?>
		}
	<?php endif ?>

	<?php if ($h5_font_size || $h5_font_family && $h5_font_family != 'default'): ?>
		h5{
			<?php if ($h5_font_size): ?>
				font-size: <?php echo $h5_font_size; ?>;
			<?php endif; ?>

			<?php if ($h5_font_family): ?>
				font-family: <?php echo $h5_font_family; ?>;
			<?php endif; ?>
		}
	<?php endif ?>

	<?php if ($h3_font_size || $h3_font_family && $h3_font_family != 'default'): ?>
		h6{
			<?php if ($h3_font_size): ?>
				font-size: <?php echo $h3_font_size; ?>;
			<?php endif; ?>

			<?php if ($h3_font_family): ?>
				font-family: <?php echo $h3_font_family; ?>;
			<?php endif; ?>
		}
	<?php endif ?>
	
	.btn{
		<?php if ($main_color ): ?>
			border-color: <?php echo $main_color ; ?>;
		<?php endif; ?>
	}

	.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,
	.btn-primary,
	.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{
		<?php if ($main_color ): ?>
			background-color: <?php echo $main_color ; ?>;
		<?php endif; ?>
	}

	.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,
	.btn-primary:hover,
	.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover{
		<?php if ($secondary_color): ?>
			background-color: <?php echo $secondary_color; ?>;
		<?php endif; ?>
	}

	.woocommerce-loop-product__title{
		<?php if ($main_color ): ?>
			color: <?php echo $main_color ; ?>;
		<?php endif; ?>
	}


	/*
	 * WooCommerce styles
	 */
	.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button{
		border-radius: 0;
	}

	.woocommerce .quantity .qty{
		font-size: 1em;
		padding: .45em;
	}
</style>