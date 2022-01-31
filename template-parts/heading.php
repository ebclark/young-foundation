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
$hide = get_field('hide_title');
$intro = get_field('introduction');
$colour = get_field('colour');

$cta = get_field('call_to_action');

if ( $cta ) :
	$cta_url = $cta['url'];
	$cta_label = $cta['title'];
	$cta_target = $cta['target'] ? $cta_link['target'] : '_self'; 
endif;

?>

<div class="page-header <?php if ( $heading ) : if ( $heading == 'featured-image' ) : echo 'solid featured-image'; elseif ( $heading == 'solid' ) : echo 'solid'; elseif ( $heading == 'plain' ) : echo 'plain'; endif; else : echo 'plain'; endif; ?> <?php if ( $heading != 'plain' ) : echo $colour; endif; ?>">
	<?php if ( get_post_type() != 'people' ) : get_template_part( 'template-parts/bubbles', '' ); endif; ?>
	<div class="container">
		<div class="copy">
			<?php if ( ! $hide ) : ?>
				<?php if ( $alt ) : ?>
					<h1><?php echo $alt; ?></h1>
				<?php else : ?>
					<h1><?php the_title(); ?></h1>
				<?php endif; ?>
			<?php endif; ?>

			<?php if ( $intro ) : ?><div class="intro"><?php echo $intro; ?></div><?php endif; ?>

			<?php if ( get_post_type() == 'event' ) : ?>
				
				<?php get_template_part( 'template-parts/meta/event-type', '' ); ?>
				<?php get_template_part( 'template-parts/meta/cats', '' ); ?>
				
			<?php endif; ?>

			<?php if ( get_post_type() == 'impact-stories' || get_post_type() == 'projects' ) : ?>
				<?php get_template_part( 'template-parts/meta/cats', '' ); ?>
			<?php endif; ?>

			<?php if ( $cta ) : ?>
				<a href="<?php echo esc_url( $cta_url ); ?>" target="<?php echo esc_attr( $cta_target ); ?>" class="button">
					<?php echo esc_html( $cta_label ); ?>
				</a>
			<?php endif; ?>
		</div>
	</div>
</div>
