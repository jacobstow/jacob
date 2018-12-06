<?php get_header(); ?>

	<main role="main" class="main">
		<!-- section -->
		<section>

			<?php if (have_posts()): ?>

				<article class="clear">

					<header class="intro clear">
						<div class="constrained">
							<h1>Projects</h1>
						</div>
					</header>

					<div class="listings_wrapper">
						<div class="constrained clear">
							<ul class="portfolio_listings clear">

								<?php while (have_posts()) : the_post(); ?>

									<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
										<li class="grow">
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
												<?php the_post_thumbnail('thumbnail'); // Declare pixel size you need inside the array ?>
												<span><span><?php the_title(); ?></span></span>
											</a>
										</li>
									<?php else: ?>
										<!-- project with no featured image -->
									<?php endif; ?>

								<?php endwhile; ?>

							</ul>
						</div>
					</div>
				</article>

			<?php else: ?>

				<div class="constrained">
					<h2>Sorry, nothing to display.</h2>
				</div>

			<?php endif; ?>

			<?php get_template_part('pagination'); ?>

			<!-- aside -->
			<aside role="complementary"  class="contact_intro">
				<div class="constrained">
					<p>Need help with a project? Drop me a note if you'd like to chat about a project or new idea.</p>
					<a href="<?php echo home_url(); ?>/contact" title="Get in touch" class="button">Get in touch</a>
				</div>
			</aside>
			<!-- /aside -->

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
