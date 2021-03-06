
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
$code = get_sub_field('shortcode'); 

$display = get_sub_field('display_settings');
$border = $display['border'];
$tint = $display['tint'];

?>

<section class="fw <?php if ( $tint ) : echo 'tint'; endif; ?>">
	<div class="container">
		<?php if ( $border ) : ?><div class="divider"></div><?php endif; ?>
		<?php if ( $title ) : echo '<h2>' . $title . '</h2>'; endif; ?>
		<?php echo do_shortcode( $code ); ?>
	</div>
</section>
