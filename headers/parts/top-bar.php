<?php if (mptheme_theme_mods('enable_top_bar')) : ?>
	<div class="">
		<div class="top-bar">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<?php dynamic_sidebar('top-bar-left'); ?>
					</div>
					<div class="col-md-6">
						<?php dynamic_sidebar('top-bar-right'); ?>
					</div>
				</div>
			</div>
		</div> <!-- /.top-bar -->
	</div>
<? endif; ?>