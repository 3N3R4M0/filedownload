<?php
error_reporting(E_ERROR | E_PARSE);
$locker_id = "948644"; //use only the id number for the locker here.
$pubid = 335674;
$tracking_id = ''; //you can place your subid/tracking_id here.
$custom_domain = ''; //this is the url used for the offer links and exit splash(if enabled) leave blank to allow cpagrip to choose best domain. (domain must belong to cpagrip since assets and click-through logic is managed by cpagrip servers)
//if you dont know what cloudflare is, then you do not need to edit the line below.
$using_cloudflare = false; //change this to true if you are using cloudflare to host this site.
//--------------------------------
//DO NOT EDIT BELOW THIS LINE.
if($using_cloudflare){
	$visitor_ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
}else{
	$visitor_ip = $_SERVER['REMOTE_ADDR'];
}
$ref = getenv("HTTP_REFERER");
$ref = base64_encode($ref);
$ref_master = "http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
$ref_master = base64_encode($ref_master);
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$user_agent = base64_encode($user_agent);
$script_remote_url = 'http://www.cpagrip.com/url_locker_proxy.php?params='.$locker_id.'&custom_domain='.$custom_domain.'&visitor_ip='.$visitor_ip.'&pubid='.$pubid.'&ref='.$ref.'&ref_master='.$ref_master.'&user_agent='.$user_agent.'&tracking_id='.$tracking_id;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $script_remote_url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$return_string = curl_exec($ch);
curl_close($ch);
echo $return_string;
?>