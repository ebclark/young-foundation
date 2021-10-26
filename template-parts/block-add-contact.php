<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package young-foundation
 */

?>

<?php // get field values

$title = get_sub_field('title'); 

?>

<section class="fw add-contact">
	<div class="container">
		<div class="grid no-border">
			
			<?php
			$featured_posts = get_sub_field('select_contact');
			if( $featured_posts ): ?>
			    <?php foreach( $featured_posts as $post ): 

			        // Setup this post for WP functions (variable must be named $post).
			        setup_postdata($post); ?>

					<div class="item">
						<?php if ( has_post_thumbnail() ) : ?><div class="image-container"><div class="image square"><div style="background-image:url(<?php the_post_thumbnail_url('large'); ?>);"></div></div></div><?php endif; ?>
					</div>
			        <div class="item">
			        	<h3>
			        		<?php if ( $title ) : echo $title; else : echo 'Work with us'; endif; ?>
			        	</h3>
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?> <?php the_field('team'); ?></a></h4>
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

		</div>
	</div>
</section>