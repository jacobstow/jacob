<?php get_header(); ?>

	<main role="main" class="main">
	<!-- section -->
	<section>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>


		<?php if(get_field('project_colour')) { ?>
			<style>
				.project_nav a { 
					color: <?php the_field('project_colour'); ?>;
				}
				article.project a.button,
				article.project .portfolio_categories li a:hover,
				article.project header.intro { 
					background: <?php the_field('project_colour'); ?>;
					color: #fff;
				}
				.header { 
					margin-bottom: 0;
				}
			</style>
		<?php } ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			

			<header class="intro clear">
				<div class="constrained">
					<h1><?php the_title(); ?></h1>
				</div>
			</header>

			
			<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
				<div class="constrained">
					<div class="featured_image">
						<?php the_post_thumbnail(); // Fullsize image for the single post ?>
					</div>
				</div>
			<?php endif; ?>
			

			<div class="project_info clear">
				<div class="constrained">
					<?php the_content(); ?>
					<?php
					// get categories
					echo get_the_term_list( $post->ID, 'portfolio_category', '<ul class="portfolio_categories clear"><li>', '</li><li>', '</li></ul>' );
					?>
					<?php edit_post_link('Edit', '<p>', '</p>', '', 'button'); ?>
				</div>
			</div>

			<div class="project_nav">
				<div class="constrained">
					<?php previous_post_link( '%link', '', TRUE, '', 'portfolio_category' ); ?>
					<?php
					// get the first term from custom category
					$terms = get_the_terms( $post->ID, 'portfolio_category' );
					if ($terms) :
						$term = array_pop($terms);
						echo '<a href="'.get_term_link($term->slug, 'portfolio_category').'" title="Gallery" class="fa fa-th"></a>';
					endif;
					?>
					<?php next_post_link( '%link', '', TRUE, '', 'portfolio_category' ); ?>
				</div>
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

		<!-- aside -->
		<aside role="complementary" class="related_posts">
			<div class="constrained">
				<p>More posts in this category</p>
			</div>
		</aside>
		<!-- /aside -->


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
