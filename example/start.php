<?php
// error_reporting(1);

require '../autoload.php';
require 'mainconfig.php';

use c0rz\InstagramPHP\Instagram;

// $instagram = new Instagram();
$username = "Yasuko_Makin18Gc";
$password = "dkfhMsEi";
// $useragent = "Mozilla/5.0 (U; Linux i684 ; en-US) Gecko/20130401 Firefox/69.6";
$useragent = "Mozilla/5.0 (Macintosh; U; Intel Mac OS X 8_2_2; en-US) AppleWebKit/537.14 (KHTML, like Gecko) Chrome/49.0.3217.393 Safari/536";
// $instagram = new Instagram();
// $account = json_decode($instagram->login_account($username, $password));
// $instagramId = new Instagram($useragent, "45728976801", "45728976801:0MN7phI43R0Hy6:9");
$instagramId = new Instagram($useragent, "45515542381", "45515542381:DlvLzVIsHtuVln:10");
$getInfo = $instagramId->follow_user("rezarhmtlh");
print_r($getInfo);
// $media_id = $getInfo['graphql']["shortcode_media"]["id"];
// print_r($instagramId->likes_photo($media_id)[1]);
// if ($account->status == true) {
//     $instagramId = new Instagram($account->user_Agent, $account->userId, $account->sessionid, $account->csrftoken, $account->ig_did, $account->mid);
//     $logout = $instagram->logout_account();
//     // $getInfo = json_decode($instagram->infoUser("https://www.instagram.com/p/CAh_by7HZ5K/")[1], true);
//     // $media_id = $getInfo['graphql']["shortcode_media"]["id"];
//     // print_r($instagramId->likes_photo($media_id)[1]);
// } else {
//     print_r($account);
// }
