<?php
/**
 * Template: Levels
 *
 * See documentation for how to override the PMPro templates.
 * @link https://www.paidmembershipspro.com/documentation/templates/
 *
 * @version 2.0
 *
 * @author Paid Memberships Pro
 */
global $wpdb, $pmpro_msg, $pmpro_msgt, $current_user;

$pmpro_levels = pmpro_sort_levels_by_order( pmpro_getAllLevels(false, true) );
$pmpro_levels = apply_filters( 'pmpro_levels_array', $pmpro_levels );

if($pmpro_msg)
{
?>
<div class="<?php echo pmpro_get_element_class( 'pmpro_message ' . $pmpro_msgt, $pmpro_msgt ); ?>"><?php echo $pmpro_msg?></div>
<?php
}
?>

<section class="grid">

	<?php	
	$count = 0;
	$has_any_level = false;
	foreach($pmpro_levels as $level)
	{
		$user_level = pmpro_getSpecificMembershipLevelForUser( $current_user->ID, $level->id );
		$has_level = ! empty( $user_level );
		$has_any_level = $has_level ?: $has_any_level;
	?>
	<div class="item <?php if( $has_level ) { ?> active<?php } ?>">
		<div class="copy">
			<?php //echo $has_level ? "<h3>{$level->name}</h3>" : $level->name?>
			<?php echo $has_level ? "<strong>{$level->description}</strong>" : $level->description?>
			
			<?php if ( ! $has_level ) { ?>                	
				<a class="button" href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>"><?php _e('Select', 'paid-memberships-pro' );?></a>
			<?php } else { ?>      
				<?php
					//if it's a one-time-payment level, offer a link to renew	
					if( pmpro_isLevelExpiringSoon( $user_level ) && $level->allow_signups ) {
						?>
							<a class="button" href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>"><?php _e('Renew', 'paid-memberships-pro' );?></a>
						<?php
					} else {
						?>
							<a class="button" href="<?php echo pmpro_url("account")?>"><?php _e('Your&nbsp;Level', 'paid-memberships-pro' );?></a>
						<?php
					}
				?>
			<?php } ?>
		</div>
	</div>
	<?php
	}
	?>
	<div class="item">
		<div class="copy">
			<h3>Or are you already a member?</h3>
			<a href="/login">You can login to your account here</a>
		</div>
	</div>

</section>