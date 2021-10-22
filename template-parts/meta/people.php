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

$title = get_field('title');
$team = get_field('team');

?>
<h2><?php echo $title; ?><?php if ( $team ) : echo ', ' . $team; endif; ?></h2>