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
<article>
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
</article>
