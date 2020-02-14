<?php get_header(); ?>

	<main role="main" class="main">
		<!-- section -->
		<section>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>">
			<?php /*<article> */ ?>

				<header class="intro clear">
					<div class="constrained">
						<h1><?php the_title(); ?></h1>
						<?php if(get_field('introduction')) {
							echo '<p>' . get_field('introduction') . '</p>';
						} ?>
					</div>
				</header>

				<div class="constrained linemax">

					<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
						<div class="featured_image">
							<?php the_post_thumbnail('medium-large'); // Fullsize image for the single post ?>
						</div>
					<?php endif; ?>

					<div class="content">

						<?php the_content(); ?>

					</div>

					<?php edit_post_link('Edit', '<p>', '</p>'); ?>

				</div>

			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<div class="constrained">

					<h2>Sorry, nothing to display.</h2>

				</div>

			</article>
			<!-- /article -->

		<?php endif; ?>

		</section>
		<!-- /section -->
	</main>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>
