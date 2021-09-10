<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package young-foundation
 */

?>

<section class="item">
	<div class="copy">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php if ( get_post_type() != 'page' ) : 
			$post_type = get_post_type_object( get_post_type($post) );
			$post_label = get_post_type();
			if ( get_post_type() == 'post' ) : ?>
				<span class="tag">Blog</span>
			<?php else : ?>
				<span class="tag"><?php echo $post_type->labels->singular_name; ?></span>
			<?php endif; ?>
		<?php endif; ?>
		<?php the_excerpt(); ?>
	</div>
	<?php if ( has_post_thumbnail() ) : ?><div class="image-container"><div class="image"><div style="background-image:url(<?php the_post_thumbnail_url('large'); ?>);"></div></div></div><?php endif; ?>
</section>
