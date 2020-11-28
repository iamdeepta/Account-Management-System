<?php
/*$host = '192.168.253.15';
$user = 'root';
$pass = 'mysql@123';
$db = 'pwdweb';*/

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'account_management';

//define('DBHR', 'db_hr');
//define('DBPMS', 'pwdpms3'); 


$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>