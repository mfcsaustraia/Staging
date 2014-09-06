<?php 
include('../../../wp-config.php');
global $wpdb;

$g_event_id = $_POST['g_hangout_id'];
$first_name=$_REQUEST['first_name'];
$email_address=$_REQUEST['email_address'];
$last_name=$_REQUEST['last_name'];
$organization=$_REQUEST['organization'];
$hangout_make_now=$_POST['makenow'];


if($hangout_make_now==""){
 $select_date=$_REQUEST['select_date'];
 $select_time=$_REQUEST['select_time'];
}

$siteurl = get_permalink($g_event_id);
 $hangout_registration_system = get_post_meta($g_event_id,'hangout_registration_system',true); 

 $list_id=get_post_meta($g_event_id,'hangout_list_id',true);
if($hangout_registration_system!=''){
if($hangout_make_now==1){
$select_date="Today";
 $select_date_database=date('Y-m-d');
}else{
$select_date_database=$newDate = date("Y-m-d", strtotime($select_date));;
}
if($hangout_make_now==1){$select_time='now';
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
//echo $time_for_reminder;
$hour_24='0';
$hour_1='0';
$min_5='0';
$table = $wpdb->prefix."google_hangout_subscriber";
$user_count = $wpdb->get_var( "SELECT COUNT(*) FROM ".$table ." where email='".$email_address."' and g_event_id ='".$g_event_id."'");

if($user_count<1){

$sql = "INSERT INTO $table(`g_event_id`, `name`, `email`, `auto_reminder`, `24_hour`, `1_hour`, `5_min`,`joining_date`,`organization`,`hangout_date`,`hangout_time`,`reminder_time`) VALUES ('$g_event_id', '$first_name $last_name', '$email_address', '', '$hour_24', '$hour_1', '$min_5', CURRENT_TIMESTAMP,'$organization','$select_date_database','$select_time_database','$time_for_reminder')";

$wpdb->query($sql);

$post_data = get_post($g_event_id); 
$hanogut_timezone = 	get_post_meta($g_event_id,'hangout_timezone',true);
$time_zone	=	get_post_meta($g_event_id,'hangout_time_zone',true);
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
if(get_post_meta($g_event_id,'hangout_type',true)!='Record_hangout'){
$chk_timezone=" Check Time Zone Here";

}

$hangout_event_date	=	date('Ymd',strtotime($hanogut_event_timezone));
$hangout_event_time	=	date('Hi',strtotime($hanogut_event_timezone));


$tz = get_city_id($tym_zon);





if(get_post_meta($g_event_id,'hangout_type',true)=='Record_hangout'){
$hour= $select_date_database.' '.$select_time_database ;
}else{
$hourarr = explode(" ",$hanogut_event_timezone);
$tz = get_city_id($tym_zon);
$hour = $hourarr[1].' ' .$hourarr[2]. ' ';
}
if(get_post_meta($g_event_id,'hangout_type',true)=='Record_hangout'){
$select_date_database=base64_encode($select_date_database);

$select_time_database=base64_encode($select_time_database);
$url=get_permalink( $g_event_id );
$url_parts=explode("?",$url);
 if(count($url_parts) > 1)	{
$extra_link="&run_event=$select_date_database".'_'."$select_time_database";
}else{
$extra_link="?run_event=$select_date_database".'_'."$select_time_database";

}
}else{
$extra_link="";
}


$sitename = get_bloginfo('name');
$eventlinkURL = '<a href="'.get_permalink( $g_event_id ).'">'.$post_data->post_title.'</a>';
if($hangout_make_now==1){
$url	=	get_permalink($g_event_id);
	$url_parts	=	explode("?",$url);
	if(count($url_parts) > 1)
	{
$eventlinkURL = '<a href="'.get_permalink( $g_event_id ).'&replay_preview=true">'.$post_data->post_title.'</a>';
}else{
$eventlinkURL = '<a href="'.get_permalink( $g_event_id ).'?replay_preview=true">'.$post_data->post_title.'</a>';
}
}
if(get_post_meta($g_event_id,"hangout_type",true) == 'Record_hangout' && $hangout_make_now!=1 )
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
$chk_timezone="";

}

$eventlinkURL = '<a href="'.get_permalink( $g_event_id ).''.$extra_link.'">'.$post_data->post_title.'</a>';
$eventName=$post_data->post_title;
$creatorEmail =get_bloginfo('admin_email');

$subject = get_option('g_hangout_subscriber_subject'); 
$subject = str_replace("{name}",$first_name.''.$last_name ,$subject);
$subject = str_replace("{time}",$hour.$time_zone,$subject);
$subject = str_replace("{sitename}",$sitename,$subject);
$subject = str_replace("{eventlinkURL}",$eventlinkURL,$subject);
$subject = str_replace("{eventName}",$eventName,$subject);
$subject = str_replace("{creatorEmail}",$creatorEmail,$subject);

$message = get_option('g_hangout_subscriber_msg');
$message = str_replace("{name}",$first_name.''.$last_name,$message);
$message = str_replace("{time}",$hour.$time_zone,$message);
$message = str_replace("{sitename}",$sitename,$message);
$message = str_replace("{eventlinkURL}",$eventlinkURL,$message);
$message = str_replace("{eventName}",$eventName,$message);
$message = str_replace("{creatorEmail}",$creatorEmail,$message);
 $upload_dir = wp_upload_dir(); 
 $logo_url        =        $upload_dir['baseurl'].'/'.get_post_meta($g_event_id,'ghanghout_logo',true);

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
					<div class="e_logo" style="display:block; float:left; width:160px;"><a href="'.$siteurl.'"><img src="'.$logo_url.'" alt="hangout" /></a></div>
					
					<div class="clear" style="margin:0; padding:0; height:0; clear:both;"></div>
				</div>
				<!-- End header -->

				<div class="clear" style="margin:0; padding:0; height:0; clear:both;"></div>
				<!-- Start Content -->

				<div id="e_content" style="display:block; margin:0px; padding:0;">'.nl2br($message).'<br />'
				.get_post_meta($g_event_id,"hangout_timezone",true).' '.get_post_meta($g_event_id,"hangout_time_zone",true).'<a target="_blank" href="http://www.timeanddate.com/worldclock/fixedtime.html?msg='.str_replace(" ","+",get_the_title($g_event_id)).'&amp;iso='.$hangout_event_date."T".$hangout_event_time.'&amp;p1='.$tz.'">'.      $chk_timezone.'</a>
				<br />
					Email address: "'.$first_name.''.$last_name.'" '.$email_address.'<br />
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

wp_mail( $email_address, $subject, $msg, $headers );

remove_filter( 'wp_mail_content_type', 'set_html_content_type' ); 
	echo $select_date.'#'.$select_time;




}else {

	echo 'You are already subscribed';
}
}
if($hangout_registration_system=='ImnicaMail'){
$ch		=	curl_init('http://www.imnicamail.com/v4/api.php');
$list_id=get_post_meta($g_event_id,'hangout_ImnicaMail_list_id',true);		
curl_setopt($ch,CURLOPT_POST,true);
$var='Command=Subscriber.Subscribe&ResponseFormat=JSON&JSONPCallBack=true&ListID='.$list_id.'&EmailAddress='.$email_address.'&IPAddress='.$_SERVER["REMOTE_ADDR"].'';
curl_setopt($ch,CURLOPT_POSTFIELDS,$var);



curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

$output	=	curl_exec($ch);


}
if($hangout_registration_system=='Mailchimp'){
require_once('MCAPI.class.php');  // same directory as store-address.php
 $list_id=get_post_meta($g_event_id,'hangout_Mailchimp_list_id',true);	
 $api_key=get_post_meta($g_event_id,'hangout_Mailchimp_api_key',true);	
    // grab an API Key from http://admin.mailchimp.com/account/api/
    $api = new MCAPI($api_key);

    $merge_vars = Array( 
        'EMAIL' => $email_address,
        'FNAME' => $first_name, 
        'LNAME' => $last_name
        
    );

    // grab your List's Unique Id by going to http://admin.mailchimp.com/lists/
    // Click the "settings" link for the list - the Unique Id is at the bottom of that page. 
   

    $api->listSubscribe($list_id, $email_address, $merge_vars ); 

}
if($hangout_registration_system=='Icontact'){
require_once('iContactApi.php');
$appid=get_post_meta($g_event_id,'hangout_Icontact_app_id',true);
$user_name=get_post_meta($g_event_id,'hangout_Icontact_user_name',true);
$user_pass=get_post_meta($g_event_id,'hangout_Icontact_user_password',true);
$Icontact_list_id=get_post_meta($g_event_id,'hangout_Icontact_list_id',true);
iContactApi::getInstance()->setConfig(array(
        'appId' => $appid,
        'apiPassword' => $user_pass,
        'apiUsername' => $user_name
));
$oiContact = iContactApi::getInstance();
 $add_contact	=	$oiContact->addContact($email_address, null, null, $first_name, $last_name, null, null, null, null, null, null,null, null, null);
 
 $user_id	=	$add_contact->contactId;
        $oiContact->subscribeContactToList($user_id, $Icontact_list_id, 'normal');
		
}
if($hangout_registration_system=='Sendreach'){
require_once('sendreachclasses.php');
$api_vars['key'] =get_post_meta($g_event_id,'hangout_Sendreach_api_key',true);
$api_vars['secret'] = get_post_meta($g_event_id,'hangout_Sendreach_secret_key',true);
$api_vars['userid'] =get_post_meta($g_event_id,'hangout_Sendreach_user_id',true);
$list_id=get_post_meta($g_event_id,'hangout_Sendreach_list_id',true);
$client_ip=$_SERVER["REMOTE_ADDR"];
$sendreach = new api();
$sendreach->subscriber_add($list_id,$first_name,$last_name,$email_address,$client_ip);


}
if($hangout_registration_system=='GetResponce'){
require_once('jsonRPCClient.php');
  $api_key = get_post_meta($g_event_id,'hangout_GetResponce_api_key',true);
  $campaign_name=get_post_meta($g_event_id,'hangout_GetResponce_campaign_name',true);
$api_url = 'http://api2.getresponse.com';
$client = new jsonRPCClient($api_url);
$campaigns = $client->get_campaigns(
        $api_key,
    array (
            # find by name literally
        'name' => array ( 'EQUALS' => $campaign_name )
        )
);

$CAMPAIGN_ID = array_pop(array_keys($campaigns));
$result = $client->add_contact(
        $api_key,
        array (
            # identifier of 'test' campaign
                'campaign' => $CAMPAIGN_ID,
            
                # basic info
                'name' => $first_name.' '.$last_name,
            'email' => $email_address,

                # custom fields
                'customs' => array(
         array(
         'name' => 'Organization'  ,
         'content' => $organization
         )
         )
        )
);


}


if($hangout_registration_system=='Aweber'){
require_once('aweber_api/aweber_api.php');

$consumerKey    = get_post_meta($g_event_id,'hangout_Aweber_consumer_Key',true); 
$consumerSecret = get_post_meta($g_event_id,'hangout_Aweber_consumer_Secret',true); 
$accessKey      = get_post_meta($g_event_id,'hangout_Aweber_api_key',true);
$accessSecret   = get_post_meta($g_event_id,'hangout_Aweber_access_Secret',true);
$account_id     = get_post_meta($g_event_id,'hangout_Aweber_account_id',true);
$list_id        = get_post_meta($g_event_id,'hangout_Aweber_list_id',true); 
$client_ip=$_SERVER["REMOTE_ADDR"];
$aweber = new AWeberAPI($consumerKey, $consumerSecret);


    $account = $aweber->getAccount($accessKey, $accessSecret);
    $listURL = "/accounts/{$account_id}/lists/{$list_id}";
    $list = $account->loadFromUrl($listURL);
	
    # create a subscriber
    $params = array(
        'email' => $email_address,
        'ip_address' => $client_ip,
        'ad_tracking' => 'client_lib_example',
        'misc_notes' => 'my cool app',
        'name' =>  $first_name.' '.$last_name
       
       
    );
    $subscribers = $list->subscribers;
    $new_subscriber = $subscribers->create($params);
	
	 

}
if($hangout_registration_system=='Sendreach'){

$post_data = array(
        'name' => $first_name.' '.$last_name,
        'email' => $email_address
		);
$list_id        = get_post_meta($g_event_id,'hangout_Sendreach_list_id',true);
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://register.sendreach.com/forms/?listid=$list_id");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec ($ch);

curl_close ($ch);

}
if($hangout_registration_system=='InfusionSoft'){
$app_name = get_post_meta($g_event_id,'hangout_InfusionSoft_app',true);
$api_key = get_post_meta($g_event_id,'hangout_InfusionSoft_list_id',true);

require_once("infusionsoft_src/isdk.php");

$app = new iSDK;


$app->cfgCon($app_name, $api_key);
$conDat = array('FirstName' => $first_name,
                'lastName'  => $last_name,
                'Email'     => $email_address);
				

 $conID = $app->addCon($conDat);


}
?>