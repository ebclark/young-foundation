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

$jobtitle = get_field('title');
$org = get_field('organisation');

?>
<?php if ( $jobtitle || $org ) : ?>
	<h2><?php if ( $jobtitle ) : echo $jobtitle; endif; if ( $jobtitle && $org ) : echo ', '; endif ?> <?php if ( $org ) : echo $org; endif; ?></h2>
<?php endif; ?>