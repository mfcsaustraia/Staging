<?php
include('../../../wp-config.php');
global $wpdb;

$hangout = $_POST['eid'];
$selval  = $_POST['selval'];
echo $ip      = $_SERVER['REMOTE_ADDR'];


$vote_count = $wpdb->get_var("SELECT COUNT(*) FROM hangout_vote WHERE ipaddress='".$ip."' and hangout_id='".$hangout."'");

if($vote_count == 0)
{
	$sql     = 'INSERT INTO hangout_vote (`hangout_id`, `answer`, `ipaddress`) VALUES("'.$hangout.'", "'.$selval.'", "'.$ip.'")';
	$wpdb->query($sql);
	$lastid = $wpdb->insert_id;
	if($lastid)
	{
		echo "<strong>Your Vote is Successfully Saved</strong>";
	}
	else
	{
		echo "<strong>Internal Server Error</strong>";
	}
}
else
{
	echo "<strong>You Have Already Voted</strong>";
}
