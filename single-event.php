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

	<?php get_template_part( 'template-parts/heading', '' ); ?>

	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', get_post_type() ); ?>

	<?php endwhile; // End of the loop. ?>

</main><!-- #main -->

<?php

get_footer();
