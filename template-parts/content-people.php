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

$phone = get_field('phone_number');
$email = get_field('email_address'); 
$colour = get_field('colour'); 

?>

<article class="has-aside">
	<div class="container">
		<div class="content">
			<?php get_template_part( 'template-parts/meta/people', '' ); ?>
			<?php the_content() ?>

			<?php if( $phone || $email ) : ?>
				<div class="contact">
					<h3>Contact information</h3>
					<?php if( $phone ): echo $phone . '<br />'; endif; ?>
					<?php if( $email ): ?><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a><?php endif; ?>
				</div>
			<?php endif; ?>
			<div class="pub-list">
				<?php 
				$person = $post->ID;
				$i = 0;
				$loop = new WP_Query( array( 'post_type' => array('post', 'publications'), 'posts_per_page' => -1 ) ); ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<?php 
					$authors = get_field( 'select_authors' );
					$post_type = get_post_type_object( get_post_type($post) );
					$post_label = get_post_type();

					if (is_array($authors) || is_object($authors)) :
						foreach ($authors as $author) {
							setup_postdata($post);
							$author_name = $author->ID;
							if ( $author_name == $person ) :
								if ($i == 0) : echo '<div class="divider thin"></div><h2 class="h3">Contributions</h2>'; endif; ?>
								<div class="item">
									<h3 class="h4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<p>
										<?php if ( get_post_type() == 'post' ) : ?>
											<span class="tag">Blog</span>
										<?php else : ?>
											<span class="tag"><?php echo $post_type->labels->singular_name; ?></span>
										<?php endif; ?>
										<span class="date">Posted on: <?php echo get_the_date(); ?></span>
									</p>
								</div>
							<?php $i++; endif; 
						} 
					endif; wp_reset_postdata();

					?>
				<?php endwhile; ?>
			</div>

		</div>
		<aside>
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="image-container">
					<div class="image square">
						<div style="background-image:url(<?php the_post_thumbnail_url('large'); ?>);"></div>
						<div class="person"></div>
					</div>
					<div class="icon-bubble-rounded <?php echo $colour; ?>"></div>
				</div>
			<?php endif; ?>
		</aside>
	</div>
</article>
