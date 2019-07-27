# sasconnector-php
API connector for SAS Radius 4

<b>Installation</b><br>
Clone the git repository:<br>
<code>
git clone https://github.com/hasanenalbana/sasconnector-php
</code>
<br>
Install required libraries:<br>
<code>
cd sasconnector-php<br>
curl -sS https://getcomposer.org/installer | php<br>
php composer.phar install<br>
</code>

<b>Usage</b><br>
<code>
require_once 'SASConnector.php';<br>
$api = new SASConnector('demo4.sasradius.com', 'manager_username', 'manager_password');<br>
$api->login();<br>
$res = $api->post('index/user', []);<br>
print_r(json_decode($res));<br>
</code>
