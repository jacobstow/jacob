<?php get_header(); ?>

	<main role="main" class="main">
		<!-- section -->
		<section>

			<?php // load term var depending on page
			$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );  ?>

			<article class="clear">

				<header class="intro clear">
					<div class="constrained">
						<h1>Category: <?php echo $term->name; ?></h1>
						<div class="summary"><p><?php echo $term->description; ?></p></div>
					</div>
				</header>

				<div class="listings_wrapper">
					<div class="constrained clear">
						<ul class="portfolio_listings clear">

						<?php if (have_posts()): while (have_posts()) : the_post(); ?>

							<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
								<li class="grow">
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
										<?php the_post_thumbnail('thumbnail'); // Declare pixel size you need inside the array ?>
										<span><span><?php the_title(); ?></span></span>
									</a>
								</li>
							<?php endif; ?>

						<?php endwhile; ?>

						</ul>
					</div>
				</div>

				<?php else: ?>

					<div class="constrained">
						<h2>Sorry, nothing to display.</h2>
					</div>

				<?php endif; ?>

			</article>

			<div class="constrained">
				<?php get_template_part('pagination'); ?>
			</div>

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
