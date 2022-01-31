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
$term = get_sub_field('taxonomy');

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
$tags = $display['tag_content'];
$snippet = $display['hide_excerpts'];

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
		<div class="grid no-border <?php if ( $show == 1 || $show == 4 ) : echo 'featured'; endif; ?>">
			<?php 
				$loop = new WP_Query( array( 
					'post_type' => $type, 
					'posts_per_page' => $show, 
					'category_name' => $term->name,
				)); 
			?>
		    <?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();
		    $video = get_field('video'); ?>
			    <div class="item">
			    	<?php if ( $video ) : ?>
						<div class="video-container">
							<div class="maintain-ratio">
								<div class="inside"><?php echo $video; ?></div>
							</div>
						</div>
					<?php elseif ( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>" class="image-container">
							<div class="image">
								<div style="background-image:url(<?php the_post_thumbnail_url('large'); ?>);"></div>
							</div>
						</a>
					<?php endif; ?>
					<div class="copy">

						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

						<?php if ( get_post_type() != 'event' ) : ?>
							<?php if ( ( $tags == 'categories' ) ) : ?>
								<?php get_template_part( 'template-parts/meta/cats', '' ); ?>
								<p><?php get_template_part( 'template-parts/meta/date', '' ); ?></p>
							<?php elseif ( ( $tags == 'type' ) ) : ?>
								<?php get_template_part( 'template-parts/meta/type', '' ); ?>
								<?php get_template_part( 'template-parts/meta/date', '' ); ?>
							<?php elseif ( ( $tags == 'both' ) ) : ?>
								<?php get_template_part( 'template-parts/meta/type', '' ); ?>
								<?php get_template_part( 'template-parts/meta/cats', '' ); ?>
								<p><?php get_template_part( 'template-parts/meta/date', '' ); ?></p>
							<?php endif; ?>
						<?php endif; ?>


						<?php if ( ! $snippet ) : the_excerpt(); endif; ?>
					</div>
				</div>
		    <?php wp_reset_postdata(); endwhile;
		    else : 

		    	echo 'We don\'t have anything to display here at the moment.';

		    endif; ?>
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
