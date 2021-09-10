<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package young-foundation
 */

?>

<?php

$current = $post->ID;
$parent = $post->post_parent;
$grandparent_get = get_post($parent);
$grandparent = $grandparent_get->post_parent;

$alt = get_field('alt_title');

?>

<div class="container">
	<ul class="breadcrumbs">
		<li><a href="http://yf.test/">Home</a></li>

		<?php if ( get_post_type() == 'case-studies' ) : ?>
			<li><a href="http://www.ebclark.co.uk/dev/yf/our-work">Our work</a></li>
			<li><a href="http://www.ebclark.co.uk/dev/yf/our-work/case-studies">Case studies</a></li>
		<?php elseif ( get_post_type() == 'post' ) : ?>
			<li><a href="http://www.ebclark.co.uk/dev/yf/insight">Insight</a></li>
			<li><a href="http://www.ebclark.co.uk/dev/yf/insight/blog">Blog</a></li>
		<?php elseif ( get_post_type() == 'publications' ) : ?>
			<li><a href="http://www.ebclark.co.uk/dev/yf/insight">Insight</a></li>
			<li><a href="http://www.ebclark.co.uk/dev/yf/insight/publications">Publications</a></li>
		<?php elseif ( get_post_type() == 'people' ) : ?>
			<li><a href="http://www.ebclark.co.uk/dev/yf/about-us">About us</a></li>
			<li><a href="http://www.ebclark.co.uk/dev/yf/insight/who-we-are">Who we are</a></li>
			<li><a href="http://www.ebclark.co.uk/dev/yf/insight/who-we-are/people">People</a></li>
		<?php elseif ( get_post_type() == 'event' ) : ?>
			<li><a href="http://www.ebclark.co.uk/dev/yf/events-training">Events &amp; Training</a></li>
		<?php else : ?>
			<?php if ( $grandparent ) : ?>
				<li><a href="<?php echo get_permalink( $grandparent ); ?>" ><?php echo get_the_title( $grandparent ); ?></a></li>
			<?php endif; ?>
			<?php if ( $parent ) : ?>
				<li><a href="<?php echo get_permalink( $parent ); ?>" ><?php echo get_the_title( $parent ); ?></a></li>
			<?php endif; ?>
		<?php endif; ?>

		<?php if ( $alt ) : ?>
			<li><?php echo $alt; ?></li>
		<?php else : ?>
			<li><?php the_title(); ?></li>
		<?php endif; ?>
	</ul>
</div>
