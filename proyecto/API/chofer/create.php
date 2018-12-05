<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';

include_once '../objects/chofer.php';

$database = new DataBase();
$connection = $database->getConnection();

$chofer = new Chofer($connection);

$data = json_decode(file_get_contents("php://input"));

$chofer->apellido = $data->apellido;
$chofer->nombre = $data->nombre;
$chofer->dni = $data->dni;
$chofer->email = $data->email;
$chofer->id_vehiculo = $data->id_vehiculo;
$chofer->id_empresa = $data->id_empresa;
$chofer->created = date('Y-m-d H:i:s');

if($chofer->create()){
    echo '{';
        echo '"message": "El chofer a sido registrado."';
    echo '}';
}
else{
    echo '{';
        echo '"message": "No se ha podido registrar el chofer."';
    echo '}';
}
?>
