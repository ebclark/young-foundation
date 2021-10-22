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

$excerpt = get_sub_field('content_excerpt'); 

$display = $excerpt['display_settings'];
$htype = $display['highlight_type'];
$border = $display['border'];
$colour = $display['colour'];

?>

<section class="fw highlight-banner <?php echo $htype; ?> <?php if ( $htype == 'solid' ) : echo $colour; endif; ?>">
	
<?php
$featured_posts = $excerpt['select_content'];
if( $featured_posts ): ?>
    <?php foreach( $featured_posts as $post ): 

        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post); ?>

        <?php if ( has_post_thumbnail() ) : ?>
        	<div class="bg-image" style="background-image:url(<?php the_post_thumbnail_url('large'); ?>);"></div>
			<div class="tint-dk"></div>
			<div class="tint-red"></div>
        <?php endif; ?>
		<div class="container">
			<?php if ( $htype == 'plain' && $border ) : ?><div class="divider"></div><?php endif; ?>
			<div class="copy">
				<?php if ( get_post_type() != 'page' ) : 
					$post_type = get_post_type_object( get_post_type($post) );
					$post_label = get_post_type();
					if ( get_post_type() == 'post' ) : ?>
						<div class="type"><span class="tag">Blog</span> <span class="date"><?php echo get_the_date(); ?></span></div>
					<?php else : ?>
						<div class="type"><span class="tag"><?php echo $post_type->labels->singular_name; ?></span> <span class="date"><?php echo get_the_date(); ?></span></div>
					<?php endif; ?>
				<?php endif; ?>
				<h2><?php the_title(); ?></h2>
				<div class="intro"><?php the_excerpt(); ?></div>
				<a href="<?php the_permalink(); ?>" class="button">Read more</a>
			</div>
		</div>

    <?php break; endforeach; ?>
    <?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
<?php endif; ?>

</section>