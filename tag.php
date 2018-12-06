<?php get_header(); ?>

	<main role="main" class="content">
		<!-- section -->
		<section>

			<h1>Tag Archive: <?php echo single_tag_title('', false); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
