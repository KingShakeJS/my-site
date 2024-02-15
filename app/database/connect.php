<?php

session_start();

$driver = 'mysql';
$host = 'localhost';
$dbname = 'my-site';
$userName = 'root';
$password = 'mysql';
$charset = 'utf8';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try {
    $con = new PDO("$driver:host=$host; dbname=$dbname; charset=$charset", $userName, $password, $options);
} catch (PDOException $i) {
    die("ошибка подключения к БД");
}





