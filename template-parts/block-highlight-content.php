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

$display = get_sub_field('display_settings');
$border = $display['border'];
$tint = $display['tint'];

?>

<section class="fw content-list highlight <?php if ( $tint ) : echo 'tint'; endif; ?>">
	<div class="container">
		<?php if ( $border ) : ?><div class="divider"></div><?php endif; ?>
		<?php if ( $title ) : echo '<h2>' . $title . '</h2>'; endif; ?>
		<div class="grid no-border featured">
	
			<?php
			$featured_posts = get_sub_field('select_content');
			if( $featured_posts ): ?>
			    <?php foreach( $featured_posts as $post ): 

			        // Setup this post for WP functions (variable must be named $post).
			        setup_postdata($post); ?>

			        <div class="item">
						<?php if ( has_post_thumbnail() ) : ?><a href="<?php the_permalink(); ?>" class="image-container"><div class="image"><div style="background-image:url(<?php the_post_thumbnail_url('large'); ?>);"></div></div></a><?php endif; ?>
						<div class="copy">
							<?php if ( get_post_type() != 'page' && get_post_type() != 'event' ) : ?>
								<div class="tag-container">
									<?php 
									$post_type = get_post_type_object( get_post_type($post) );
									$post_label = get_post_type();
									if ( get_post_type() == 'post' ) : ?>
										<span class="tag">Blog</span>
									<?php else : ?>
										<span class="tag"><?php echo $post_type->labels->singular_name; ?></span>
									<?php endif; ?>
									<?php if ( $type == 'post' || 'publications' ) : ?><span class="date"><?php echo get_the_date(); ?></span><?php endif; ?>
								</div>
							<?php endif; ?>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							
							<?php if ( get_post_type() == 'event' ) : ?>
								<h4><?php get_template_part( 'template-parts/meta/event-date', '' ); ?></h4>
								<div class="tag-container">
									<?php get_template_part( 'template-parts/meta/event-type', '' ); ?>
									<?php get_template_part( 'template-parts/meta/cats', '' ); ?>
								</div>
							<?php else : ?>
								<div class="tag-container">
									<?php get_template_part( 'template-parts/meta/cats', '' ); ?>
								</div>
							<?php endif; ?>
							<?php the_excerpt(); ?>
						</div>
					</div>

			    <?php break; endforeach; ?>
			    <?php 
			    // Reset the global post object so that the rest of the page works correctly.
			    wp_reset_postdata(); ?>
			<?php endif; ?>

		</div>
	</div>
</section>