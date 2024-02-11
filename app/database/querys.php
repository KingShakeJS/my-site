<?php

//global $con;
//require 'connect.php';

function test($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}
//проверка выполнения запроса///////////////////////////////////////
function dbCheckError($query){
    $errInfo=$query->errorInfo();
    if($errInfo[0] !==PDO::ERR_NONE){
        echo $errInfo[2];
        exit();
    }
    return true;
}

//получение данных одной таблицы//////////////////////////////////////
function selectAll($table, $con)
{
    $sql = "SELECT * FROM $table";
    $query = $con->prepare($sql);
    $query->execute();
    dbCheckError($query);
    $date=$query->fetchAll();
    return print_r(json_encode($date));

}

