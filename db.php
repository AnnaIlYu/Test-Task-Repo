<?php
//Создаем базу данных Service(далее - БД)

$servername = "localhost"; 
$username = "root";
$password = ""; 
$dbName="Service";
$manager_email="manager@company.ru";

//Подключаемся к MySQL
$conn = new mysqli($servername, $username, $password, $dbName);
if(!$conn) { echo "conn_error";
  exit(); }
?>