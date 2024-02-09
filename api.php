<?php
global $con;
include './connect.php';




$name='Anbnndr';
$age=302;
$login='Andnbmreee';
$password='6545gbnmgf';

$arDate=[
    'n'=>$name,
    'a'=>$age,
    'l'=>$login,
    'p'=>$password
];
$sql="INSERT users (name, age, login, password) VALUES(:n, :a, :l, :p)";
$query=$con->prepare($sql);
$query->execute($arDate);

