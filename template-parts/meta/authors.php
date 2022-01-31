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
$authors = get_field('select_authors' );
if( $authors ): ?>

Authors:  
    <?php foreach( $authors as $post ): 

        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post); ?>
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>,  

    <?php endforeach; ?>
    <?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>

<?php endif; ?>