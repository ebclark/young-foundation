<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package young-foundation
 */

?>

<?php get_template_part( 'template-parts/heading', '' ); ?>

<?php 

$heading = get_field('heading_type');

?>

<article class="has-aside">
	<div class="container">
		<div class="content">
			<?php the_content() ?>
		</div>
		<aside>
			<?php if ( $heading != 'featured-image' ) : ?>
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="image-container">
						<div class="image">
							<div style="background-image:url(<?php the_post_thumbnail_url('large'); ?>);"></div>
						</div>
					</div>
				<?php endif; ?>
			<?php endif; ?>
		</aside>
	</div>
</article>