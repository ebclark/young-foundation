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
	$types = get_field('set_event_type'); 
	if( $types ): foreach( $types as $type ): ?><a href="/calendar/?_sfm_set_event_type=<?php echo $type; ?>" class="tag"><?php echo $type; ?></a><?php endforeach; endif;
?> 