<section class="une">
	<div class="container">
		<div class="copy">

			<h2>#_EVENTDATES @ #_EVENTTIMES</h2>

			<?php 
				$types = get_field('set_event_type'); 
				if( $types ):
					foreach( $types as $type ): ?>
						<a href="http://www.ebclark.co.uk/dev/yf/events-training/?_sfm_set_event_type=<?php echo $type; ?>" class="tag dk"><?php echo $type; ?></a>
					<?php endforeach;
				endif;
			?> 
			
			#_CATEGORIES
			#_EVENTNOTES

		</div>
		<aside>
			{has_image}
				<div class="image-container"><div class="image"><div style="background-image:url(<?php the_post_thumbnail_url('large'); ?>);"></div></div></div>
			{/has_image}

			{no_event_location_url}
				{has_location}
					<?php 
						global $EM_Event;
						$locID = $EM_Event->location->ID;
						$map = get_field('embed_code', $locID );
					?>
					<h2>Location</h2>
					<div class="maintain-ratio">
						<div class="inside"><?php if ( $map ) : echo $map; endif; ?></div>
					</div>
					<h3>#_LOCATIONNAME</h3>
					#_LOCATIONFULLBR
				{/has_location}
			{/no_event_location_url}

			{no_bookings}
				{has_event_location_url}<p><strong>Meeting link:</strong> <span class="longlink">#_EVENTLOCATION</span></p>{/has_event_location_url}

				<a href="#_EVENTICALURL" class="button" target="_blank">iCal export</a><br />
				<a href="#_EVENTGCALURL" class="button" target="_blank">Google calendar</a>
			{/no_bookings}
		</div>
	</div>
</section>

<section class="content">
	<div class="container">

		{has_bookings}
			<div class="divider"></div>

			<h2>RSVP</h2>
			#_BOOKINGFORM

		{/has_bookings}

		{is_user_attendee}
			{has_event_location_url}<p><strong>Meeting link:</strong> <span class="longlink">#_EVENTLOCATION</span></p>{/has_event_location_url}

			<a href="#_EVENTICALURL" class="button" target="_blank">iCal export</a>
			<a href="#_EVENTGCALURL" class="button" target="_blank">Google calendar</a>
		{/is_user_attendee}
	</div>
</section>



