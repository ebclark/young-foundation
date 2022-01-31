<?php

$display = get_sub_field('display_settings');
$tags = $display['tag_content'];

?>

<?php if ( ( $tags == 'categories' ) ) : ?>
	<?php get_template_part( 'template-parts/meta/cats', '' ); ?>
<?php elseif ( ( $tags == 'type' ) ) : ?>
	<?php get_template_part( 'template-parts/meta/event-type', '' ); ?>
<?php elseif ( ( $tags == 'both' ) ) : ?>
	<?php get_template_part( 'template-parts/meta/event-type', '' ); get_template_part( 'template-parts/meta/cats', '' ); ?>
<?php endif; ?>

<h4>#_EVENTDATES<br />#_EVENTTIMES</h4>
#_EVENTEXCERPT