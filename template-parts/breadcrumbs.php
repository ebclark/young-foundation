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

<div class="breadcrumbs">
	<div class="container">
		<ul>
			<li><a href="/">Home</a></li>

			<?php if ( get_post_type() == 'case-studies' ) : ?>
				<li><a href="/our-work">Our work</a></li>
				<li><a href="/our-work/case-studies">Case studies</a></li>
			<?php elseif ( get_post_type() == 'post' ) : ?>
				<li><a href="/insight">Insight</a></li>
				<li><a href="/insight/blog">Blog</a></li>
			<?php elseif ( get_post_type() == 'publications' ) : ?>
				<li><a href="/insight">Insight</a></li>
				<li><a href="/insight/publications">Publications</a></li>
			<?php elseif ( get_post_type() == 'people' ) : ?>
				<li><a href="/about-us">About us</a></li>
				<li><a href="/insight/who-we-are">Who we are</a></li>
				<li><a href="/people">People</a></li>
			<?php elseif ( get_post_type() == 'event' ) : ?>
				<li><a href="/events-training">Events &amp; Training</a></li>
				<li><a href="/calendar">Calendar</a></li>
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
</div>