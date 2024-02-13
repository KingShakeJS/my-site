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
        if (isset($id)) {
            selectAllOrOneId($type, $con, $id);
        } else {
            selectAllOrOneId($type, $con);
        }
    }
} elseif ($method === 'POST') {
    if ($type === 'users') {
       $lastInsertId= createData($type, $con, $_POST);
       $_SESSION[$id]=$lastInsertId;
//       print_r($_SESSION[$id]);
    }
} elseif ($method === 'PATCH') {
    if ($type === 'users') {
        if (isset($id)) {
            $data = file_get_contents('php://input');
            $data = json_decode($data, true);
            updateDate($type, $id, $con, $data);
        }
    }
} elseif ($method === "DELETE") {
    if ($type === 'users') {
        if (isset($id)) {
            deleteData($type, $id, $con);
        }
    }
}




if ($method === 'POST') {
    if ($type === 'reg-users') {
        $ar = $type;
        $par = explode('-', $ar);
        getWhere($par[1], $con, $_POST);
    }
}




