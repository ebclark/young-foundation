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
		</div>
		<aside>
			<?php
			$file = get_field('attach_publication');
			$cover = get_field('cover_image');
			if( $file ): ?>
				<h3 class="h4">Download resource</h3>
			    <a href="<?php echo $file['url']; ?>">
			    	<div class="image-container">
						<div class="image portrait"><div style="background-image:url(<?php echo $cover['sizes']['large'] ?>)" <?php if ( $alt ) : ?>role="img" aria-label="<?php echo $cover['alt']; ?>"<?php endif; ?>></div></div>
						<div class="image-caption"><?php echo $file['filename']; ?></div>
					</div>
			    </a>
			<?php endif; ?>
		</aside>
	</div>
</article>
<?php get_template_part( 'template-parts/related-content', '' ); ?>
