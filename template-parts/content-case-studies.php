<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package young-foundation
 */

?>

<?php get_template_part( 'template-parts/heading', '' ); ?>

<article>
	<?php get_template_part( 'template-parts/blocks', '' ); ?>

	<div class="container">
		<?php the_content() ?>
	</div>
</article>