<?php
require '../autoload.php';

use c0rz\InstagramPHP\Instagram;

$username = USERNAME;
$password = PASSWORD;
$url = URL_PHOTO;
$instagram = new Instagram();
$login = json_decode($instagram->login_account($username, $password));
if ($login->status == true) {
    $instagram = new Instagram($login->user_Agent, $login->userId, $login->sessionid);
    $mediaId = $instagram->infoMedia($url)["graphql"]["shortcode_media"]["id"];
    if ($mediaId) :
        $likes = $instagram->likes_photo($mediaId);
        print_r($likes);
    else :
        print_r($instagram->infoMedia($url));
    endif;
} else {
    print_r($login);
}
