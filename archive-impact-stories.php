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
	<div class="page-header">
		<div class="container">
			<div class="copy">
				<h1>Impact stories</h1>
			</div>
		</div>
	</div>

	<?php if ( have_posts() ) : ?>

		<section>
			<div class="container">

				<div class="grid no-border">

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post(); ?>

						<div class="item">
							<?php if ( has_post_thumbnail() ) : ?><a href="<?php the_permalink(); ?>" class="image-container"><div class="image"><div style="background-image:url(<?php the_post_thumbnail_url('large'); ?>);"></div></div></a><?php endif; ?>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<?php get_template_part( 'template-parts/meta/cats', '' ); ?>
							<?php the_excerpt(); ?>
						</div>

					<?php endwhile; ?>

				</div>

				<?php the_posts_pagination( array(
					'mid_size'  => 2,
					'prev_text' => __( 'Previous', 'textdomain' ),
					'next_text' => __( 'Next', 'textdomain' ),
				) ); ?>

			</div>
		</section>

	<?php else : ?>

		<section class="fw content">
			<div class="container">

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			</div>
		</section>

	<?php endif; ?>

</main><!-- #main -->

<?php
get_footer();
