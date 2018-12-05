<?php
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/chofer.php';

$database = new DataBase();
$connection = $database->getConnection();

$chofer = new Chofer($connection);

$stmt = $chofer->read();
$count = $stmt->rowCount();

if($count > 0){


    $choferes = array();
    $choferes["body"] = array();
    $choferes["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);

        $p  = array(
              "id_chofer" => $id_chofer,
              "apellido" => $apellido,
              "nombre" => $nombre,
              "dni" => $dni,
              "email" => $email,
              "id_vehiculo" => $id_vehiculo,
              "id_empresa" => $id_empresa,
              "created" => $created,
              "updated" => $updated,
        );

        array_push($choferes["body"], $p);
    }

    echo json_encode($choferes);
}

else {

    echo json_encode(
        array("body" => array(), "count" => 0);
    );
}
?>