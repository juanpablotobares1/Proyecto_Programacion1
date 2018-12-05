<?php
class Empresa{

    // Conexion
    private $connection;

    // Nombre de Tabla
    private $table_name = "empresa";

    // Columnas de Tabla
    public $id_empresa;
    public $nombre;
    public $pais_procedencia;
    public $created; 
    public $updated;

    public function __construct($connection){
        $this->connection = $connection;
    }

    function read(){

        $query = "SELECT * FROM " . $this->table_name;

        $stmt = $this->connection->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    //Crear Empresa
    function create(){

        $query = "INSERT INTO " . $this->table_name . " SET nombre=:nombre, pais_procedencia=:pais_procedencia";

        $stmt = $this->connection->prepare($query);

        $this->nombre=strip_tags($this->nombre);
        $this->pais_procedencia=strip_tags($this->pais_procedencia);
        $this->created=strip_tags($this->created);
        $this->updated=strip_tags($this->updated);
      
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":pais_procedencia", $this->pais_procedencia);
        $stmt->bindParam(":created", $this->created);
        $stmt->bindParam(":updated", $this->updated);
      
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    //Modificar Chofer
    function update(){
        $query = "UPDATE " . $this->table_name . " SET  nombre=:nombre, pais_procedencia=:pais_procedencia WHERE id_empresa=:id_empresa";

        $stmt=$this->connection->prepare($query);

        $this->nombre=strip_tags($this->nombre);
        $this->pais_procedencia=strip_tags($this->pais_procedencia);

        $stmt->bindParam(":nombre",$this->nombre);
        $stmt->bindParam(":pais_procedencia",$this->pais_procedencia);

        if($stmt->execute()){
            return true;
        }
        return false;
    }
    //Eliminar Chofer
    function delete(){

        $query = "DELETE FROM " . $this->table_name . " WHERE id_empresa = ?";

        $stmt = $this->connection->prepare($query);

        $this->id_empresa=strip_tags($this->id_empresa);

        $stmt->bindParam(1, $this->id_empresa);

        if($stmt->execute()){
            return true;
        }
        return false;
    }    
}