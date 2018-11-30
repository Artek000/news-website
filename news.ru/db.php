<?php

require "libs/rb.php";

$link = R::setup( 'mysql:host=localhost;dbname=web','root', '' ); 
$host='localhost'; // имя хоста (уточняется у провайдера)
$database='web'; // имя базы данных, которую вы должны создать
$user='root'; // заданное вами имя пользователя, либо определенное провайдером
$pswd=''; // заданный вами пароль
 
$dbh = mysqli_connect($host, $user, $pswd, $database) or die("Не могу соединиться с MySQL.");
//mysql_select_db($database,$dbh) or die("Не могу подключиться к базе.");
mysqli_query($dbh, "SET NAMES utf8");

session_start();
    
?>