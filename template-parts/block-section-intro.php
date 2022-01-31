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

$title = get_sub_field('title'); ; 
$copy = get_sub_field('copy'); ; 

$display = get_sub_field('display_settings');
$border = $display['border'];
$tint = $display['tint'];

?>

<section class="fw highlight-banner <?php if ( $tint ) : echo 'tint'; endif; ?>">
	<div class="container">
		<?php if ( $border ) : ?><div class="divider"></div><?php endif; ?>
		<div class="copy">
			<?php if ( $title ) : echo '<h2>' . $title . '</h2>'; endif; ?>
			<?php if ( $copy ) : ?><div class="intro"><?php echo $copy; ?></div><?php endif; ?>
		</div>
	</div>
</section>