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

<?php 

$current = $post->ID;
$parent = $post->post_parent;
$grandparent_get = get_post($parent);
$grandparent = $grandparent_get->post_parent;

$left_nav = get_field('left_navigation');
$show_left_nav = $left_nav['show_left_nav'];
$show_ancestors = $left_nav['show_ancestors'];
$level = $left_nav['select_levels'];

if ( $show_left_nav ) : 

?>

<div class="has-menu container">
	<nav class="in-page">
		<button class="show-page-nav" aria-controls="in-page-menu" aria-expanded="false">Show page menu</button>
		<ul id="in-page-menu">

			<?php if ( $show_ancestors ) : ?>
			    <?php if ( $grandparent ) : ?>
					<li><span class="icon-arrow-left"></span><a href="<?php echo get_permalink( $grandparent ); ?>" ><?php echo get_the_title( $grandparent ); ?></a></li>
				<?php endif; ?>
				<?php if ( $parent ) : ?>
					<li><span class="icon-arrow-left"></span><a href="<?php echo get_permalink( $parent ); ?>" ><?php echo get_the_title( $parent ); ?></a></li>
				<?php endif; ?>
				<?php if ( $current && $level == 'children' ) : ?>
					<li class="current_page_item"><span class="icon-arrow-down"></span><a href="<?php echo get_permalink( $current ); ?>" ><?php echo get_the_title( $current ); ?></a></li>
				<?php endif; ?>
			<?php endif; ?>

		    <?php

		    if ( $level == 'siblings' ) : 

		    	wp_list_pages( array(
			        'title_li'    => '',
			        'child_of'    => $post->post_parent,
			        'depth'  	=> '1n',
			        'sort_column'  => 'menu_order',
			    ) );

			elseif ( $level == 'children' ) : 

			    wp_list_pages( array(
			        'title_li'    => '',
			        'child_of'    => $current,
			        'depth'  	=> '1n',
			        'sort_column'  => 'menu_order',
			    ) );

			endif; ?>

		</ul>
	</nav>
<?php endif; ?>

<?php get_template_part( 'template-parts/blocks', '' ); ?>

<div class="container">
	<?php the_content() ?>
</div>

<?php if ( $show_left_nav ) : ?>
</div>
<?php endif; ?>



