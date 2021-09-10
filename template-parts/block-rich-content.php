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

$content = get_sub_field('content'); 

?>

<section class="fw content">
	<div class="container">
		<?php echo $content; ?>
	</div>
</section>
