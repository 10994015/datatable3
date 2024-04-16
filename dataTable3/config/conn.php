<?php

$db_hostname = 'localhost';      //資料庫主機名稱
$db_username = 'root';           //登入資料庫的管理者的帳號
$db_password = '';               //登入密碼
$db_name     = 'appwms';         //使用的資料庫
$db_charset  = 'utf8';           //設定字元編碼

$dsn = "mysql:host=$db_hostname;dbname=$db_name;charset=$db_charset";
 
try{
 $conn = new PDO($dsn, $db_username, $db_password);
} 
catch ( PDOException $e ){
 die("ERROR!!!: ". $e->getMessage());
} 
 