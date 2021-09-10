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

$media = get_sub_field('media_type');

$image = get_sub_field('image');
$alt = $image['alt'];
$caption = $image['caption'];

$video = get_sub_field('video');

$display = get_sub_field('display_settings');
$layout = $display['gallery_layout'];
$border = $display['border'];
$tint = $display['tint'];

?>

<section class="fw standalone-media <?php if ( $tint ) : echo 'tint'; endif; ?>">
	<div class="container">
		<?php if ( $border ) : ?><div class="divider"></div><?php endif; ?>
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
		<?php elseif ( $media == 'gallery' ) : ?>
			<?php 
			$images = get_sub_field('gallery');
			$count = count( get_sub_field('gallery') );
			if( $images ): 
				$number = 1; ?>
			    <div class="<?php if ( $layout == 'carousel' ) : echo 'carousel'; else : echo 'image-grid'; endif; ?>">
			        <?php foreach( $images as $image ): ?>
			            <div class="image-container">
			            	<div class="image"><div style="background-image:url(<?php echo $image['sizes']['large'] ?>)" <?php if ( $alt ) : ?>role="img" aria-label="<?php echo $alt; ?>"<?php endif; ?>></div></div>
			            	<?php if ( $layout == 'carousel' ) : ?><div class="image-caption"><span><?php echo $image['caption']; ?></span> <span><?php echo $number; ?>/<?php echo $count; ?></span></div><?php endif; ?>
			            </div>
			        <?php $number++; endforeach; ?>
			    </div>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</section>
