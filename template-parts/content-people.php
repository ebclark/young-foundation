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

			<h2>Publications</h2>
			<?php 
			$person = $post->ID;
			$loop = new WP_Query( array( 'post_type' => 'publications', 'posts_per_page' => -1 ) ); ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<?php 
				$authors = get_field('select_authors' );

				foreach ($authors as $author) {
					$author_name = $author->ID;
					if ( $author_name == $person ) : ?>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p>
							<?php
							if( $authors ): ?>
							    <?php foreach( $authors as $post ): 

							        // Setup this post for WP functions (variable must be named $post).
							        setup_postdata($post); ?>
							        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

							    <?php endforeach; ?>
							    <?php 
							    // Reset the global post object so that the rest of the page works correctly.
							    wp_reset_postdata(); ?>
							<?php endif; ?>
							<br /><span class="date"><?php echo get_the_date(); ?></span>
						</p>
					<?php endif;
				}

				?>
			<?php endwhile; ?>

		</div>
		<aside>
			<?php if ( has_post_thumbnail() ) : ?><div class="image-container"><div class="image"><div style="background-image:url(<?php the_post_thumbnail_url('large'); ?>);"></div></div></div><?php endif; ?>
			<h3>Contact information</h3>
			<?php
			$phone = get_field('phone_number');
			$email = get_field('email_address'); 
			?>

			<?php if( $phone ): echo $phone; endif; ?><br />
			<?php if( $email ): ?><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a><?php endif; ?>
		</aside>
	</div>
</article>
