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

$media = get_sub_field('media_type');

$image = get_sub_field('image');
$alt = $image['alt'];
$caption = $image['caption'];

$video = get_sub_field('video');

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

<section class="hh copy-media <?php echo $display['media_position'] ?> <?php if ( $tint ) : echo 'tint'; endif; ?>">
	<div class="container">
		<?php if ( $border ) : ?><div class="divider"></div><?php endif; ?>
		<div class="copy">
			<?php if ( $title ) : echo '<h2>' . $title . '</h2>'; endif; ?>
			<?php if ( $copy ) : echo $copy; endif; ?>
			<?php if ( $cta ) : ?>
				<a href="<?php echo esc_url( $cta_url ); ?>" target="<?php echo esc_attr( $cta_target ); ?>" class="button">
					<?php echo esc_html( $cta_label ); ?>
				</a>
			<?php endif; ?>
		</div>
		<?php if ( $media == 'image' ) : ?>
			<div class="image-container">
				<div class="image <?php echo $display['ratio'] ?>"><div style="background-image:url(<?php echo $image['sizes']['large'] ?>)" <?php if ( $alt ) : ?>role="img" aria-label="<?php echo $alt; ?>"<?php endif; ?>></div></div>
				<?php if ( $caption ) : ?><div class="image-caption"><?php echo $caption; ?></div><?php endif; ?>
			</div>
		<?php elseif ( $media == 'video' ) : ?>
			<div class="video-container">
				<div class="maintain-ratio">
					<div class="inside"><?php echo $video; ?></div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>
