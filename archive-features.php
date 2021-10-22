<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package young-foundation
 */

get_header();
?>

<main id="primary">
	<div class="page-header plain">
		<div class="container">
			<div class="copy">
				<h1>Features</h1>
			</div>
		</div>
	</div>

	<div class="filter-container">
		<div class="container">

			<aside>
				<button class="show-page-filter" aria-controls="in-page-menu" aria-expanded="false">Show filter</button>
				<?php if ( is_active_sidebar( 'features' ) ) : ?>
				    <?php dynamic_sidebar( 'features' ); ?>
				<?php endif; ?>
			</aside>

			<?php if ( have_posts() ) : ?>

			<div class="results" id="filter-results">

				<div class="list no-border">

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post(); ?>

						<section class="item">
							<div class="copy">
								<h2 class="h3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<p>
									<?php   // Get terms for post
									if ( has_category() ) : ?>
										<?php $categories = get_the_category( $post->ID );
										foreach( $categories as $category ) { ?>
											<a class="tag dk" href="/category/<?php echo $category->slug; ?>"><?php echo $category->name; ?></a>
										<?php } ?>
									<?php endif; ?>
									<span class="date"> <?php echo get_the_date(); ?>
									<?php
									$authors = get_field('select_authors' );
									if( $authors ): ?> | 
										Authors: 
									    <?php foreach( $authors as $post ): 

									        // Setup this post for WP functions (variable must be named $post).
									        setup_postdata($post); ?>
									        <?php the_title(); ?>

									    <?php endforeach; ?>
									    <?php 
									    // Reset the global post object so that the rest of the page works correctly.
									    wp_reset_postdata(); ?>
									<?php endif; ?>
									</span>
								</p>
								<?php the_excerpt(); ?>
							</div>
							<?php if ( has_post_thumbnail() ) : ?><div class="image-container"><div class="image"><div style="background-image:url(<?php the_post_thumbnail_url('large'); ?>);"></div></div></div><?php endif; ?>
						</section>

					<?php endwhile; ?>

				</div>

					<?php the_posts_pagination( array(
						'mid_size'  => 2,
						'prev_text' => __( 'Previous', 'textdomain' ),
						'next_text' => __( 'Next', 'textdomain' ),
					) ); ?>

			</div>

			<?php else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

		</div>
	</div>

</main><!-- #main -->

<?php
get_footer();
