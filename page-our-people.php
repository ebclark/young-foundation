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

	<div class="filter-container people">
		<div class="container">

			<div class="results" id="filter-results">

				<div class="list no-border people">

					<?php 
					global $paged;
					$curpage = $paged ? $paged : 1;
					$args = array(
					    'post_type' => 'people',
					    'orderby' => 'post_date',
					    'posts_per_page' => 12,
					    'paged' => $paged,
					    'orderby' => 'title',
    					'order'   => 'ASC',
    					'tax_query' => array(
				        array (
				            'taxonomy' => 'roles',
				            'field' => 'slug',
				            'terms' => 'staff',
				        )
				    ),
					);
					$query = new WP_Query($args);
					if($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
					
					$jobtitle = get_field('title');
					$team = get_field('team');
					$colour = get_field('colour');
					?>
					<section class="item <?php echo $colour; ?>">
						<div class="copy">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<?php if ( $jobtitle || $team ) : ?>
								<h4><?php if ( $jobtitle ) : echo $jobtitle; endif; if ( $jobtitle && $team ) : echo ', '; endif ?> <?php if ( $team ) : echo $team; endif; ?></h4>
							<?php endif; ?>
							<?php the_excerpt(); ?>
						</div>
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="image-container">
								<div class="image square">
									<div style="background-image:url(<?php the_post_thumbnail_url('large'); ?>);"></div>
									<div class="person"></div>
								</div>
								<div class="icon-bubble-rounded <?php echo $colour; ?>"></div>
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
