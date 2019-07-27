# sasconnector-php
API connector for SAS Radius 4

__Installation__<br>
Clone the git repository:
```
git clone https://github.com/hasanenalbana/sasconnector-php
```
Install required libraries:
```cd sasconnector-php
curl -sS https://getcomposer.org/installer | php
php composer.phar install
````

__Usage__
```
require_once 'SASConnector.php';
$api = new SASConnector('demo4.sasradius.com', 'manager_username', 'manager_password');
$api->login();
$res = $api->post('index/user', []);
print_r(json_decode($res));
```
