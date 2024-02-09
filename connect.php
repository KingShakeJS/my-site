<?php
$driver='mysql';
$host='localhost';
$dbname ='site';
$userName='root';
$password='mysql';
$charset='utf8';

$con= new PDO("$driver:host=$host; dbname=$dbname; charset=$charset", $userName, $password);

