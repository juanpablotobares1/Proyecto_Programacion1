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

$empresa->empresa = $data->empresa;
$empresa->pais_procedencia = $data->pais_procedencia;
$empresa->created = date('Y-m-d H:i:s');

if($empresa->create()){
    echo '{';
        echo '"message": "La empresa ha sido registrada."';
    echo '}';
}
else{
    echo '{';
        echo '"message": "No se ha podido registrar la empresa."';
    echo '}';
}
?>
