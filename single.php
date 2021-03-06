<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package young-foundation
 */

get_header();
?>

<main id="primary">

	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', get_post_type() ); ?>

		<div class="container">
			<?php // If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif; ?>

		</div>

		<?php get_template_part( 'template-parts/related-content', '' ); ?>

	<?php endwhile; // End of the loop. ?>

</main><!-- #main -->

<?php

get_footer();
