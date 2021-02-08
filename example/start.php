<?php

require '../autoload.php';

use c0rz\InstagramPHP\Instagram;

$instagram = new Instagram();
print_r($instagram->generateCsrfToken());
