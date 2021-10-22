<section class="item">
	<div class="copy">
		<h2>#_EVENTLINK</h2>
		<h3>#_EVENTDATES @ #_EVENTTIMES</h3>
		<?php 
			$types = get_field('set_event_type'); 
			if( $types ):
				foreach( $types as $type ): ?>
					<a href="/calendar/?_sfm_set_event_type=<?php echo $type; ?>" class="tag dk"><?php echo $type; ?></a>
				<?php endforeach;
			endif;
		?> 	
		<?php 
		$terms = get_the_terms( $post->ID , 'event-categories' );
		// Loop over each item since it's an array
		if ( $terms != null ) :
			foreach( $terms as $term ) {
				// Print the name method from $term which is an OBJECT
				print '<a class="tag dk" href="/calendar/?_sft_event-categories=' . $term->slug . '">' . $term->name . '</a>';
				// Get rid of the other data stored in the object, since it's not needed
				unset($term);
			} 
		endif; ?>
		#_EVENTEXCERPT
	</div>
	{has_image}
		<div class="image-container"><div class="image"><div style="background-image:url(#_EVENTIMAGEURL);"></div></div></div>
	{/has_image}
</section>