<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package young-foundation
 */

?>

<?php // get field values

$title = get_sub_field('title');

$display = get_sub_field('display_settings');
$border = $display['border'];
$tint = $display['tint'];

$count = count( get_sub_field('logos') );

?>

<section class="fw <?php if ( $tint ) : echo 'tint'; endif; ?>">
	<div class="container">
		<?php if ( $border ) : ?><div class="divider"></div><?php endif; ?>
		<?php if ( $title ) : echo '<h2 class="h3">' . $title . '</h2>'; endif; ?>
		<?php if( have_rows('logos') ): ?>

			<div class="grid count<?php echo $count; ?> logos">
			    <?php while( have_rows('logos') ) : the_row();

			        $sub_title = get_sub_field('sub_title');
			        $logo = get_sub_field('logo');
			        $cta = get_sub_field('url');

					if ( $cta ) :
						$cta_url = $cta['url'];
						$cta_label = $cta['title'];
					endif; ?>

			        <a href="<?php echo $cta_url; ?>" class="item" target="_blank">

			        	<h3><?php echo $sub_title; ?></h3>
			        	<img src="<?php echo $logo['sizes']['large'] ?>" />

			        </a>

			    <?php endwhile; ?>
			</div>

		<?php endif; ?>
	</div>
</section>