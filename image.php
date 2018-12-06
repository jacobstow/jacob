<?php get_header(); ?>

	<main role="main" class="content">
	<!-- section -->
	<section>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<h1 class="post-title"><?php the_title(); ?></h1>

			<?php echo wp_get_attachment_image( get_the_ID(), 'large' ); ?>

			<h3>Downloads</h3>
			<p class='resolutions'> 
			<?php
				$images = array();
				$image_sizes = get_intermediate_image_sizes();
				array_unshift( $image_sizes, 'full' );
				foreach( $image_sizes as $image_size ) {
					$image = wp_get_attachment_image_src( get_the_ID(), $image_size );
					$name = $image_size . ' (' . $image[1] . 'x' . $image[2] . ')';
					$images[] = '<a href="' . $image[0] . '">' . $name . '</a>';
				}
				echo implode( ' | ', $images );
			?>
			</p>

		</article>
		<!-- /article -->

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1>Sorry, nothing to display.</h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

	</section>
	<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
