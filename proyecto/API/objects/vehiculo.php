<?php
class Vehiculo{

    // Conexion
    private $connection;

    // Nombre de Tabla
    private $table_name = "vehiculo";

    // Columnas de Tabla
    public $id_vehiculo;
    public $marca;
    public $modelo;
    public $patente;
    public $anho_fabricacion;
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

    //Crear Vehiculo
    function create(){

        $query = "INSERT INTO " . $this->table_name . " SET marca=:marca, modelo=:modelo, patente=:patente, anho_fabricacion=:anho_fabricacion";

        $stmt = $this->connection->prepare($query);

        $this->marca=strip_tags($this->marca);
        $this->modelo=strip_tags($this->modelo);
        $this->patente=strip_tags($this->patente);
        $this->anho_fabricacion=strip_tags($this->anho_fabricacion);
        $this->created=strip_tags($this->created);
        $this->updated=strip_tags($this->updated);
      
        $stmt->bindParam(":marca", $this->marca);
        $stmt->bindParam(":modelo", $this->modelo);
        $stmt->bindParam(":patente", $this->patente);
        $stmt->bindParam(":anho_fabricacion", $this->anho_fabricacion);
        $stmt->bindParam(":created", $this->created);
        $stmt->bindParam(":updated", $this->updated);
      
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    //Modificar Vehiculo
    function update(){
        $query = "UPDATE " . $this->table_name . " SET  marca=:marca, modelo=:modelo, patente=:patente, anho_fabricacion=:anho_fabricacion WHERE id_vehiculo=:id_vehiculo";

        $stmt=$this->connection->prepare($query);

        $this->marca=strip_tags($this->marca);
        $this->modelo=strip_tags($this->modelo);
        $this->patente=strip_tags($this->patente);
        $this->anho_fabricacion=strip_tags($this->anho_fabricacion);

        $stmt->bindParam(":marca",$this->marca);
        $stmt->bindParam(":modelo",$this->modelo);
        $stmt->bindParam(":patente",$this->patente);
        $stmt->bindParam(":anho_fabricacion",$this->anho_fabricacion);
        
        if($stmt->execute()){
            return true;
        }
        return false;
    }
    //Eliminar Vehiculo
    function delete(){

        $query = "DELETE FROM " . $this->table_name . " WHERE id_vehiculo = ?";

        $stmt = $this->connection->prepare($query);

        $this->id_vehiculo=strip_tags($this->id_vehiculo);

        $stmt->bindParam(1, $this->id_vehiculo);

        if($stmt->execute()){
            return true;
        }
        return false;
    }    
}