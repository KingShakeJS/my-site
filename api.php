<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Credentials: true');
header("Content-Type: application/json");

global $con;
include './app/database/connect.php';


$method = $_SERVER['REQUEST_METHOD'];
$q = $_GET['q'];
$params = explode('/', $q);
$type = $params[0];
$id = $params[1];


function selectAll($table, $con)
{

    $sql = "SELECT * FROM $table";
    $users = $con->query($sql)->fetchAll(2);
    print_r(json_encode($users));
}


if ($method === 'GET') {
    if ($type === 'users') {
        selectAll($type, $con);
    }
}
