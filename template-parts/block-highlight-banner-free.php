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

$free = get_sub_field('free_text'); 
$title = $free['title']; 
$copy = $free['copy']; 

$cta = $free['call_to_action']; 

if ( $cta ) :
	$cta_url = $cta['url'];
	$cta_label = $cta['title'];
	$cta_target = $cta['target'] ? $cta_link['target'] : '_self'; 
endif;

$display = $free['display_settings'];
$htype = $display['highlight_type'];
$border = $display['border'];
$colour = $display['colour'];
$image = $display['background_image'];
$alt = $image['alt'];
$notint = $display['hide_tint'];

?>

<section class="fw highlight-banner <?php echo $htype; ?> <?php if ( $htype == 'solid' ) : echo $colour; endif; ?> <?php if ( $notint ) : echo 'notint'; endif; ?>">
	<?php if ( $image ) : ?>
		<div class="bg-image" style="background-image:url(<?php echo $image['sizes']['large'] ?>)" <?php if ( $alt ) : ?>role="img" aria-label="<?php echo $alt; ?>"<?php endif; ?>></div>
		<?php if ( ! $notint ) : ?>
			<div class="tint-dk"></div>
			<div class="tint-red"></div>
		<?php endif; ?>
	<?php endif; ?>
	<div class="container">
		<?php if ( $border ) : ?><div class="divider"></div><?php endif; ?>
		<div class="copy">
			<?php if ( $title ) : echo '<h2>' . $title . '</h2>'; endif; ?>
			<?php if ( $copy ) : ?><div class="intro"><?php echo $copy; ?></div><?php endif; ?>
			<?php if ( $cta ) : ?>
				<a href="<?php echo esc_url( $cta_url ); ?>" target="<?php echo esc_attr( $cta_target ); ?>" class="button">
					<?php echo esc_html( $cta_label ); ?>
				</a>
			<?php endif; ?>
		</div>
	</div>
</section>