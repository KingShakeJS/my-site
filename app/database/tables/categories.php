<?php
session_start();

function getCategories($con)
{
    $sql = "SELECT * FROM categories";
    $query = $con->prepare($sql);
    $query->execute();
    $data = $query->fetchAll();
    print_r(json_encode($data));
}

function getCategorieWhere($con, $data, $notPrint = false)
{
    $sql = "SELECT * FROM categories";
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

function createCategory($con, $data)
{
    $name = $data['name'];
    $description = $data['description'];

    $sql = "INSERT INTO categories (`name`, `description`) VALUES ('$name', '$description')";

    $query = $con->prepare($sql);
    $query->execute();
    $res = [
        "status" => false,
        "message" => "Post Sozdan"
    ];
    print_r(json_encode($res));
}