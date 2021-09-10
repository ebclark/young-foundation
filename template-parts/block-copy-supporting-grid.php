<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package young-foundation
 */

?>

<?php 

$count = count( get_sub_field('grid') );

?>

<div class="grid count<?php echo $count; ?>">
	<?php 
	if( have_rows('grid') ):
		while( have_rows('grid') ) : the_row();
			$title = get_sub_field('title');
			$text = get_sub_field('text');
			?>
			<div class="item">
				<h3><?php echo $title; ?></h3>
				<?php echo $text; ?>
			</div>
		<?php endwhile;
	endif; ?>
</div>
