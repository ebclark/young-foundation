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

$type = get_sub_field('type'); 

?>

<?php if ( $type == 'free' ) : get_template_part( 'template-parts/block-highlight-banner-free', '' ); endif; ?>
<?php if ( $type == 'excerpt' ) : get_template_part( 'template-parts/block-highlight-banner-excerpt', '' ); endif; ?>
