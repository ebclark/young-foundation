<h3>#_EVENTDATES @ #_EVENTTIMES</h3>
<?php $types = get_field('set_event_type'); 
	if( $types ): foreach( $types as $type ): ?><a href="http://www.ebclark.co.uk/dev/yf/events-training/?_sfm_set_event_type=<?php echo $type; ?>" class="tag dk"><?php echo $type; ?></a><?php endforeach; endif;
?> 
#_CATEGORIES
#_EVENTEXCERPT