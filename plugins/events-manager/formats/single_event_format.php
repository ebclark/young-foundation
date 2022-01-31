<?php

$heading = get_field('heading_type');
$eventURL = get_field('event_url');
$label = get_field('button_text');
$hide = get_field('hide_featured_image');

?>

<article class="post">
	<div class="container">
		<div class="content">
			{has_image}
				<?php if ( ! $hide ) : ?><div class="image-container"><div class="image"><div style="background-image:url(<?php the_post_thumbnail_url('large'); ?>);"></div></div></div><?php endif; ?>
			{/has_image}

			<h3>#_EVENTDATES<br />#_EVENTTIMES</h3>

			#_EVENTNOTES

			<?php
			$post = get_queried_object();

			if ( function_exists( 'pmpro_has_membership_access' ) ) :

				// Check if the user has access to the post.
				$hasaccess = pmpro_has_membership_access( $post->ID );
				
				// Display Advanced Custom Fields if the user has access to the post.
				if( ! empty( $hasaccess ) && function_exists( 'get_field' ) ) : ?>

					<?php if ( $eventURL ) : ?>
						<a href="<?php echo $eventURL; ?>" class="button" target="_blank"><?php echo $label; ?></a>
					<?php endif; ?>

					{no_event_location_url}
						{has_location}
							<?php 
								global $EM_Event;
								$locID = $EM_Event->location->ID;
								$map = get_field('embed_code', $locID );
							?>
							<h3>Location</h3>
							<p><strong>#_LOCATIONNAME</strong>, #_LOCATIONFULLLINE</p>
							<div class="maintain-ratio map">
								<div class="inside"><?php if ( $map ) : echo $map; endif; ?></div>
							</div>
							
						{/has_location}
					{/no_event_location_url}

				<?php endif;
			endif;
			?>
		</div>
	</div>
</article>



