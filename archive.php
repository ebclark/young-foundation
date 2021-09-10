<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package young-foundation
 */

get_header();
?>

<main id="primary">	
	<div class="container">
		<ul class="breadcrumbs">
			<li><a href="http://www.ebclark.co.uk/dev/yf/">Home</a></li>
			<li>Theme: <?php single_cat_title(); ?></li>
		</ul>
	</div>
	<div class="page-header plain">
		<div class="container">
			<h1><?php single_cat_title(); ?></h1>
		</div>
	</div>

	<?php if ( have_posts() ) : ?>

		<section>
			<div class="container">

				<div class="grid no-border">

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post(); ?>

						<a href="<?php the_permalink(); ?>" class="item">
							<?php if ( has_post_thumbnail() ) : ?><div class="image"><div style="background-image:url(<?php the_post_thumbnail_url('large'); ?>);"></div></div><?php endif; ?>
							<h3><?php the_title(); ?></h3>
							<?php if ( get_post_type() != 'page' ) : 
								$post_type = get_post_type_object( get_post_type($post) );
								$post_label = get_post_type();
								if ( get_post_type() == 'post' ) : ?>
									<span class="tag">Blog</span>
								<?php else : ?>
									<span class="tag"><?php echo $post_type->labels->singular_name; ?></span>
								<?php endif; ?>
							<?php endif; ?>
							<?php the_excerpt(); ?>
						</a>

					<?php endwhile; ?>

				</div>

				<?php the_posts_pagination( array(
					'mid_size'  => 2,
					'prev_text' => __( 'Previous', 'textdomain' ),
					'next_text' => __( 'Next', 'textdomain' ),
				) ); ?>

			</div>
		</section>

	<?php else :

		get_template_part( 'template-parts/content', 'none' );

	endif; ?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
