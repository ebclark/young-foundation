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

$count = count( get_sub_field('grid') );

?>

<div class="grid count<?php echo $count; ?>">
	<?php 
	if( have_rows('grid') ):
		while( have_rows('grid') ) : the_row();
			$title = get_sub_field('title');
			$text = get_sub_field('text');

			$grid_cta = get_sub_field('secondary_cta');
			$link = $grid_cta['link'];
			$button = $grid_cta['button'];

			if ( $link ) :
				$gcta_url = $link['url'];
				$gcta_label = $link['title'];
				$gcta_target = $link['target'] ? $link['target'] : '_self'; 
			endif;
			?>
			<div class="item">
				<div class="copy">
					<h3><?php echo $title; ?></h3>
					<?php echo $text; ?>
					<?php if ( $link ) : ?>
					<a href="<?php echo esc_url( $gcta_url ); ?>" target="<?php echo esc_attr( $gcta_target ); ?>" class="<?php if ( $button ) : echo 'button'; endif; ?>">
						<?php echo esc_html( $gcta_label ); ?>
					</a>
					<?php endif; ?>
				</div>
			</div>
		<?php endwhile;
	endif; ?>
</div>
