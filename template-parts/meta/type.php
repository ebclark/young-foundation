<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package young-foundation
 */

?>

<?php if ( get_post_type() != 'page' ) :

	$post_type = get_post_type_object( get_post_type($post) );
	$post_label = get_post_type(); ?>

	<div class="type">

		<?php if ( get_post_type() == 'post' ) : ?>
			<span class="tag">Blog</span>
		<?php else : ?>
			<span class="tag"><?php echo $post_type->labels->singular_name; ?></span>
		<?php endif; ?>

		<?php get_template_part( 'template-parts/meta/date', '' ); ?>

	</div>

<?php endif; ?>