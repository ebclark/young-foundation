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
$type = get_sub_field('content_type');

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
$show = $display['show'];

?>

<section class="fw latest-content-list <?php if ( $tint ) : echo 'tint'; endif; ?>">
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
		<div class="grid no-border count<?php echo $show ?>">
			<?php $loop = new WP_Query( array( 'post_type' => $type, 'posts_per_page' => $show ) ); ?>
		    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			    <a href="<?php the_permalink(); ?>" class="item">
					<?php if ( has_post_thumbnail() ) : ?><div class="image-container"><div class="image"><div style="background-image:url(<?php the_post_thumbnail_url('large'); ?>);"></div></div></div><?php endif; ?>
					<div class="copy">
						<h3><?php the_title(); ?></h3>
						<?php if ( $type == 'post' || 'publications' ) : ?><span class="date"><?php echo get_the_date(); ?></span><?php endif; ?>
						<?php   // Get terms for post
						if ( has_category() ) :
							$categories = get_the_category( $post->ID );
							foreach( $categories as $category ) { ?>
								<span class="tag"><?php echo $category->name; ?></span>
							<?php } ?>
						<?php endif; ?>
						<?php the_excerpt(); ?>
					</div>
				</a>
		    <?php wp_reset_postdata(); endwhile; ?>
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
