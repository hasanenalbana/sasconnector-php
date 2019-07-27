# sasconnector-php
API connector for SAS Radius 4

__Installation__<br>
Clone the git repository:<br>
```
git clone https://github.com/hasanenalbana/sasconnector-php
```
Install required libraries:
```cd sasconnector-php<br>
curl -sS https://getcomposer.org/installer | php<br>
php composer.phar install<br>
````

__Usage__
```
require_once 'SASConnector.php';<br>
$api = new SASConnector('demo4.sasradius.com', 'manager_username', 'manager_password');<br>
$api->login();<br>
$res = $api->post('index/user', []);<br>
print_r(json_decode($res));<br>
```
