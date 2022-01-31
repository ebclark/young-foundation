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
$text = get_sub_field('text'); 

$cta = get_sub_field('add_contact_email');

if ( $cta ) :
	$cta_url = $cta['url'];
	$cta_label = $cta['title'];
	$cta_target = $cta['target'] ? $cta_target['target'] : '_self'; 
endif;

?>

<section class="fw add-contact center">
	<div class="container">
		<?php if ( $title ) : echo '<h3>' . $title . '</h3>'; endif; ?>
		<h4><?php if ( $text ) : echo $text; endif; ?></h4>
		<?php if ( $cta ) : ?>
			<a href="<?php echo esc_url( $cta_url ); ?>" target="<?php echo esc_attr( $cta_target ); ?>" class="button dark">
				<?php echo esc_html( $cta_label ); ?>
			</a>
		<?php endif; ?>
	</div>
</section>