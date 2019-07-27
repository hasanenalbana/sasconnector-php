<?php

require_once 'SASConnector.php';

$api = new SASConnector('demo4.sasradius.com', 'admin', 'snonosystems');
$api->login();
$res = $api->post('index/user', []);
print_r(json_decode($res));
