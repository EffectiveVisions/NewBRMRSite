<?php
add_action( 'streamline-insert-calendar', 'streamline_add_calendar_module',10, 2);

function streamline_add_calendar_module($unit_id){
	$template = ResortPro()->locate_template("availability-calendar.php");
	if ( empty( $template ) ) {
      $template = trailingslashit( ResortPro()->dir ) . 'includes/templates/availability-calendar.php';
    }
	include( $template);
}

add_action('streamline-insert-roomdetails', 'streamline_add_roomdetails_module', 10, 1);

function streamline_add_roomdetails_module($room_details){	
	$template = ResortPro()->locate_template("room-details.php");
	if ( empty( $template ) ) {
    $template = trailingslashit( ResortPro()->dir ) . 'includes/templates/room-details.php';
  }
	include($template);
}

add_action( 'streamline-insert-booknow', 'streamline_add_booknow_module',11, 8);

function streamline_add_booknow_module($location_name, $unit_id, $max_adults, $max_guests, $max_pets, $min_stay, $checkin_days, $nonce){
	$template = ResortPro()->locate_template("booknow-modal.php");
	if ( empty( $template ) ) {
      $template = trailingslashit( ResortPro()->dir ) . 'includes/templates/booknow-modal.php';
    }
	include( $template);
}

add_action( 'streamline-insert-booknow-widget', 'streamline_add_booknow_widget',11, 16);

function streamline_add_booknow_widget($property, $checkout_url, $hash, $nonce, $arrive_label, $depart_label, $adults_label, $children_label, $pets_label, $max_adults, $max_children, $max_pets, $min_stay, $checkin_days, $use_promo, $pbg_enabled){
	$template = ResortPro()->locate_template("booknow.php");
	if ( empty( $template ) ) {
      $template = trailingslashit( ResortPro()->dir ) . 'includes/templates/booknow.php';
    }
	include( $template);
}

add_action( 'streamline-insert-inquiry', 'streamline_add_inquiry_module',10, 14);

function streamline_add_inquiry_module($location_name, $unit_id, $max_adults, $max_guests, $max_pets, $min_stay, $checkin_days, $is_modal, $start_date, $end_date, $occupants, $occupants_small, $pets, $title){
	$template = ResortPro()->locate_template("property-inquiry.php");
	$options = StreamlineCore_Settings::get_options();
	$gdpr_enabled = (isset($options['enable_gdpr']) && $options['enable_gdpr'] == 1) ? true : false;
	if ( empty( $template ) ) {
      $template = trailingslashit( ResortPro()->dir ) . 'includes/templates/property-inquiry.php';
    }
	include( $template);
}

add_action( 'streamline-insert-paybygroup', 'streamline_add_paybygroup_module', 12, 4);
function streamline_add_paybygroup_module($thumbnail, $start_date, $end_date, $unit_id){
	$template = ResortPro()->locate_template("paybygroup.php");
	if ( empty( $template ) ) {
      $template = trailingslashit( ResortPro()->dir ) . 'includes/templates/paybygroup.php';
    }
	include( $template);
}

if(StreamlineCore_Settings::get_options( 'enable_share_with_friends' ) == '1'){
	add_action( 'streamline-insert-share', 'streamline_add_share_module',11, 7);
}

function streamline_add_share_module($location_name, $unit_id, $start_date, $end_date, $occupants, $occupants_small, $pets){
	$template = ResortPro()->locate_template("share-with-friends.php");
	if ( empty( $template ) ) {
      $template = trailingslashit( ResortPro()->dir ) . 'includes/templates/share-with-friends.php';
    }
	include( $template);
}
