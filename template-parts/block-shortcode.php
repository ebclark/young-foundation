
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

$code = get_sub_field('shortcode'); 

?>

<section class="fw">
	<div class="container">
		<?php echo do_shortcode( $code ); ?>
	</div>
</section>
