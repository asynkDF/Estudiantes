<?php
require_once("db.php");

class Config{
    private $id;
    private $nombres;
    private $direccion;
    private $logros;
    protected $dbCnx;

    public function __construct($id = 0, $nombres = "", $direccion = "", $logros = ""){
        $this->id = $id;
        $this->nombres = $nombres;
        $this->direccion = $direccion;
        $this->logros = $logros;
        $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH-MODE => PDO::FETCH_ASSOC]);
    }
public function setID($id){
    $this->id = $id;
}
public function getID(){
    return $this->id;
}


public function setNombres($nombres){
    $this->nombres = $nombres;
}
public function getNombres(){
    return $this->nombres;
}


public function setDireccion($direccion){
    $this->direccion = $direccion;
}
public function getDireccion(){
    return $this->direccion;
}


public function setLogros($logros){
    $this->logros = $logros;
}
public function getLogros(){
    return $this->logros;
}

public function inserData(){
    try {
        $stm = $this->dbCnx -> prepare("INSERT INTO campers(nombres, direccion, logros) values(?,?,?)");
        $stm -> execute([$this->nombre, $this->direccion, $this->logros]);
    } catch (Exception $e) {
       return $e->getMessage();
    }
 
}
}
?>