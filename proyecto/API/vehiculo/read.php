<?php
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/vehiculo.php';

$database = new DataBase();
$connection = $database->getConnection();

$vehiculo = new Vehiculo($connection);

$stmt = $vehiculo->read();
$count = $stmt->rowCount();

if($count > 0){


    $vehiculos = array();
    $vehiculos["body"] = array();
    $vehiculos["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);

        $p  = array(
              "id_vehiculo" => $id_vehiculo,
              "marca" => $marca,
              "modelo" => $modelo,
              "patente" => $patente,
              "anho_fabricacion" => $anho_fabricacion,
              "created" => $created,
              "updated" => $updated,
        );

        array_push($vehiculos["body"], $p);
    }

    echo json_encode($vehiculos);
}

else {

    echo json_encode(
        array("body" => array(), "count" => 0);
    );
}
?>