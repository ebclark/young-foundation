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

	<a href="#" class="top">Top</a>
	<section class="family tint">
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
