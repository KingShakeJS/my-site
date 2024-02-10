<?php

global $con;
require 'connect.php';


function test($value)
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}

function selectAll($table, $con)
{
    $sql = "SELECT * FROM $table";
    $query = $con->prepare($sql);
    $query->execute();
    $errInfo = $query->errorInfo();

    if ($errInfo[0] !== PDO::ERR_NONE) {
        echo $errInfo;
        die();
    }

    return $date = $query->fetchAll(PDO::FETCH_ASSOC);


}

test(selectAll('users', $con));

