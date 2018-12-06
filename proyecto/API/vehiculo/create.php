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

$vehiculo->marca = $data->marca;
$vehiculo->modelo = $data->modelo;
$vehiculo->patente = $data->patente;
$vehiculo->anho_fabricacion = $data->anho_fabricacion;
$vehiculo->created = date('Y-m-d H:i:s');

if($vehiculo->create()){
    echo '{';
        echo '"message": "El vehiculo ha sido registrado."';
    echo '}';
}
else{
    echo '{';
        echo '"message": "No se ha podido registrar el vehiculo."';
    echo '}';
}
?>
