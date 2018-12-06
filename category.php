<?php get_header(); ?>

	<main role="main" class="main">
		<!-- section -->
		<section>

				<header class="intro clear">
					<div class="constrained">
						<h1>Categories for <?php single_cat_title(); ?></h1>
					</div>
				</header>

				<section>
					<div class="constrained constrained-extra">		

						<?php get_template_part('loop'); ?>

						<?php get_template_part('pagination'); ?>

					</div>
				</section>

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
