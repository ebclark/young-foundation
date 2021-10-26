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

$display = get_sub_field('display_settings');
$htype = $display['highlight_type'];
$border = $display['border'];
$colour = $display['colour'];
$image = $display['background_image'];
$alt = $image['alt'];

?>

<section class="fw highlight-banner newsletter <?php echo $htype; ?> <?php if ( $htype == 'solid' ) : echo $colour; endif; ?>">
	<?php if ( $image ) : ?>
		<div class="bg-image" style="background-image:url(<?php echo $image['sizes']['large'] ?>)" <?php if ( $alt ) : ?>role="img" aria-label="<?php echo $alt; ?>"<?php endif; ?>></div>
		<div class="tint-dk"></div>
		<div class="tint-red"></div>
	<?php endif; ?>
	<div class="container">
		<?php if ( $border && $htype == 'plain' ) : ?><div class="divider"></div><?php endif; ?>
		<div class="copy">
			<?php if ( $title ) : ?><h2><?php echo $title; ?></h2><?php endif; ?>
			<?php if ( $copy ) : echo $copy; endif; ?>
			<a href="/newsletter" class="button">Sign up today</a>
		</div>
	</div>
</section>