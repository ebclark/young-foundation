<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package young-foundation
 */

?>

<div class="results" id="filter-results">
	<div class="list no-border">
		<section class="item">
			<div class="copy">
				<h2 class="h3">It looks like there isn't any content here yet.</h2>
				<p>It looks like nothing was found at this location. Try searching or clicking one of the links below.</p>
				<?php get_search_form(); ?>
			</div>
		</section>
		<section class="item">
			<div class="copy">
				<h2 class="h3">Recent posts</h2>
				<ul>
				    <?php
				    $recent_posts = wp_get_recent_posts(array(
				        'numberposts' => 5, // Number of recent posts thumbnails to display
				        'post_status' => 'publish' // Show only the published posts
				    ));
				    foreach( $recent_posts as $post_item ) : ?>
				        <li>
				            <a href="<?php echo get_permalink($post_item['ID']) ?>"><?php echo $post_item['post_title'] ?></a>
				        </li>
				    <?php endforeach; ?>
				</ul>
			</div>
		</section>
		<section class="item">
			<div class="copy">
				<h2 class="h3">Most viewed categories</h2>
				<ul>
					<?php
					wp_list_categories(
						array(
							'orderby'    => 'count',
							'order'      => 'DESC',
							'show_count' => 1,
							'title_li'   => '',
							'number'     => 5,
						)
					);
					?>
				</ul>
			</div>
		</section>
	</div>
</div>
