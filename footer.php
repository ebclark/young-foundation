<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package young-foundation
 */

?>

<?php

global $post;
/* Get an array of Ancestors and Parents if they exist */
$parents = get_post_ancestors( $post->ID );
/* Get the top Level page->ID count base 1, array base 0 so -1 */
$id = ($parents) ? $parents[count($parents)-1]: $post->ID;
/* Get the parent and set the $class with the page slug (post_name) */
$parent = get_post( $id );
$page = $parent->post_name;

if ( $page == 'peer-research-network' || is_post_type_archive( 'resources' ) || ( get_post_type( get_the_ID() ) == 'resources' ) ) : 
	$class = 'peer-research-network';
endif;

?>

	<a href="#" class="top">Top</a>
	<section class="family tint <?php if ( $class ) : echo $class; endif; ?>">
		<div class="container">
			<?php if ( is_active_sidebar( 'family' ) ) : ?>
			    <?php dynamic_sidebar( 'family' ); ?>
			<?php endif; ?>
		</div>
	</section>
	<footer id="colophon" class="red">
		<div class="icon-bubble-main"></div>
		<div class="icon-bubble-hori"></div>
		<div class="container">
			<?php if ( is_active_sidebar( 'footer' ) ) : ?>
			    <?php dynamic_sidebar( 'footer' ); ?>
			<?php endif; ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	<div class="legals">
		<div class="container">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'legals-menu',
					'menu_id'        => 'legals-menu',
				)
			);
			?>
			<p>&copy; The Young Foundation 2021</p></div>
		</div>
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>

<div class="media-size"></div>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

</body>
</html>
