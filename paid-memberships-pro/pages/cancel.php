<?php
/**
 * Template: Cancel
 *
 * See documentation for how to override the PMPro templates.
 * @link https://www.paidmembershipspro.com/documentation/templates/
 *
 * @version 2.0
 *
 * @author Paid Memberships Pro
 */
global $pmpro_msg, $pmpro_msgt, $pmpro_confirm, $current_user, $wpdb;

if(isset($_REQUEST['levelstocancel']) && $_REQUEST['levelstocancel'] !== 'all') {
	//convert spaces back to +
	$_REQUEST['levelstocancel'] = str_replace(array(' ', '%20'), '+', $_REQUEST['levelstocancel']);

	//get the ids
	$old_level_ids = array_map('intval', explode("+", preg_replace("/[^0-9al\+]/", "", $_REQUEST['levelstocancel'])));

} elseif(isset($_REQUEST['levelstocancel']) && $_REQUEST['levelstocancel'] == 'all') {
	$old_level_ids = 'all';
} else {
	$old_level_ids = false;
}
?>
<div id="pmpro_cancel" class="<?php echo pmpro_get_element_class( 'pmpro_cancel_wrap', 'pmpro_cancel' ); ?>">
	<?php
		if($pmpro_msg)
		{
			?>
			<div class="<?php echo pmpro_get_element_class( 'pmpro_message ' . $pmpro_msgt, $pmpro_msgt ); ?>"><?php echo $pmpro_msg?></div>
			<?php
		}
	?>
	<?php
		if(!$pmpro_confirm)
		{
			if($old_level_ids)
			{
				if(!is_array($old_level_ids) && $old_level_ids == "all")
				{
					?>
					<p><?php _e('Are you sure you want to cancel your membership?', 'paid-memberships-pro' ); ?></p>
					<?php
				}
				else
				{
					$level_names = $wpdb->get_col("SELECT name FROM $wpdb->pmpro_membership_levels WHERE id IN('" . implode("','", $old_level_ids) . "')");
					?>
					<p><?php printf(_n('Are you sure you want to cancel your %s membership?', 'Are you sure you want to cancel your %s memberships?', count($level_names), 'paid-memberships-pro'), pmpro_implodeToEnglish($level_names)); ?></p>
					<?php
				}
			?>
			<section class="<?php echo pmpro_get_element_class( 'pmpro_actionlinks' ); ?>">
				<a class="button red" href="<?php echo pmpro_url("cancel", "?levelstocancel=" . esc_attr($_REQUEST['levelstocancel']) . "&confirm=true")?>"><?php _e('Yes, cancel this membership', 'paid-memberships-pro' );?></a>
				<a class="button green" href="<?php echo pmpro_url("account")?>"><?php _e('No, keep this membership', 'paid-memberships-pro' );?></a>
			</section>
			<?php
			}
			else
			{
				if($current_user->membership_level->ID)
				{
					?><section>
							<?php
								$current_user->membership_levels = pmpro_getMembershipLevelsForUser($current_user->ID);
								foreach($current_user->membership_levels as $level) {
								?>
								<p>Membership level: <?php echo $level->name?></p>
								<a href="<?php echo pmpro_url("cancel", "?levelstocancel=" . $level->id)?>" class="button red"><?php _e("Cancel", 'paid-memberships-pro' );?></a>
								<?php
								}
							?>
					</section>
					<?php
				}
			}
		}
		else
		{
			?>
			<p class="<?php echo pmpro_get_element_class( 'pmpro_cancel_return_home' ); ?>"><a href="<?php echo get_home_url()?>"><?php _e('Click here to go to the home page.', 'paid-memberships-pro' );?></a></p>
			<?php
		}
	?>
</div> <!-- end pmpro_cancel, pmpro_cancel_wrap -->
