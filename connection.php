<?php
$host='php-aws-db.chlvtiacmc2b.ap-south-1.rds.amazonaws.com';
$user='admin';
$pass='adminPHP';
$db_name='php_aws';
$conn=new mysqli($host,$user,$pass,$db_name);
//mysqli_select_db($link,"php_aws");
if($conn->connect_error){
    die('connection error:'.$conn->connect_error);
}
?>