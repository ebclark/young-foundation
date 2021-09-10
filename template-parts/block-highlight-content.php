<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package young-foundation
 */

?>

<section class="fw content-list">
	<div class="container">
		<div class="grid no-border featured">
	
			<?php
			$featured_posts = get_sub_field('select_content');
			if( $featured_posts ): ?>
			    <?php foreach( $featured_posts as $post ): 

			        // Setup this post for WP functions (variable must be named $post).
			        setup_postdata($post); ?>

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

			    <?php break; endforeach; ?>
			    <?php 
			    // Reset the global post object so that the rest of the page works correctly.
			    wp_reset_postdata(); ?>
			<?php endif; ?>

		</div>
	</div>
</section>