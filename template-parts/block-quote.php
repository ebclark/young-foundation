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

$quote = get_sub_field('quote_text'); 
$attribution = get_sub_field('attribution'); 

?>

<section class="fw">
	<div class="container">
		<blockquote>
			<span class="icon-quotes"></span>
			<?php echo $quote; ?>
			<span><?php echo $attribution; ?></span>
		</blockquote>
	</div>
</section>
