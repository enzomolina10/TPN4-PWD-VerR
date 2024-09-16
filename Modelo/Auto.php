<?php 
include_once 'conector/BaseDatos.php';

class Auto {
    private $patente;
    private $marca;
    private $modelo;
    private $dniDuenio;
    private $mensajeoperacion;
    
    public function __construct(){
        $this->patente = "";
        $this->marca = "";
        $this->modelo = "";
        $this->dniDuenio = new Persona();
        $this->mensajeoperacion = "";
    }

    public function getPatente(){
        return $this->patente;
    }
    public function setPatente($patente){
        $this->patente = $patente;
    }

    public function getMarca(){
        return $this->marca;
    }
    public function setMarca($marca){
        $this->marca = $marca;
    }

    public function getModelo(){
        return $this->modelo;
    }
    public function setModelo($modelo){
        $this->modelo = $modelo;
    }

    public function getDniDuenio(){
        return $this->dniDuenio;
    }
    public function setDniDuenio($dniDuenio){
        $this->dniDuenio = $dniDuenio;
    }

    public function setear($patente, $marca, $modelo, $objDuenio){
        $this->setPatente($patente);
        $this->setMarca($marca);
        $this->setModelo($modelo);
        $this->setDniDuenio($objDuenio);
    }
    
    public function getMensajeOperacion(){
        return $this->mensajeoperacion;
    }
    public function setMensajeOperacion($valor){
        $this->mensajeoperacion = $valor;
    }
    
    public function cargar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM auto WHERE Patente = '".$this->getPatente()."'";
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res > -1){
                if($res > 0){

                    $row = $base->Registro();

                    $objPersona = new Persona();
                    $persona = $objPersona->listar("NroDni = ".$row['DniDuenio']);


                    $this->setear($row['Patente'], $row['Marca'], $row['Modelo'], $persona[0]);
                    $resp = true;
                }
            }
        } else {
            $this->setMensajeOperacion("Auto->cargar: ".$base->getError());
        }
        return $resp;
    }
    
    public function insertar(){
        $resp = false;
        
        $base = new BaseDatos();
        $sql = "INSERT INTO auto (Patente, Marca, Modelo, DniDuenio) VALUES ('".$this->getPatente()."', '".$this->getMarca()."', '".$this->getModelo()."', '".$this->getDniDuenio()->getNroDni()."')";
        try {
            if ($base->Iniciar()) {
                if ($base->Ejecutar($sql)) {
                    $resp = true;
                } else {
                    $this->setMensajeOperacion("Auto->insertar: ".$base->getError());
                }
            } else {
                $this->setMensajeOperacion("Auto->insertar: ".$base->getError());
            }
        } catch (PDOException $e) {
            $this->setMensajeOperacion("Auto->insertar: ".$e->getMessage());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE auto SET Marca='".$this->getMarca()."', Modelo='".$this->getModelo()."', DniDuenio='".$this->getDniDuenio()->getNroDni()."' WHERE Patente='".$this->getPatente()."'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Auto->modificar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Auto->modificar: ".$base->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM auto WHERE Patente='".$this->getPatente()."'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Auto->eliminar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Auto->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public function listar($parametro=""){
        $arreglo = [];
        $base = new BaseDatos();
        $sql = "SELECT * FROM auto";
        if ($parametro != "") {
            $sql .= ' WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res > -1){
            if($res > 0){
                while ($row = $base->Registro()){

                    $objPersona = new Persona();
                    $persona = $objPersona->listar("NroDni = ".$row['DniDuenio']);

                    if(!empty($persona)){
                        $obj = new Auto();
                        $obj->setear($row['Patente'], $row['Marca'], $row['Modelo'], $persona[0]);
                    array_push($arreglo, $obj);
                        
                    }
                    
                }
            }
        } else {
            
            $this->setMensajeOperacion("Auto->listar: ".$base->getError());
        }
        return $arreglo;
    }
}
?>