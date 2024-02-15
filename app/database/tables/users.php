<?php

session_start();


function test($value)
{
    print_r($value);
}

function testExit($value)
{
    print_r($value);

    exit();
}

//проверка выполнения запроса///////////////////////////////////////
function dbCheckError($query)
{
    $errInfo = $query->errorInfo();
    if ($errInfo[0] !== PDO::ERR_NONE) {
        echo $errInfo[2];
        exit();
    }
    return true;
}

//получение данных одной таблицы//////////////////////////////////////
function getUsers($con)
{

    $sql = "SELECT * FROM users";
    $query = $con->prepare($sql);
    $query->execute();
    $data = $query->fetchAll();


    print_r(json_encode($data));
}

//создать запись/////////////////////////////////////////////////
function createUser($con, $data)
{
    $i = 0;
    $col = '';
    $mask = '';
    foreach ($data as $key => $value) {
        if ($i === 0) {
            $col = $col . $key;
            $mask = $mask . "'" . $value . "'";
        } else {
            $col = $col . ", $key";
            $mask = $mask . ", '$value'";
        }
        $i++;
    }
    $sql = "INSERT INTO users ($col) VALUES ($mask)";
    $query = $con->prepare($sql);
    $query->execute();
    http_response_code(201);
    $res = [
        "status" => true,
        "post_id" => $con->lastInsertId()
    ];


    $lastInsertUserId = $con->lastInsertId();
    $user = getUser($con, $lastInsertUserId, true);

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['username'] = $user['username'];


    print_r(json_encode($res + $_SESSION));


//    print_r(json_encode($res));

}


//редактирование данных в строке///////////////////////////////////////////////

function updateUser($id, $con, $data)
{
    $i = 0;
    $str = '';
    foreach ($data as $key => $value) {
        if ($i === 0) {

            $str = $str . $key . " = '" . $value . "'";
        } else {

            $str = $str . ", " . $key . " = '$value'";
        }

        $i++;
    }
    $sql = "UPDATE users SET $str WHERE id=$id";
    $query = $con->prepare($sql);
    $query->execute();
    dbCheckError($query);
    http_response_code(200);
    $res = [
        "status" => true,
        "message" => 'post is pomenan'
    ];
    print_r(json_encode($res));
}


//удаление пользователя
function deleteUser($id, $con)
{
    $sql = "DELETE FROM users WHERE `id`=$id";
    $query = $con->prepare($sql);
    $query->execute();
    dbCheckError($query);
    $res = [
        "status" => true,
        "message" => 'post is ydalen'
    ];
    print_r(json_encode($res));
}


//получить строки по любым параметрам////////////////////////////////////////////////
function getUsersWhere($con, $data)
{
    $sql = "SELECT * FROM users";
    $i = 0;
    foreach ($data as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " WHERE " . $key . " = " . "'" . $value . "'";
        } else {
            $sql = $sql . " AND " . $key . " = " . "'" . $value . "'";
        }
        $i++;
    }

    $query = $con->prepare($sql);
    $query->execute();
    dbCheckError($query);
    $obj = $query->fetchAll();
    dbCheckError($query);
    $res = [
        "status" => false,
        "message" => "Post NET"
    ];
    $res2 = [
        "status" => true,
        "message" => "Post YEST"
    ];
    if (!$obj) {
        print_r(json_encode($res));
    } else {
        print_r(json_encode($res2));
    }


}

function getUser($con, $id, $notPrint=false){
    $sql = "SELECT * FROM users WHERE `id`=$id";
    $query = $con->prepare($sql);
    $query->execute();
    dbCheckError($query);
    $obj = $query->fetch();
    dbCheckError($query);
    if ($notPrint===false){
        print_r(json_encode($obj));
    }else{
        return $obj;
    }


}


































