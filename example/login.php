<?php
// error_reporting(1);

require '../autoload.php';

use c0rz\InstagramPHP\Instagram;

$username = USERNAME;
$password = PASSWORD;
$instagram = new Instagram();
$login = json_decode($instagram->login_account($username, $password));
print_r($login);
