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
$copy = get_sub_field('copy'); 

$supporting = get_sub_field('supporting_content');

$cta = get_sub_field('call_to_action');

if ( $cta ) :
	$cta_url = $cta['url'];
	$cta_label = $cta['title'];
	$cta_target = $cta['target'] ? $cta_link['target'] : '_self'; 
endif;

$display = get_sub_field('display_settings');
$border = $display['border'];
$tint = $display['tint'];

?>

<section class="une copy-supporting <?php if ( $supporting == 'grid' ) : echo 'grid-container'; endif; ?> <?php if ( $tint ) : echo 'tint'; endif; ?> <?php echo $supporting; ?>">
	<div class="container">
		<?php if ( $supporting == 'person' ) : get_template_part( 'template-parts/block-copy-supporting-person', '' ); endif; ?>
		<?php if ( $supporting != 'person' ) : ?>
			<?php if ( $border ) : ?><div class="divider"></div><?php endif; ?>
			<?php if ( $title ) : echo '<h2>' . $title . '</h2>'; endif; ?>
		<?php endif; ?>
		<div class="copy">
			<?php if ( $supporting == 'person' ) : ?>
				<?php if ( $title ) : echo '<h2>' . $title . '</h2>'; endif; ?>
			<?php endif; ?>
			<?php if ( $copy ) : echo $copy; endif; ?>
			<?php if ( $cta ) : ?>
				<a href="<?php echo esc_url( $cta_url ); ?>" target="<?php echo esc_attr( $cta_target ); ?>" class="button">
					<?php echo esc_html( $cta_label ); ?>
				</a>
			<?php endif; ?>
		</div>
		<?php if ( $supporting == 'quote' ) : get_template_part( 'template-parts/block-copy-supporting-quote', '' ); endif; ?>
		<?php if ( $supporting == 'secondary' ) : get_template_part( 'template-parts/block-copy-supporting-copy', '' ); endif; ?>
		<?php if ( $supporting == 'links' ) : get_template_part( 'template-parts/block-copy-supporting-links', '' ); endif; ?>
		<?php if ( $supporting == 'grid' ) : get_template_part( 'template-parts/block-copy-supporting-grid', '' ); endif; ?>
		<?php if ( $supporting == 'person' ) : ?>
			<?php if ( $border ) : ?><div class="divider"></div><?php endif; ?>
		<?php endif; ?>
	</div>
</section>
