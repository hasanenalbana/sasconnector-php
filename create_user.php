<?php

require_once 'SASConnector.php';

$api = new SASConnector('demo4.sasradius.com', 'admin', 'snonosystems');
$api->login();
$payload = [
	'username' => 'test_user',
	'password' => '123123',
	'confirm_password' => '123123',
	'profile_id' => 1,
	'parent_id' => 1,
	'firstname' => 'Ali',
	'lastname' => 'Sameer'
];
$res = $api->post('user', $payload);
print_r(json_decode($res));
