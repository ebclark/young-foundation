<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
					<h1>Search Results
						<?php
						$term = get_search_query();
						if ( $term ) : echo 'for: ' . $term; endif;
						?>
					</h1>
				</div>
			</div>
		</div>

		<div class="filter-container">
			<div class="container">

				<aside>
					<button class="show-page-filter" aria-controls="in-page-menu" aria-expanded="false">Show filter</button>
					<?php get_sidebar(); ?>
				</aside>

				<?php if ( have_posts() ) : ?>

				<div class="results" id="filter-results">
					<h2>
						<?php
						global $wp_query;
						echo $wp_query->found_posts.' results found';
						?>
					</h2>
					<div class="list no-border">

						<?php
						/* Start the Loop */
						while ( have_posts() ) :

							the_post();

							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'search' );

						endwhile; ?>

				</div>

				<?php the_posts_pagination( array(
					'mid_size'  => 2,
					'prev_text' => __( 'Previous', 'textdomain' ),
					'next_text' => __( 'Next', 'textdomain' ),
				) ); ?>

				<?php else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>

			</div>
		</div>

	</main><!-- #main -->

<?php
get_footer();
