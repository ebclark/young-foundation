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
				<h1>Our people</h1>
			</div>
		</div>
	</div>

	<div class="filter-container">
		<div class="container">

			<aside>
				<button class="show-page-filter" aria-controls="in-page-menu" aria-expanded="false">Show filter</button>
				<?php if ( is_active_sidebar( 'people' ) ) : ?>
				    <?php dynamic_sidebar( 'people' ); ?>
				<?php endif; ?>
			</aside>

			<?php if ( have_posts() ) : ?>

			<div class="results" id="filter-results">

				<div class="list no-border people">

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						$jobtitle = get_field('title');
						$org = get_field('organisation');  ?>
						<section class="item">
							<div class="copy">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<?php if ( $jobtitle || $org ) : ?>
									<h4><?php if ( $jobtitle ) : echo $jobtitle; endif; if ( $jobtitle && $org ) : echo ', '; endif ?> <?php if ( $org ) : echo $org; endif; ?></h4>
								<?php endif; ?>
								<?php the_excerpt(); ?>
							</div>
							<?php if ( has_post_thumbnail() ) : ?>
								<div class="image-container">
									<div class="image square">
										<div style="background-image:url(<?php the_post_thumbnail_url('large'); ?>);"></div>
										<div class="person"></div>
									</div>
									<div class="icon-bubble-rounded <?php echo $colour; ?>"></div>
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
