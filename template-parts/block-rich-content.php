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

$content = get_sub_field('content'); 

$cta = get_sub_field('call_to_action');

if ( $cta ) :
	$cta_url = $cta['url'];
	$cta_label = $cta['title'];
	$cta_target = $cta['target'] ? $cta_target['target'] : '_self'; 
endif;

$display = get_sub_field('display_settings');
$centre_content = $display['centre_content'];

?>

<section class="fw content <?php if ( $centre_content ) : echo 'centre-content'; endif; ?>">
	<div class="container">
		<?php echo $content; ?>
		<?php if ( $cta ) : ?>
			<a href="<?php echo esc_url( $cta_url ); ?>" target="<?php echo esc_attr( $cta_target ); ?>" class="button">
				<?php echo esc_html( $cta_label ); ?>
			</a>
		<?php endif; ?>
	</div>
</section>
