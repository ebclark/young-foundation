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

$heading = get_field('heading_type');
$alt = get_field('alt_title');
$intro = get_field('introduction');
$colour = get_field('colour');

$cta = get_field('call_to_action');

if ( $cta ) :
	$cta_url = $cta['url'];
	$cta_label = $cta['title'];
	$cta_target = $cta['target'] ? $cta_link['target'] : '_self'; 
endif;

?>


<?php if ( ! is_front_page() ) : get_template_part( 'template-parts/breadcrumbs', '' ); endif; ?>

<div class="page-header <?php if ( $heading ) : echo $heading; else : echo 'plain'; endif; ?> <?php if ( $heading != 'plain' ) : echo $colour; endif; ?>">
	<div class="container">
		<div class="copy">
			<?php if ( $alt ) : ?>
				<h1><?php echo $alt; ?></h1>
			<?php else : ?>
				<h1><?php the_title(); ?></h1>
			<?php endif; ?>

			<?php if ( get_post_type() == 'people' ) : ?><h2><?php the_field('title'); ?>, <?php the_field('team'); ?></h2><?php endif; ?>

			<?php if ( $intro ) : ?><div class="intro"><?php echo $intro; ?></div><?php endif; ?>

			<?php if ( get_post_type() == 'post' || get_post_type() ==  'publications' ) : ?>
				<h2>
					Authors 
					<?php
					$authors = get_field('select_authors' );
					if( $authors ): ?>
					    <?php foreach( $authors as $post ): 

					        // Setup this post for WP functions (variable must be named $post).
					        setup_postdata($post); ?>
					        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 

					    <?php endforeach; ?>
					    <?php 
					    // Reset the global post object so that the rest of the page works correctly.
					    wp_reset_postdata(); ?>
					<?php endif; ?>
				</h2>
				<span class="date"><?php the_date(); ?></span>
			<?php endif; ?>

			<?php if ( has_category() ) :
				// Get terms for post
				$categories = get_the_category( $post->ID );
				foreach( $categories as $category ) { ?>
					<a class="tag" href="http://www.ebclark.co.uk/dev/yf/?sfid=358&_sft_category=<?php echo $category->slug; ?>"><?php echo $category->name; ?></a>
				<?php } 
			endif; ?>
			<?php if ( $cta ) : ?>
				<a href="<?php echo esc_url( $cta_url ); ?>" target="<?php echo esc_attr( $cta_target ); ?>" class="button">
					<?php echo esc_html( $cta_label ); ?>
				</a>
			<?php endif; ?>
		</div>
	</div>
	<?php if ( $heading == 'featured-image' && has_post_thumbnail() ) : ?><div class="image-container"><div class="image"><div style="background-image:url(<?php the_post_thumbnail_url('large'); ?>);"></div></div></div><?php endif; ?>
</div>
