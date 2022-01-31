<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package young-foundation
 */

get_header();
?>
<main id="primary">
	<?php get_template_part( 'template-parts/heading', '' ); ?>

	<div class="filter-container">
		<div class="container">

			<aside>
				<button class="show-page-filter" aria-controls="in-page-menu" aria-expanded="false">Show filter</button>
				<?php if ( is_active_sidebar( 'blog' ) ) : ?>
				    <?php dynamic_sidebar( 'blog' ); ?>
				<?php endif; ?>
			</aside>

			<div class="results" id="filter-results">

				<div class="list no-border">

					<?php 
					global $paged;
					$curpage = $paged ? $paged : 1;
					$args = array(
					    'post_type' => 'post',
					    'orderby' => 'post_date',
					    'posts_per_page' => 12,
					    'paged' => $paged,
					    'orderby' => 'title',
    					'order'   => 'ASC',
    					'meta_query'	=> array(
							'relation'		=> 'OR',
							array(
								'key'		=> 'blog_type',
								'value'		=> 'video',
								'compare'	=> 'LIKE'
							),
							array(
								'key'		=> 'blog_type',
								'value'		=> 'podcast',
								'compare'	=> 'LIKE'
							)
						)
					);
					$query = new WP_Query($args);
					if($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
					
						//$type = get_field('blog_type');
						$video = get_field('video');
						?>
						<section class="item">
							<div class="copy">
								<h2 class="h3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<p>
									<span class="date"> <?php echo get_the_date(); ?></span>
								</p>
								<?php the_excerpt(); ?>
							</div>
							<?php if ( $video ) : ?>
								<div class="video-container">
									<div class="maintain-ratio">
										<div class="inside"><?php echo $video; ?></div>
									</div>
								</div>
							<?php elseif ( has_post_thumbnail() ) : ?>
								<div class="image-container">
									<div class="image">
										<div style="background-image:url(<?php the_post_thumbnail_url('large'); ?>);"></div>
									</div>
								</div>
							<?php endif; ?>
						</section>
						<?php
					endwhile;
					    echo '
					    <nav class="navigation pagination" role="navigation" aria-label="Posts">
							<h2 class="screen-reader-text">Posts navigation</h2>
							<div class="nav-links">
					        <a class="previous page-numbers" href="'.get_pagenum_link(($curpage-1 > 0 ? $curpage-1 : 1)).'">Previous</a>';
					        for($i=1;$i<=$query->max_num_pages;$i++)
					            echo '<a class="'.($i == $curpage ? 'current ' : '').'page-numbers" href="'.get_pagenum_link($i).'">'.$i.'</a>';
					        echo '
							<a class="next page-numbers" href="'.get_pagenum_link(($curpage+1 <= $query->max_num_pages ? $curpage+1 : $query->max_num_pages)).'">Next</a>
							</div>
						</nav>
					    ';
					    wp_reset_postdata();
					else :

					get_template_part( 'template-parts/content', 'none' );

					endif;
				?>

		</div>
	</div>

</main><!-- #main -->

<?php
get_footer();
