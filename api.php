<?php
session_start();


header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Credentials: true');
header("Content-Type: application/json");

global $con;

include './app/database/connect.php';
include './app/database/tables/users.php';



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
        if (isset($id)){
            getUser($con, $id, false);
        }else{
            getUsers($con);
        }

    }
} elseif ($method === 'POST') {
    if ($type === 'users') {
        createUser($con, $_POST);

    }
} elseif ($method === 'PATCH') {
    if ($type === 'users') {
        if (isset($id)) {
            $data = file_get_contents('php://input');
            $data = json_decode($data, true);
            updateUser($id, $con, $data);
        }
    }
} elseif ($method === "DELETE") {
    if ($type === 'users') {
        if (isset($id)) {
            deleteUser($id, $con);
        }
    }
}


if ($method === 'POST') {
    if ($type === 'reg-users') {
        getUsersWhere($con, $_POST, false);
    }
}
if ($method === 'GET') {
    if ($type === 'out-users') {
        logOut();
    }
}
if ($method === 'POST') {
    if ($type === 'log-in-users') {
        logIn($con, $_POST);
    }
}






