<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package young-foundation
 */

?>

<?php

/* Collect related content */
$post_id = get_the_ID();
$cat_ids = array();
$categories = get_the_category( $post_id );

if ( $categories && !is_wp_error( $categories ) ) :
    foreach ( $categories as $category ) {
        array_push( $cat_ids, $category->term_id );
    }
endif;


$current_post_type = get_post_type( $post_id );
 
	$args = array(
	    'category__in' => $cat_ids,
	    'post_type' => array('post','publications','case-studies','event'),
	    'posts_per_page' => '9',
	    'post__not_in' => array( $post_id )
	);
 
$query = new WP_Query( $args );

if ( $query->have_posts() ) : 

$count = $query->post_count; ?>

<section class="fw content-list related">
	<div class="container">
		<div class="divider"></div>
	    <h2>Related content</h2>
	    <div class="grid no-border <?php if ( $count > 3 ) : echo 'grid-carousel'; endif; ?>">
	        <?php
	        while ( $query->have_posts() ) {

	            $query->the_post(); ?>

	             <div class="item">
		             <div class="copy">

		                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

						<?php if ( get_post_type() != 'event' ) : 
							get_template_part( 'template-parts/meta/type', '' ); 
							get_template_part( 'template-parts/meta/date', '' ); 
						else :
							get_template_part( 'template-parts/meta/event-type', '' ); 
						endif; ?>

						<?php the_excerpt(); ?> 
		            </div>
	            </div>

	        <?php } ?>
	    </div>
	</div>
</section>

<?php endif; wp_reset_postdata(); ?>
