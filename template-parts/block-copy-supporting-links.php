<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package young-foundation
 */

?>

<aside>
	<?php 
	if( have_rows('links') ): ?>
		<ul class="links">
		<?php while( have_rows('links') ) : the_row();
			$cta = get_sub_field('link');
			if ( $cta ) :
				$cta_url = $cta['url'];
				$cta_label = $cta['title'];
				$cta_target = $cta['target'] ? $cta['target'] : '_self'; 
			?>
				<li>
					<a href="<?php echo esc_url( $cta_url ); ?>" target="<?php echo esc_attr( $cta_target ); ?>" <?php if ( $cta_target == '_blank' ) : echo 'class="ext"'; endif; ?>>
					<?php echo esc_html( $cta_label ); ?>
					</a>
				</li>
	<?php 	endif; 
		endwhile; ?>
		</ul>
	<?php endif; ?>
</aside>
