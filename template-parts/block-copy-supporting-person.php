<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package young-foundation
 */

?>

<aside class="person">
	<?php
	$featured_posts = get_sub_field('select_person');
	if( $featured_posts ): ?>
	    <?php foreach( $featured_posts as $post ): 

	        // Setup this post for WP functions (variable must be named $post).
	        setup_postdata($post); ?>

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="image-container">
					<div class="image square">
						<div style="background-image:url(<?php the_post_thumbnail_url('large'); ?>);"></div>
						<div class="person"></div>
					</div>
					<div class="icon-bubble-rounded <?php echo $colour; ?>"></div>
				</div>
			<?php endif; ?>
			<div class="copy">
				<h3 class="h4"><a href="<?php the_permalink(); ?>">Contact <?php the_title(); ?></a><br /> <?php the_field('title'); ?></h3>
				<?php
				$phone = get_field('phone_number');
				$email = get_field('email_address'); 
				?>

				<?php if( $phone ): echo $phone . '<br />'; endif; ?>
				<?php if( $email ): ?><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a><?php endif; ?>
			</div>
	    <?php break; endforeach; ?>
	    <?php 
	    // Reset the global post object so that the rest of the page works correctly.
	    wp_reset_postdata(); ?>
	<?php endif; ?>
</aside>
