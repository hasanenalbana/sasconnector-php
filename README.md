# sasconnector-php
API connector for SAS Radius 4

[Installation]<br>
Clone the git repository:
<code>
git clone https://github.com/hasanenalbana/sasconnector-php
</code>
<br>
Install required libraries:<br>
<code>cd sasconnector-php<br>
 curl -sS https://getcomposer.org/installer | php<br>
 php composer.phar install<br>
</code>

[Usage]<code><br>
require_once 'SASConnector.php';<br>
$api = new SASConnector('demo4.sasradius.com', 'manager_username', 'manager_password');<br>
$api->login();<br>
$res = $api->post('index/user', []);<br>
print_r(json_decode($res));<br>
</code>
