<?php
$driver='mysql';
$host='localhost';
$dbname ='my-site';
$userName='root';
$password='mysql';
$charset='utf8';


try {
    $con= new PDO("$driver:host=$host; dbname=$dbname; charset=$charset", $userName, $password);
}catch (PDOException $i){
    die("ошибка подключения к БД");
}





