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
<article class="has-aside">
	<div class="container">
		<div class="content">
			<?php the_content() ?>

			<?php
			$post = get_queried_object();

			if ( function_exists( 'pmpro_has_membership_access' ) ) :

				// Check if the user has access to the post.
				$hasaccess = pmpro_has_membership_access( $post->ID );
				
				// Display Advanced Custom Fields if the user has access to the post.
				if( ! empty( $hasaccess ) && function_exists( 'get_field' ) ) : ?>

					<div class="divider thin"></div>
					<p><?php get_template_part( 'template-parts/meta/cats', '' ); ?></p>
					<p>
						Posted on: <?php get_template_part( 'template-parts/meta/date', '' ); ?> 
						<?php get_template_part( 'template-parts/meta/authors', '' ); ?>
					</p>

				<?php endif;
			endif;
			?>
		</div>
		<aside class="publication">
			<?php
			$post = get_queried_object();

			if ( function_exists( 'pmpro_has_membership_access' ) ) :

				// Check if the user has access to the post.
				$hasaccess = pmpro_has_membership_access( $post->ID );
				
				// Display Advanced Custom Fields if the user has access to the post.
				if( ! empty( $hasaccess ) && function_exists( 'get_field' ) ) : ?>
					<?php
					$file = get_field('attach_publication');
					$ext = get_field('external_file_link');
					$cover = get_field('cover_image');
					if( $file || $ext ): ?>
						<h3 class="h4">Download publication</h3>
				    	<?php if ( $cover ) : ?>
					    	<a href="<?php if( $file ) : echo $file['url']; else : echo $ext; endif; ?>">
						    	<img src="<?php echo $cover['sizes']['large'] ?>)" <?php if ( $alt ) : ?>alt="<?php echo $cover['alt']; ?>" <?php endif; ?>/>
						    </a>
						<?php else : ?>
					    	<a href="<?php if( $file ) : echo $file['url']; else : echo $ext; endif; ?>" class="button">
								Download
							</a>
						<?php endif; ?>
					<?php endif; ?>

				<?php endif;
			endif;
			?>
		</aside>
	</div>
</article>

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

<?php get_template_part( 'template-parts/related-content', '' ); ?>
