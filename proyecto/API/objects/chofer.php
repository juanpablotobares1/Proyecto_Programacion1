<?php
class Chofer{

    // Conexion
    private $connection;

    // Nombre de Tabla
    private $table_name = "chofer";

    // Columnas de Tabla
    public $id_chofer;
    public $apellido;
    public $nombre;
    public $dni;
    public $email;
    public $id_vehiculo;
    public $id_empresa;
    public $created; 
    public $updated;

    public function __construct($connection){
        $this->connection = $connection;
    }

// create chofer
function create(){
 
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                apellido=:apellido, nombre=:nombre, dni=:dni, email=:email, id_vehiculo=:id_vehiculo, id_empresa=:id_empresa, created=:created";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->apellido=htmlspecialchars(strip_tags($this->apellido));
    $this->nombre=htmlspecialchars(strip_tags($this->nombre));
    $this->dni=htmlspecialchars(strip_tags($this->dni));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->id_vehiculo=htmlspecialchars(strip_tags($this->id_vehiculo));
    $this->id_empresa=htmlspecialchars(strip_tags($this->id_empresa));
    $this->created=htmlspecialchars(strip_tags($this->created));
 
    // bind values
    $stmt->bindParam(":apellido", $this->apellido);
    $stmt->bindParam(":nombre", $this->nombre);
    $stmt->bindParam(":dni", $this->dni);
    $stmt->bindParam(":email", $this->email);
    $stmt->bindParam(":id_vehiculo", $this->id_vehiculo);
    $stmt->bindParam(":id_empresa", $this->id_empresa);
    $stmt->bindParam(":created", $this->created);
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}

    //Leer Choferes
    function read(){

        $query = "SELECT c.id_chofer, c.apellido, c.nombre, c.dni, c.email, v.id_vehiculo, e.id_empresa, c.created, c.updated FROM " . $this->table_name . " c INNER JOIN vehiculo v ON c.id_vehiculo=v.id_vehiculo INNER JOIN empresa e ON c.id_empresa=e.id_empresa ORDER BY c.created DESC";

        $stmt = $this->connection->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    //Modificar Chofer
    function update(){
        $query = "UPDATE " . $this->table_name . " SET  apellido=:apellido, nombre=:nombre, dni=:dni, email=:email, id_vehiculo=:id_vehiculo, id_empresa=:id_empresa WHERE id_chofer=:id_chofer";

        $stmt=$this->connection->prepare($query);

        $this->apellido=strip_tags($this->apellido);
        $this->nombre=strip_tags($this->nombre);
        $this->dni=strip_tags($this->dni);
        $this->email=strip_tags($this->email);
        $this->id_vehiculo=strip_tags($this->id_vehiculo);
        $this->id_empresa=strip_tags($this->id_empresa);
        $this->id_chofer=strip_tags($this->id_chofer);

        $stmt->bindParam(":apellido",$this->apellido);
        $stmt->bindParam(":nombre",$this->nombre);
        $stmt->bindParam(":dni",$this->dni);
        $stmt->bindParam(":email",$this->email);
        $stmt->bindParam(":id_vehiculo",$this->id_vehiculo);
        $stmt->bindParam(":id_empresa",$this->id_empresa);
        $stmt->bindParam(":id_chofer",$this->id_chofer);
        
        if($stmt->execute()){
            return true;
        }
        return false;
    }
    //Eliminar Chofer
    function delete(){

        $query = "DELETE FROM " . $this->table_name . " WHERE id_chofer = ?";

        $stmt = $this->connection->prepare($query);

        $this->id_chofer=strip_tags($this->id_chofer);

        $stmt->bindParam(1, $this->id_chofer);

        if($stmt->execute()){
            return true;
        }
        return false;
    }    
}
