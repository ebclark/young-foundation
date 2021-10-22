<?php

$heading = get_field('heading_type');
$eventURL = get_field('event_url');
$label = get_field('button_text');

?>

<section class="une">
	<div class="container">
		<div class="copy">

			<?php if ( $heading != 'featured-image' ) : ?>
				<h2>#_EVENTDATES @ #_EVENTTIMES</h2>

				<div class="tag-container">
					<?php 
						$types = get_field('set_event_type'); 
						if( $types ):
							foreach( $types as $type ): ?>
								<a href="/calendar/?_sfm_set_event_type=<?php echo $type; ?>" class="tag"><?php echo $type; ?></a>
							<?php endforeach;
						endif;
					?> 
					
					<?php get_template_part( 'template-parts/meta/cats', '' ); ?>
				</div>
			<?php endif; ?>

			#_EVENTNOTES

			<?php if ( $eventURL ) : ?>
				<a href="<?php echo $eventURL; ?>" class="button" target="_blank"><?php echo $label; ?></a>
			<?php endif; ?>

		</div>
		<aside>
			<?php if ( $heading != 'featured-image' ) : ?>
				{has_image}
					<div class="image-container"><div class="image"><div style="background-image:url(<?php the_post_thumbnail_url('large'); ?>);"></div></div></div>
				{/has_image}
			<?php endif; ?>

			{no_event_location_url}
				{has_location}
					<?php 
						global $EM_Event;
						$locID = $EM_Event->location->ID;
						$map = get_field('embed_code', $locID );
					?>
					<h3>Location</h3>
					<div class="maintain-ratio">
						<div class="inside"><?php if ( $map ) : echo $map; endif; ?></div>
					</div>
					<h4>#_LOCATIONNAME</h4>
					#_LOCATIONFULLBR
				{/has_location}
			{/no_event_location_url}
		</aside>
	</div>
</section>



