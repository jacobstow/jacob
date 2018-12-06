<?php get_header(); ?>

	<main role="main" class="main">
		<!-- section -->
		<section>

			<header class="intro clear">
				<div class="constrained">
					<h1>Archives</h1>
				</div>
			</header>


			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>
