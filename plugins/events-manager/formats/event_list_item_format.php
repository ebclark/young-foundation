<section class="item">
	<div class="copy">
		<h2>#_EVENTLINK</h2>
		<h3>#_EVENTDATES @ #_EVENTTIMES</h3>
		<?php 
			$types = get_field('set_event_type'); 
			if( $types ):
				foreach( $types as $type ): ?>
					<a href="http://www.ebclark.co.uk/dev/yf/events-training/?_sfm_set_event_type=<?php echo $type; ?>" class="tag dk"><?php echo $type; ?></a>
				<?php endforeach;
			endif;
		?> 	
		#_CATEGORIES
		#_EVENTEXCERPT
	</div>
	{has_image}
		<div class="image-container"><div class="image"><div style="background-image:url(#_EVENTIMAGEURL);"></div></div></div>
	{/has_image}
</section>