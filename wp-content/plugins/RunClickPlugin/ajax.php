<?php
include('../../../wp-config.php');
global $wpdb;
$g_event_id = $_POST['g_hangout_id'];
$name = $_POST['event_reg_name'];
$person_name = $_POST['event_reg_name'];
$email = $_POST['event_reg_email'];
$reg_reminder = $_POST['event_reg_reminder'];
$reminder_time = $_POST['reminder_time'];
if(isset($_POST['event_reg_email_add'])){
$add_email = $_POST['event_reg_email_add'];
}else{
$add_email="";
}
$makenow=$_POST['makenow'];


if($makenow==""){
 $select_date=$_REQUEST['select_date'];
 $select_time=$_REQUEST['select_time'];
}


if($makenow==1){
$select_date="Today";
 $select_date_database=date('Y-m-d');
}else{
$select_date_database=$newDate = date("Y-m-d", strtotime($select_date));;
}
if($makenow==1){
$select_time='now';
$select_time_database=date('h:mA');
}else{
$select_time_database=date('h:mA', strtotime($select_time));
}
$timeapidata = timeapi_servicecall('timeservice', array('placeid'=>$_POST['locationsearch']));

$timeapizone = $timeapidata->timezone->offset;


		$newtimezone = $select_date_database.''.$select_time_database .' ' .$timeapizone;
		//update_post_meta($g_event_id,"hangout_timezone",$newtimezone);
		$hanogut_timezone = $newtimezone;
		$enddatearr = explode(" ",$hanogut_timezone);
		$endate = explode("/",$enddatearr[0]);
		$enmin = explode(":",$enddatearr[1]);
		
		$symbolz =  substr($enddatearr[3],0,1);

		$hourz = substr($enddatearr[3],1,2);

		$timez = substr($enddatearr[3],4,5);
		if($enddatearr[2]=="am"){ 
			if($enmin[0]==12){
			$hour = 0;
			} else {
			$hour = $enmin[0];
			}
			$min = $enmin[1];
		} else { 
			if($enmin[0]==12){
				$hour = 12;
			} else {
				$hour = $enmin[0]+12;
			}
			$min = $enmin[1];
		}

//echo $enddatearr[2];
//echo $symbolz;
		if($symbolz=='+'){
			if($enddatearr[1]=="am"){
				$cur = mktime((date('H')+12),date('i'),date('s'),date('m'),(date('d')-1),date('Y'));

			} else {
				$cur = mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'));
			}
///echo "<bR>";
//echo $cur = mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'));
//exit;
			$now = mktime($timeapidata->datetime->hour+$hourz,($timeapidata->datetime->minute+$timez),$timeapidata->datetime->second,$timeapidata->datetime->month,$timeapidata->datetime->day,$timeapidata->datetime->year);
			$end =  mktime(($hour+$hourz), ($min+$timez), 0, $endate[0], $endate[1], $endate[2]);
		} else {
			$cur = mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'));
			//$cur = mktime((date('H')+12),date('i'),date('s'),date('m'),(date('d')-1),date('Y'));
			$now = mktime(($timeapidata->datetime->hour-$hourz),($timeapidata->datetime->minute-$timez),$timeapidata->datetime->second,$timeapidata->datetime->month,$timeapidata->datetime->day,$timeapidata->datetime->year);
			 $end =  mktime(($hour-$hourz), ($min-$timez), 0, $endate[0], $endate[1], $endate[2]);
		}
		$dife = $end - $now;
		$cur_end = $cur + $dife;
		
		

 $time_for_reminder=$cur_end;



$siteurl = get_permalink($g_event_id);
$hour_24='0';
$hour_1='0';
$min_5='0';
if($reg_reminder==1){
	if(in_array('24',$reminder_time)){ $hour_24='1'; }
	if(in_array('1',$reminder_time)){ $hour_1='1'; }
	if(in_array('5',$reminder_time)){ $min_5='1'; }
}
$table = $wpdb->prefix."google_hangout_subscriber";
$user_count = $wpdb->get_var( "SELECT COUNT(*) FROM ".$table ." where email='".$email."' and g_event_id ='".$g_event_id."'");

if($user_count<1){

$sql = "INSERT INTO $table(`g_event_id`, `name`, `email`, `auto_reminder`, `24_hour`, `1_hour`, `5_min`, `add_email`, `joining_date`,`organization`,`hangout_date`,`hangout_time`,`reminder_time`) VALUES ('$g_event_id', '$name', '$email', '$reg_reminder', '$hour_24', '$hour_1', '$min_5', '$add_email', CURRENT_TIMESTAMP,'','$select_date_database','$select_time_database','$time_for_reminder')";
$wpdb->query($sql);
$lastid = $wpdb->insert_id;
$post_data = get_post($g_event_id); 
$hanogut_timezone = 	get_post_meta($g_event_id,'hangout_timezone',true);
$time_zone	=	get_post_meta($g_event_id,'hangout_time_zone',true);
$tym_zon	=	get_post_meta($g_event_id,"hangout_time_zone",true);
$daytime = get_post_meta($g_event_id,'hangout_day_light',true);


$attribution_link = get_option('attribution_link');
if($attribution_link=='1'){
$link = get_option('hangout_youtube_affiliate_link');
if(get_option('hangout_youtube_affiliate_link')==''){
$link = 'http://runclick.com';
}
} else {
$link ='';
}
$hanogut_timezone = 	get_post_meta($g_event_id,'hangout_timezone',true);
if(get_post_meta($g_event_id,"hangout_type",true) == 'Record_hangout'){
$hanogut_timezone=$newtimezone;

}
$h_event_time	=	explode('+',$hanogut_timezone);

if(count($h_event_time) > 1)
{
	$hanogut_event_timezone	=	$h_event_time[0];
}
else
{
	$h_event_time	=	explode('-',$hanogut_timezone);
	$hanogut_event_timezone	=	$h_event_time[0];
}
$hangout_event_date	=	date('Ymd',strtotime($hanogut_event_timezone));
$hangout_event_time	=	date('Hi',strtotime($hanogut_event_timezone));


$hourarr = explode(" ",$hanogut_event_timezone);
$tz = get_city_id($tym_zon);
$hour = $hourarr[1].' ' .$hourarr[2]. ' ';

//$hour = get_remaining_hours($hanogut_timezone,$daytime);
$sitename = get_bloginfo('name');
$eventlinkURL = '<a href="'.get_permalink( $g_event_id ).'">'.$post_data->post_title.'</a>';
if($makenow==1){
$url	=	get_permalink($g_event_id);
	$url_parts	=	explode("?",$url);
	if(count($url_parts) > 1)
	{
$eventlinkURL = '<a href="'.get_permalink( $g_event_id ).'&replay_preview=true">'.$post_data->post_title.'</a>';
}else{
$eventlinkURL = '<a href="'.get_permalink( $g_event_id ).'?replay_preview=true">'.$post_data->post_title.'</a>';
}
}
if($makenow==1 ){
$chktimezone="";
}else{
$chktimezone="Check Time Zone Here";
}
if(get_post_meta($g_event_id,"hangout_type",true) == 'Record_hangout' && $makenow!=1 )
{
$url	=	get_permalink($g_event_id);
	$url_parts	=	explode("?",$url);
	if(count($url_parts) > 1)
	{
$eventlinkURL = '<a href="'.get_permalink( $g_event_id ).'&replay_preview=true">'.$post_data->post_title.'</a>';
}else{
$eventlinkURL = '<a href="'.get_permalink( $g_event_id ).'?replay_preview=true">'.$post_data->post_title.'</a>';
}
$hangout_event_date=$_REQUEST['select_date'];
$hangout_event_time=$_REQUEST['select_time'];
$hour=$_REQUEST['select_time'].' '.$_REQUEST['select_date'];


}
$eventName=$post_data->post_title;
$creatorEmail =get_bloginfo('admin_email');

$subject = get_option('g_hangout_subscriber_subject'); 
$subject = str_replace("{name}",$person_name,$subject);
$subject = str_replace("{time}",$hour.$time_zone,$subject);
$subject = str_replace("{sitename}",$sitename,$subject);
$subject = str_replace("{eventlinkURL}",$eventlinkURL,$subject);
$subject = str_replace("{eventName}",$eventName,$subject);
$subject = str_replace("{creatorEmail}",$creatorEmail,$subject);

$message = get_option('g_hangout_subscriber_msg');
if($makenow==1){
$message='For {name}, 

			Thanks for registering for our Webinar {eventName}

			Please click here to watch this event online now.
			{eventlinkURL}

			

			See You Soon!';


}
$message = str_replace("{name}",$person_name,$message);
$message = str_replace("{time}",$hour.$time_zone,$message);
$message = str_replace("{sitename}",$sitename,$message);
$message = str_replace("{eventlinkURL}",$eventlinkURL,$message);
$message = str_replace("{eventName}",$eventName,$message);
$message = str_replace("{creatorEmail}",$creatorEmail,$message);


  $logo_url        =        get_post_meta($g_event_id,'ghanghout_logo',true);
 if($logo_url==""){
	 $logo_url=  plugins_url()."/RunClickPlugin/img/logo.png";
 }
					// Code to get the correct timezone when we click on link
					
	$msg	=	'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Welcome to Google Hangout</title>
			<!-- Fonts +++++++++++++ -->	
			<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet" type="text/css">
			<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet" type="text/css"> 
			<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
			<style type="text/css">
				body, html {  }
				a:active, a:focus { text-decoration:none; outline:none; }
				a { color:#fb9337; text-decoration:none; }
				a:hover { color:#365C75; }
			</style>
		</head>
		<body style="margin:0px; padding:0px; font: 14px/18px "Source Sans Pro"; background:#F3F2E9; color:#666;">
			<!-- Start Wrapper -->
			<div id="e_wrapper" style="display:block; margin:0px auto; padding:0; width:600px;">		
				<!-- Start Top Head -->
				<div id="e_top_head" style="display:block; margin:0; padding:10px 0px;">

					<div class="clear" style="margin:0; padding:0; height:0; clear:both;"></div>
				</div>
				<!-- End top Head -->
				<div class="clear" style="margin:0; padding:0; height:0; clear:both;"></div>
				<!-- Start Header -->
				<div id="e_header" style="display:block; margin:0; padding:10px;  border:solid 1px #ddd;  background:#fff; position:relative; z-index:2;">
					<div class="e_logo" style="display:block; float:left; width:160px;"><a href="'.$siteurl.'"><img src="'.$logo_url.'" alt="runclick" /></a></div>
					
					<div class="clear" style="margin:0; padding:0; height:0; clear:both;"></div>
				</div>
				<!-- End header -->

				<div class="clear" style="margin:0; padding:0; height:0; clear:both;"></div>
				<!-- Start Content -->
				<div id="e_content" style="display:block; margin:0px; padding:0;">'.nl2br($message).'<br />'
				.get_post_meta($g_event_id,"hangout_timezone",true).' '.get_post_meta($g_event_id,"hangout_time_zone",true).'<a target="_blank" href="http://www.timeanddate.com/worldclock/fixedtime.html?msg='.str_replace(" ","+",get_the_title($g_event_id)).'&amp;iso='.$hangout_event_date."T".$hangout_event_time.'&amp;p1='.$tz.'"> '.$chktimezone.'</a>
				<br />
					Email address: "'.$person_name.'" '.$email.'<br />
					Timestamp: '.date("F j, Y, g:i a").'<br />
					IP address: '.$_SERVER['REMOTE_ADDR'].'
				</div>
				<!-- End Content -->
				<div class="clear" style="margin:0; padding:0; height:0; clear:both;"></div>

				<!-- Start Footer -->
				<div id="footer" style="display:block; margin-top:20px; padding:10px;  border:solid 1px #ddd;  background:#fff; position:relative; z-index:2; text-align:center;">
					<span style="display:block; color:#fb9337; margin:0; padding:10px;">Powered By <a href='.$link.' target="blank">Runclick.com </a></span>
				</div>
				<!-- End Footer -->

			</div>
			<!-- End Wrapper -->
		</body>
		</html>';


add_filter( 'wp_mail_content_type', 'set_html_content_type' );
 $headers = 'From: '.$sitename.' <'.$creatorEmail.'>' . "\r\n\\";

wp_mail( $email, $subject, $msg, $headers );

remove_filter( 'wp_mail_content_type', 'set_html_content_type' ); 
	echo $select_date.'#'.$select_time;;
} else {
	echo 'You are already subscribed';
}




?>