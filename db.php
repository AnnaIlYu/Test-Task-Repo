<?php
//������� ���� ������ Service(����� - ��)

$servername = "localhost"; 
$username = "root";
$password = ""; 
$dbName="Service";
$manager_email="manager@company.ru";

//������������ � MySQL
$conn = new mysqli($servername, $username, $password, $dbName);
if(!$conn) { echo "conn_error";
  exit(); }
?>