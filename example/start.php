<?php
// error_reporting(1);

require '../autoload.php';

use c0rz\InstagramPHP\Instagram;

$instagram = new Instagram();
print_r($instagram->login_account("Kirstie_Helker1ko", "schWyPWr"));
