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
		<?php get_template_part( 'template-parts/bubbles', '' ); ?>
		<div class="container">
			<div class="copy">
				<h1>News</h1>
			</div>
		</div>
	</div>

	<div class="filter-container">
		<div class="container">

			<aside>
				<button class="show-page-filter" aria-controls="in-page-menu" aria-expanded="false">Show filter</button>
				<?php if ( is_active_sidebar( 'news' ) ) : ?>
				    <?php dynamic_sidebar( 'news' ); ?>
				<?php endif; ?>
			</aside>

			<?php if ( have_posts() ) : ?>

			<div class="results" id="filter-results">

				<div class="list no-border">

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post(); 

						$video = get_field('video'); ?>

						<section class="item">
							<div class="copy">
								<h2 class="h3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<p>
									<span class="date"> <?php echo get_the_date(); ?></span>
								</p>
								<?php the_excerpt(); ?>
							</div>
							<?php if ( $video ) : ?>
								<div class="video-container">
									<div class="maintain-ratio">
										<div class="inside"><?php echo $video; ?></div>
									</div>
								</div>
							<?php elseif ( has_post_thumbnail() ) : ?>
								<div class="image-container">
									<div class="image">
										<div style="background-image:url(<?php the_post_thumbnail_url('large'); ?>);"></div>
									</div>
								</div>
							<?php endif; ?>
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
