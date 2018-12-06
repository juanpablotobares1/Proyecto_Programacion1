<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
 
// instantiate chofer object
include_once '../objects/chofer.php';
 
$database = new Database();
$db = $database->getConnection();
 
$chofer = new Chofer($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// make sure data is not empty
if(
    !empty($data->apellido) &&
    !empty($data->nombre) &&
    !empty($data->dni) &&
    !empty($data->email) &&
    !empty($data->id_vehiculo) &&
    !empty($data->id_empresa) 
){
 
    // set chofer property values
    $chofer->apellido = $data->apellido;
    $chofer->nombre = $data->nombre;
    $chofer->dni = $data->dni;
    $chofer->email = $data->email;
    $chofer->id_vehiculo = $data->id_vehiculo;
    $chofer->id_empresa = $data->id_empresa;
    $chofer->created = date('Y-m-d H:i:s');
 
    // create the chofer
    if($chofer->create()){
 
        // set response code - 201 created
        http_response_code(201);
 
        // tell the user
        echo json_encode(array("message" => "Chofer registrado."));
    }
 
    // if unable to create the chofer, tell the user
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        echo json_encode(array("message" => "No se ha registrado el chofer."));
    }
}
 
// tell the user data is incomplete
else{
 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "No se ha registrado el chofer, vuelve a intentarlo"));
}
?>