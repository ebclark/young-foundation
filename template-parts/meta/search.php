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
		
		<?php // Get terms for post
		if ( has_category() ) :
			$categories = get_the_category( $post->ID );
			foreach( $categories as $category ) { ?>
				<a class="tag dk" href="/?sfid=358&_sft_category=<?php echo $category->slug; ?>"><?php echo $category->name; ?></a>
			<?php } ?>
		<?php endif; ?>

	</div>

<?php endif; ?>
