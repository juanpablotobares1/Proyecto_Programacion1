<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';

include_once '../objects/vehiculo.php';

$database = new DataBase();
$connection = $database->getConnection();

$vehiculo = new Vehiculo($connection);

$data = json_decode(file_get_contents("php://input"));

$vehiculo->id_vehiculo = $data->id_vehiculo;
$vehiculo->marca = $data->marca;
$vehiculo->modelo = $data->modelo;
$vehiculo->patente = $data->patente;
$vehiculo->anho_fabricacion = $data->anho_fabricacion;

if($vehiculo->update()){
    echo json_encode(array("message" => "Se ha actualizado los datos del vehiculo."));
}
else{
    echo json_encode(array("message" => "No se ha podido actualizar los datos del vehiculo, vuelve a intentarlo."));
}

?>