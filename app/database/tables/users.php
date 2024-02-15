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
function getUsersWhere($con, $data, $notPrint = false)
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
    if ($notPrint === false) {
        if (!$obj) {
            print_r(json_encode($res));
        } else {
            print_r(json_encode($res2));
        }
    } else {
        return $obj;
    }


}

function getUser($con, $id, $notPrint = false)
{
    $sql = "SELECT * FROM users WHERE `id`=$id";
    $query = $con->prepare($sql);
    $query->execute();
    dbCheckError($query);
    $obj = $query->fetch();
    dbCheckError($query);
    if ($notPrint === false) {
        print_r(json_encode($obj));
    } else {
        return $obj;
    }
}

function logOut()
{
    session_destroy();
    http_response_code(200);
    $res = [
        'out' => 'true'
    ];
    print_r(json_encode($res));
}

function logIn($con, $data)
{
    $email = $data['email'];
    $password = $data['password'];
    $sql = "SELECT * FROM users WHERE `email`= '$email'";
    $query = $con->prepare($sql);
    $query->execute();
    dbCheckError($query);
    $obj = $query->fetch();
    dbCheckError($query);
    $res = [
        "status" => false,
        "message" => "Neverno"
    ];
    $res2 = [
        "status" => true,

    ];
    if (!$obj) {
        print_r(json_encode($res));
    } else {
        if ($password == $obj['password']) {

            $_SESSION['user_id'] = $obj['id'];
            $_SESSION['admin'] = $obj['admin'];
            $_SESSION['username'] = $obj['username'];


            print_r(json_encode($res2 + $_SESSION));
        } else {
            print_r(json_encode($res));
        }

    }
}

































