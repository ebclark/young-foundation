<?php

$display = get_sub_field('display_settings');
$tags = $display['tag_content'];

?>

<h4>#_EVENTDATES @ #_EVENTTIMES</h4>

<?php if ( $tags ) : ?>
	<?php if ( ( $tags == 'type' || $tags == 'both' || $tags == 'categories' ) ) : ?>
		<div class="tag-container">
			<?php $types = get_field('set_event_type'); 
			if( $types ): foreach( $types as $type ): ?><a href="/calendar/?_sfm_set_event_type=<?php echo $type; ?>" class="tag"><?php echo $type; ?></a><?php endforeach; endif;
		?> 
			<?php get_template_part( 'template-parts/meta/cats', '' ); ?>
		</div>
	<?php endif; ?>
<?php else : ?>
	<div class="tag-container">
		<?php $types = get_field('set_event_type'); 
		if( $types ): foreach( $types as $type ): ?><a href="/calendar/?_sfm_set_event_type=<?php echo $type; ?>" class="tag"><?php echo $type; ?></a><?php endforeach; endif;
	?> 
		<?php get_template_part( 'template-parts/meta/cats', '' ); ?>
	</div>
<?php endif; ?>
#_EVENTEXCERPT