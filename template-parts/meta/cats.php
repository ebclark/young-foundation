<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package young-foundation
 */

?>
<?php // Get terms for post
if ( has_category() ) :
	$categories = get_the_category( $post->ID );
	foreach( $categories as $category ) { ?> <a class="tag dk" href="/?sfid=358&_sft_category=<?php echo $category->slug; ?>"><?php echo $category->name; ?></a><?php } ?>
<?php endif; ?>
