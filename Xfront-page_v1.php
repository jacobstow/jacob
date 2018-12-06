<?php get_header(); ?>

	<main role="main" class="main">
		<!-- section -->
		<section>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<section class="intro clear">
				<div class="constrained linemax">
					<?php if(get_field('introduction')) {
						echo '<h1>' . get_field('introduction') . '</h1>';
					} ?>
				</div>
			</section>
<!--
			<div class="letterbox composite-image-1">

			</div>
-->
<!--
			<section class="feat_project clear">
				<div class="constrained">
					<?php if(get_field('feat_project')) { ?>
						<?php 
						$feat = get_field('feat_project');
						$feat_id = $feat[0]->ID; 
						?>

						<h2><?php echo get_the_title( $feat_id ); ?></h2>
						
						<?php if(get_field('feat_image')) { 
							$feat_image_id = get_field('feat_image'); 
							echo wp_get_attachment_image( $feat_image_id, 'thumbnail');
						} else {
							echo wp_get_attachment_image( get_post_thumbnail_id($feat_id), 'thumbnail');
						} ?>

						<a href="<?php echo get_permalink( $feat[0]->ID ); ?>" class="button">View Project</a>
						<a href="<?php echo home_url(); ?>/portfolio" class="button">View All</a>
						
					<?php } ?>
					
				</div>
			</section>
-->
			<!-- section -->
			<section class="featured_projects clear">
				<div class="constrained">

					<?php
					$projectposts = get_posts( array(
						'posts_per_page' => 9,
						//'order'          => 'ASC',
						'post_type' => 'project'
					) );
					?>

					<?php if ( $projectposts ) { ?>

						<ul class="portfolio_listings clear">

							<?php
							// set counter
							$i = 0;
							foreach ( $projectposts as $post ) :
								setup_postdata( $post ); ?>

								<?php if ( has_post_thumbnail()) : // Check if thumbnail exists
								// add to counter
								$i++;	
								?>

									<li class="grow">
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
											<?php the_post_thumbnail('thumbnail'); // Declare pixel size you need inside the array ?>
											<span><span><?php the_title(); ?></span></span>
										</a>
									</li>

								<?php endif; ?>

							<?php
							endforeach; 
							wp_reset_postdata();
							?>

						</ul>

					<?php } ?>
					<?php 
					// if more than 9 posts add more button
					if ( $projectposts > 9 && $i > 9 ) { ?>
						<div class="aligncontentscenter">
							<a href="<?php echo home_url(); ?>/portfolio" class="button">more posts</a>
						</div>
					<?php } ?>

				</div>
			</section>	
			<!-- /section -->


			<!-- section -->
			<section class="about_intro">
				<div class="constrained linemax">
					<?php the_content(); ?>
				</div>
			</section>
			<!-- /section -->


			<!-- section -->
			<section class="basics_intro">
				<div class="constrained">
					<div class="three-columns clear">
						<div class="column">
							<a href="" class="fa fa-pencil"></a>
							<h3>Design</h3>
							<p>Working with you to get the most from your brand, delivering a useable and exciting online interaction to help meet your goals and communicate with your customers.</p>
						</div>
						<div class="column">
							<a href="" class="fa fa-code"></a>
							<h3>Coding</h3>
							<p>I love coding and pride myself on using the most up to date ideas and functionality, whilst making everything reassuringly easy to update and maintain.</p>
						</div>
						<div class="column">
							<a href="" class="fa fa-calendar-check-o"></a>
							<h3>Timescales</h3>
							<p>Everyone likes to meet their goals, on time and working well. I understand how important this is for my customers and can help create a timescale to make sure everything is on track.</p>
						</div>
					</div>
				</div>
			</section>
			<!-- /section -->

		<?php endwhile; ?>

		<?php else: ?>

			<section>
				<h2>Sorry, nothing to display.</h2>
			</section>

		<?php endif; ?>


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
