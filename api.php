<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Credentials: true');
header("Content-Type: application/json");

global $con;
include './app/database/connect.php';
include './app/database/querys.php';


$method = $_SERVER['REQUEST_METHOD'];
$q = $_GET['q'];

$params = explode('/', $q);
$type = $params[0];
$id = $params[1];







//тут само апи./////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($method === 'GET') {
    if ($type === 'users') {
        if(isset($id)){
            $sql = "SELECT * FROM $type WHERE id =$id";
            $query = $con->prepare($sql);
            $query->execute();
            dbCheckError($query);
            $date=$query->fetchAll();
            return print_r(json_encode($date));
        }else{
            selectAll($type, $con);
        }

    }
}
