<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package young-foundation
 */

?>

<?php

$title = get_sub_field('title'); 
$featured_posts = get_sub_field('content');

if ( $featured_posts ) :
	$count = count($featured_posts);
endif;

$more = get_sub_field('more_link');

if ( $more ) :
	$more_url = $more['url'];
	$more_label = $more['title'];
	$more_target = $more['target'] ? $more_link['target'] : '_self'; 
endif;

$cta = get_sub_field('call_to_action');

if ( $cta ) :
	$cta_url = $cta['url'];
	$cta_label = $cta['title'];
	$cta_target = $cta['target'] ? $cta_link['target'] : '_self'; 
endif;

$display = get_sub_field('display_settings');
$border = $display['border'];
$tint = $display['tint'];
$layout = $display['layout'];
$auto_scroll = $display['auto_scroll'];
$featured = $display['featured_first_item'];
$tags = $display['tag_content'];

?>

<section class="fw content-list <?php if ( $tint ) : echo 'tint'; endif; ?>">
	<div class="container">
		<?php if ( $border ) : ?><div class="divider"></div><?php endif; ?>
		<?php if ( $title ) : ?>
			<h2>
				<?php echo $title; ?>
				<?php if ( $more ) : ?>
					<a href="<?php echo esc_url( $more_url ); ?>" target="<?php echo esc_attr( $more_target ); ?>" class="more">
						<?php echo esc_html( $more_label ); ?>
					</a>
				<?php endif; ?>
			</h2>
		<?php endif; ?>
		<div class="grid no-border <?php if ( $layout == 'grid' && $featured ) : echo 'featured'; endif; ?> <?php if ( $layout == 'carousel' && $count > 3 ) : if ( $auto_scroll ) : echo 'grid-carousel-auto'; else : echo 'grid-carousel'; endif; endif; ?> <?php if ( ! $title ) : echo 'no-title'; endif; ?>">

			<?php if( $featured_posts ): ?>
			    <?php foreach( $featured_posts as $post ): 

			        // Setup this post for WP functions (variable must be named $post).
			        setup_postdata($post); ?>
			        <div class="item">
						<?php if ( has_post_thumbnail() ) : ?><a href="<?php the_permalink(); ?>" class="image-container"><div class="image"><div style="background-image:url(<?php the_post_thumbnail_url('large'); ?>);"></div></div></a><?php endif; ?>
						<div class="copy">

							<?php if ( get_post_type() != 'event' && ( $tags == 'type' || $tags == 'both' ) ) : ?>
								<?php get_template_part( 'template-parts/meta/type', '' ); ?>
							<?php endif; ?>

							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

							<?php if ( get_post_type() != 'event' ) : ?>
								<?php if ( ( $tags == 'categories' || $tags == 'both' ) ) : ?>
									<?php get_template_part( 'template-parts/meta/cats', '' ); ?>
								<?php endif; ?>
							<?php endif; ?>

							<?php the_excerpt(); ?>
						</div>
					</div>

			    <?php endforeach; ?>
			    <?php 
			    // Reset the global post object so that the rest of the page works correctly.
			    wp_reset_postdata(); ?>
			<?php endif; ?>

		</div>
		<?php if ( $cta ) : ?>
			<a href="<?php echo esc_url( $cta_url ); ?>" target="<?php echo esc_attr( $cta_target ); ?>" class="button">
				<?php echo esc_html( $cta_label ); ?>
			</a>
		<?php endif; ?>
		<?php if ( ! $title ) : ?>
			<?php if ( $more ) : ?>
				<a href="<?php echo esc_url( $more_url ); ?>" target="<?php echo esc_attr( $more_target ); ?>" class="more">
					<?php echo esc_html( $more_label ); ?>
				</a>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</section>
