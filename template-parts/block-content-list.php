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
$featured = $display['featured_first_item'];

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
		<div class="grid no-border <?php if ( $layout == 'grid' && $featured ) : echo 'featured'; endif; ?> <?php if ( $layout == 'carousel' ) : echo 'grid-carousel'; endif; ?>">

			<?php
			$featured_posts = get_sub_field('content');
			if( $featured_posts ): ?>
			    <?php foreach( $featured_posts as $post ): 

			        // Setup this post for WP functions (variable must be named $post).
			        setup_postdata($post); ?>
			        <div class="item">
						<?php if ( has_post_thumbnail() ) : ?><div class="image-container"><div class="image"><div style="background-image:url(<?php the_post_thumbnail_url('large'); ?>);"></div></div></div><?php endif; ?>
						<div class="copy">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<?php   // Get terms for post
							if ( has_category() ) :
								$categories = get_the_category( $post->ID );
								foreach( $categories as $category ) { ?>
									<a class="tag" href="http://www.ebclark.co.uk/dev/yf/?sfid=358&_sft_category=<?php echo $category->slug; ?>"><?php echo $category->name; ?></a>
								<?php } ?>
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
				<a href="<?php echo esc_url( $more_url ); ?>" target="<?php echo esc_attr( $more_target ); ?>">
					<?php echo esc_html( $more_label ); ?>
				</a>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</section>
