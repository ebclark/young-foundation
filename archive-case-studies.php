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
			<li><a href="http://www.ebclark.co.uk/dev/yf/our-work">Our work</a></li>
			<li>Case studies</li>
		</ul>
	</div>
	<div class="page-header plain">
		<div class="container">
			<h1>Case studies</h1>
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
							<?php   // Get terms for post
							$categories = get_the_category( $post->ID );
							foreach( $categories as $category ) { ?>
								<span class="tag"><?php echo $category->name; ?></span>
							<?php } ?>
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
get_footer();
