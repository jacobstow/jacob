<?php get_header(); ?>

	<main role="main" class="main">
	<!-- section -->
	<section>

		<header class="intro clear">
			<div class="constrained">
				<h1>News</h1>
			</div>
		</header>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
				<div class="featured_image">
					<?php the_post_thumbnail(); // Fullsize image for the single post ?>
				</div>
			<?php endif; ?>

			<div class="constrained">
				<h1>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</h1>

				<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>

				<div>
					<?php the_content(); // Dynamic Content ?>
				</div>

				<div>
					<?php the_tags( 'Tags:', ', ', '<br>'); // Separated by commas with a line break at the end ?>

					<p>Categorised in: <?php the_category(', '); // Separated by commas ?></p>
				</div>

				<?php edit_post_link('Edit', '<p class="edit_link">', '</p>'); ?>

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

<?php get_sidebar(); ?>

<?php get_footer(); ?>
