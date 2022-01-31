<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package young-foundation
 */

?>

<?php get_template_part( 'template-parts/heading', '' ); ?>

<?php 

$current = $post->ID;
$parent = $post->post_parent;
$grandparent_get = get_post($parent);
$grandparent = $grandparent_get->post_parent;

$left_nav = get_field('left_navigation');
$show_left_nav = get_field('show_left_nav');

if ( $show_left_nav ) : 

?>
<nav class="in-page">
	<button class="show-page-nav" aria-controls="in-page-menu" aria-expanded="false">Show page menu</button>
	<ul id="in-page-menu">

		<?php 
			if ( $grandparent ) : 
				echo '<li><a href="' . get_permalink( $grandparent ) . '" >' . get_the_title( $grandparent ) . '</a></li>';
				wp_list_pages( array(
			        'title_li'    => '',
			        'child_of'    => $grandparent,
			        'depth'  	=> '1',
			    ) );
			elseif ( $parent ) :
				echo '<li><a href="' . get_permalink( $parent ) . '" >' . get_the_title( $parent ) . '</a></li>';
				wp_list_pages( array(
			        'title_li'    => '',
			        'child_of'    => $parent,
			        'depth'  	=> '1',
			    ) );
			else :
				echo '<li class="current_page_item"><a href="' . get_permalink( $current ) . '" >' . get_the_title( $current ) . '</a></li>';
				wp_list_pages( array(
			        'title_li'    => '',
			        'child_of'    => $current,
			        'depth'  	=> '1',
			    ) );
			endif; 
		?>

	</ul>
</nav>
<?php endif; ?>

<?php
$post = get_queried_object();

if ( function_exists( 'pmpro_has_membership_access' ) ) :

	// Check if the user has access to the post.
	$hasaccess = pmpro_has_membership_access( $post->ID );
	
	// Display Advanced Custom Fields if the user has access to the post.
	if( ! empty( $hasaccess ) && function_exists( 'get_field' ) ) :

		get_template_part( 'template-parts/blocks', '' ); 

	endif;
endif;
?>

<div class="container">
	<?php the_content() ?>
</div>



