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
	<div class="container">
		<ul class="breadcrumbs">
			<li><a href="http://www.ebclark.co.uk/dev/yf/">Home</a></li>
			<li><a href="http://www.ebclark.co.uk/dev/yf/about-us">About us</a></li>
			<li><a href="http://www.ebclark.co.uk/dev/yf/about-us/who-we-are">Who we are</a></li>
			<li>People</li>
		</ul>
	</div>
	<div class="page-header">
		<div class="container">
			<h1>Who we are</h1>
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

				<div class="list no-border">

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post(); ?>
						<section class="item">
							<div class="copy">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<h4><?php the_field('title'); ?>, <?php the_field('team'); ?></h4>
							<?php the_excerpt(); ?>
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
