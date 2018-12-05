<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';

include_once '../objects/empresa.php';

$database = new DataBase();
$connection = $database->getConnection();

$empresa = new Empresa($connection);

$data = json_decode(file_get_contents("php://input"));

$empresa->id_empresa = $data->id_empresa;

if($empresa->delete()){
    echo json_encode(array("message" => "Se ha eliminado la empresa."));
}else{
    echo json_encode(array("message" => "No se ha eliminado la empresa, vuelve a intentarlo."));
}

?>