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

<div class="page-header <?php if ( $heading ) : echo $heading; else : echo 'plain'; endif; ?> <?php if ( $heading != 'plain' ) : echo $colour; endif; ?>">
	<?php if ( $heading != 'plain' ) : ?>
		<?php get_template_part( 'template-parts/bubbles', '' ); ?>
	<?php endif; ?>
	<div class="container">
		<div class="copy">
			<?php if ( ! $hide ) : ?>
				<?php if ( $alt ) : ?>
					<h1><?php echo $alt; ?></h1>
				<?php else : ?>
					<h1><?php the_title(); ?></h1>
				<?php endif; ?>
			<?php endif; ?>

			<?php if ( get_post_type() == 'people' ) : ?>
				<?php get_template_part( 'template-parts/meta/people', '' ); ?>
			<?php endif; ?>

			<?php if ( get_post_type() == 'event' && $heading == 'featured-image' ) : ?>
				<h2 class="h3"><?php get_template_part( 'template-parts/meta/event-date', '' ); ?></h2>
			<?php endif; ?>

			<?php if ( $intro ) : ?><div class="intro"><?php echo $intro; ?></div><?php endif; ?>

			<?php if ( get_post_type() == 'post' || get_post_type() == 'news' || get_post_type() ==  'publications' ) : ?>
				<?php get_template_part( 'template-parts/meta/authors', '' ); ?>
			<?php endif; ?>

			<?php if ( get_post_type() == 'event' && $heading == 'featured-image' ) : ?>
				<div class="tag-container">
					<?php get_template_part( 'template-parts/meta/event-type', '' ); ?>
					<?php get_template_part( 'template-parts/meta/cats', '' ); ?>
				</div>
			<?php endif; ?>

			<?php if ( get_post_type() == 'post' || get_post_type() == 'news' || get_post_type() ==  'publications' ) : ?>
				<?php get_template_part( 'template-parts/meta/cats', '' ); ?>
				<?php get_template_part( 'template-parts/meta/date', '' ); ?>
			<?php endif; ?>

			<?php if ( get_post_type() == 'impact-stories' ) : ?>
				<?php get_template_part( 'template-parts/meta/cats', '' ); ?>
			<?php endif; ?>

			<?php if ( $cta ) : ?>
				<a href="<?php echo esc_url( $cta_url ); ?>" target="<?php echo esc_attr( $cta_target ); ?>" class="button">
					<?php echo esc_html( $cta_label ); ?>
				</a>
			<?php endif; ?>
		</div>
	</div>
	<?php if ( $heading == 'featured-image' && has_post_thumbnail() ) : ?><div class="image-container"><div class="image"><div style="background-image:url(<?php the_post_thumbnail_url('large'); ?>);"></div></div></div><?php endif; ?>
</div>
