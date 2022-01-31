<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package young-foundation
 */

get_header();
?>

	<main id="primary">
		<div class="page-header plain">
			<div class="container">
				<div class="copy">
					<h1>Oops! That page can't be found.</h1>
				</div>
			</div>
		</div>

		<section class="content">
			<div class="container">
				<p>It looks like nothing was found at this location. Maybe try one of the links below or a search?</p>
				<?php get_search_form(); ?>
			</div>
		</section>
		<section class="content">
			<div class="container">
				<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
			</div>
		</section>
		<section class="content">
			<div class="container">
				<h2 class="widget-title"><?php esc_html_e( 'Most viewed themes', 'young-foundation' ); ?></h2>
				<ul>
					<?php
					wp_list_categories(
						array(
							'orderby'    => 'count',
							'order'      => 'DESC',
							'title_li'   => '',
							'number'     => 10,
						)
					);
					?>
				</ul>
			</div>
		</section>

	</main><!-- #main -->

<?php
get_footer();
