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

$quote = get_sub_field('quote'); 

?>

<blockquote>
	<?php echo $quote['quote_text']; ?>
	<span><?php echo $quote['attribution']; ?></span>
</blockquote>
