<?php
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/empresa.php';

$database = new DataBase();
$connection = $database->getConnection();

$empresa = new Empresa($connection);

$stmt = $empresa->read();
$count = $stmt->rowCount();

if($count > 0){


    $empresas = array();
    $empresas["body"] = array();
    $empresas["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);

        $p  = array(
              "id_empresa" => $id_empresa,
              "empresa" => $empresa,
              "pais_procedencia" => $pais_procedencia,
              "created" => $created,
              "updated" => $updated,
        );

        array_push($empresas["body"], $p);
    }

    echo json_encode($empresas);
}

else {

    echo json_encode(
        array("body" => array(), "count" => 0);
    );
}
?>