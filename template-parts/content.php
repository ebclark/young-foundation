<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package young-foundation
 */

?>

<?php get_template_part( 'template-parts/heading', '' ); ?>

<?php 

$type = get_field('blog_type');
$heading = get_field('heading_type');
$video = get_field('video');
$hide = get_field('hide_featured_image');

?>

<article class="post">
	<?php if ( $type == 'video' ) : ?>
		<?php
		$post = get_queried_object();

		if ( function_exists( 'pmpro_has_membership_access' ) ) :

			// Check if the user has access to the post.
			$hasaccess = pmpro_has_membership_access( $post->ID );
			
			// Display Advanced Custom Fields if the user has access to the post.
			if( ! empty( $hasaccess ) && function_exists( 'get_field' ) ) : ?>

				<section class="fw standalone-media <?php if ( $tint ) : echo 'tint'; endif; ?>">
					<div class="container">
						<div class="video-container">
							<div class="maintain-ratio">
								<div class="inside"><?php echo $video; ?></div>
							</div>
						</div>
					</div>
				</section>

			<?php endif;
		endif;
		?>
		<div class="container">

			<div class="content">
				<?php the_content() ?>

	<?php else : ?>
		<div class="container">
			<div class="content">
				<?php
				$post = get_queried_object();

				if ( function_exists( 'pmpro_has_membership_access' ) ) :

					// Check if the user has access to the post.
					$hasaccess = pmpro_has_membership_access( $post->ID );
					
					// Display Advanced Custom Fields if the user has access to the post.
					if( ! empty( $hasaccess ) && function_exists( 'get_field' ) ) : ?>

						<?php if ( $video ) : ?>
							<div class="video-container">
								<div class="maintain-ratio">
									<div class="inside"><?php echo $video; ?></div>
								</div>
							</div>
						<?php elseif ( has_post_thumbnail() && ! $hide ) : ?>
							<div class="image-container">
								<div class="image">
									<div style="background-image:url(<?php the_post_thumbnail_url('large'); ?>);"></div>
								</div>
							</div>
						<?php endif; ?>

					<?php endif;
				endif;
				?>
				
				<?php the_content() ?>

	<?php endif; ?>

			
			<?php
			$post = get_queried_object();

			if ( function_exists( 'pmpro_has_membership_access' ) ) :

				// Check if the user has access to the post.
				$hasaccess = pmpro_has_membership_access( $post->ID );
				
				// Display Advanced Custom Fields if the user has access to the post.
				if( ! empty( $hasaccess ) && function_exists( 'get_field' ) ) : ?>

					<div class="divider thin"></div>
					<p>
						<?php get_template_part( 'template-parts/meta/cats', '' ); ?>
						<span class="date">
							Posted on: <?php get_template_part( 'template-parts/meta/date', '' ); ?> 
							<?php get_template_part( 'template-parts/meta/authors', '' ); ?>
						</span>
					</p>

				<?php endif;
			endif;
			?>

			
		</div>
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