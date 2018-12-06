<?php get_header(); ?>

	<main role="main" class="main">
		<!-- section -->
		<section>

			
			<header class="intro clear">
				<div class="constrained">
					<h1>Latest Posts</h1>
				</div>
			</header>

			<div class="constrained constrained-extra">

				<?php get_template_part('loop'); ?>

				<?php get_template_part('pagination'); ?>

			</div>

		</section>
		<!-- /section -->
	</main>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>
