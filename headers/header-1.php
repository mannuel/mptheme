<header class="site-header">
	<div class="container">
		<div class="row">
			<div class="col-md-3">

				<?php if (mptheme_custom_logo()): ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-logo">
						<img src="<?php echo mptheme_custom_logo(); ?>" alt="<?php bloginfo( 'name' ); ?>">
					</a>
				<?php else : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php endif; ?>

			</div>
			<div class="col-md-9">
				<nav id="site-navigation" class="main-navigation">
					<?php 
					wp_nav_menu(
						array(
							'menu'       => 'primary',
							'menu_class' => 'primary-menu',
							'menu_id'    => 'primary-menu',
						)
					);
					?>
				</nav><!-- #site-navigation -->
			</div>
		</div>
	</div>
</header>