<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package young-foundation
 */

?>

<aside>
	<?php 
	if( have_rows('secondary_copy') ):
		while( have_rows('secondary_copy') ) : the_row();
			$title = get_sub_field('title');
			$text = get_sub_field('text');
			?>
			<h3><?php echo $title; ?></h3>
			<?php echo $text; ?>
		<?php endwhile;
	endif; ?>
</aside>
