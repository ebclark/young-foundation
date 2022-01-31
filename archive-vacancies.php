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
				<h1>Vacancies</h1>
			</div>
		</div>
	</div>

	<div class="filter-container">
		<div class="container">

			<?php if ( have_posts() ) : ?>

			<div class="results" id="filter-results">

				<div class="list no-border vacancies">

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();  ?>

						<section class="item">
							<div class="copy">
								<h2 class="h3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<?php the_excerpt(); ?>
							</div>
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
	<section class="fw content">
		<div class="container">
			<?php if ( is_active_sidebar( 'vacancies' ) ) : ?>
			    <?php dynamic_sidebar( 'vacancies' ); ?>
			<?php endif; ?>
		</div>
	</section>

</main><!-- #main -->

<?php
get_footer();
