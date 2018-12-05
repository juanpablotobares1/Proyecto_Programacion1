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

$chofer->id_chofer = $data->id_chofer;
$chofer->apellido = $data->apellido;
$chofer->nombre = $data->nombre;
$chofer->dni = $data->dni;
$chofer->email = $data->email;
$chofer->id_vehiculo = $data->id_vehiculo;
$chofer->id_empresa = $data->id_empresa;

if($chofer->update()){
    echo json_encode(array("message" => "Se ha actualizado los datos del chofer."));
}
else{
    echo json_encode(array("message" => "No se ha podido actualizar los datos del chofer, vuelve a intentarlo."));
}

?>