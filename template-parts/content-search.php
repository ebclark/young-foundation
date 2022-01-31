<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package young-foundation
 */

?>

<?php 

$video = get_field('video');

?>

<section class="item">
	<div class="copy">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php if ( get_post_type() != 'event' ) : ?>   
        	<?php get_template_part( 'template-parts/meta/search', '' ); ?>
        <?php endif; ?>

		<?php the_excerpt(); ?>
	</div>
	<?php if ( $video ) : ?>
		<div class="video-container">
			<div class="maintain-ratio">
				<div class="inside"><?php echo $video; ?></div>
			</div>
		</div>
	<?php elseif ( has_post_thumbnail() ) : ?>
		<div class="image-container">
			<div class="image">
				<div style="background-image:url(<?php the_post_thumbnail_url('large'); ?>);"></div>
			</div>
		</div>
	<?php endif; ?>
</section>
