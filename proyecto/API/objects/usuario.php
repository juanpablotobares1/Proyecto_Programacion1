<?php
class Usuario{

    // Conexion
    private $connection;

    // Nombre de Tabla
    private $table_name = "usuario";

    // Columnas de Tabla
    public $id_usuario;
    public $usuario;
    public $clave;
    public $created;
    public $updated;

    public function __construct($connection){
        $this->connection = $connection;
    }

    //Iniciar Sesion
    public function login(){
        $query = "SELECT id_usuario, usuario, clave FROM " . $this->table_name . " WHERE usuario = '" . $this->usuario . "' AND clave = '" . $this->clave . "'";

        $stmt = $this->connection->prepare($query);

        $stmt->execute();

        return $stmt;
    }
}