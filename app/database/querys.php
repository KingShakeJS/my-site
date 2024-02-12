<?php

//global $con;
//require 'connect.php';

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
function selectAllOrOneId($table, $con, $id = null)
{
    $sql = "SELECT * FROM $table";

    if ($id) {
        $sql = $sql . " WHERE id = $id";
    }
    $query = $con->prepare($sql);
    $query->execute();
    dbCheckError($query);
    $date = $query->fetchAll();
    return print_r(json_encode($date));
}

//создать запись/////////////////////////////////////////////////
function createData($table, $con, $data)
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
    $sql = "INSERT INTO $table ($col) VALUES ($mask)";
    $query = $con->prepare($sql);
    $query->execute();
    dbCheckError($query);
    http_response_code(201);
    $res = [
        "status" => true,
        "post_id" => $con->lastInsertId()
    ];
    print_r(json_encode($res));
}


//редактирование данных в строке///////////////////////////////////////////////

function updateDate($table, $id, $con, $data)
{
    $i = 0;
    $str = '';
    foreach ($data as $key => $value) {
        if ($i === 0) {

            $str = $str . $key ." = '" . $value . "'";
        } else {

            $str = $str .", ". $key . " = '$value'";
        }

        $i++;
    }
    $sql = "UPDATE $table SET $str WHERE id=$id";
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

function deleteData($table, $id, $con){
    $sql="DELETE FROM $table WHERE `id`=$id";
    $query = $con->prepare($sql);
    $query->execute();
    dbCheckError($query);
    $res = [
        "status" => true,
        "message" => 'post is ydalen'
    ];
    print_r(json_encode($res));
}



































