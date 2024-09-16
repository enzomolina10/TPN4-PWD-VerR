<?php 
include_once 'conector/BaseDatos.php';

class Persona {
    private $NroDni;
    private $Apellido;
    private $Nombre;
    private $fechaNac;
    private $Telefono;
    private $Domicilio;
    private $mensajeoperacion;

    public function __construct(){
        $this->NroDni = "";
        $this->Apellido = "";
        $this->Nombre = "";
        $this->fechaNac = "";
        $this->Telefono = "";
        $this->Domicilio = "";
        $this->mensajeoperacion = "";
    }

    public function getNroDni(){
        return $this->NroDni;
    }
    public function setNroDni($NroDni){
        $this->NroDni = $NroDni;
    }

    public function getApellido(){
        return $this->Apellido;
    }
    public function setApellido($Apellido){
        $this->Apellido = $Apellido;
    }

    public function getNombre(){
        return $this->Nombre;
    }
    public function setNombre($Nombre){
        $this->Nombre = $Nombre;
    }

    public function getFechaNac(){
        return $this->fechaNac;
    }
    public function setFechaNac($fechaNac){
        $this->fechaNac = $fechaNac;
    }

    public function getTelefono(){
        return $this->Telefono;
    }
    public function setTelefono($Telefono){
        $this->Telefono = $Telefono;
    }

    public function getDomicilio(){
        return $this->Domicilio;
    }
    public function setDomicilio($Domicilio){
        $this->Domicilio = $Domicilio;
    }

    public function getMensajeOperacion(){
        return $this->mensajeoperacion;
    }
    public function setMensajeOperacion($valor){
        $this->mensajeoperacion = $valor;
    }

    public function setear($NroDni, $Apellido, $Nombre, $fechaNac, $Telefono, $Domicilio){
        $this->setNroDni($NroDni);
        $this->setApellido($Apellido);
        $this->setNombre($Nombre);
        $this->setFechaNac($fechaNac);
        $this->setTelefono($Telefono);
        $this->setDomicilio($Domicilio);
    }

    public function cargar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM persona WHERE NroDni = '".$this->getNroDni()."'";
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res > -1){
                if($res > 0){
                    $row = $base->Registro();
                    $this->setear($row['NroDni'], $row['Apellido'], $row['Nombre'], $row['fechaNac'], $row['Telefono'], $row['Domicilio']);
                    $resp = true;
                }
            }
        } else {
            $this->setMensajeOperacion("Persona->cargar: ".$base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO persona (NroDni, Apellido, Nombre, fechaNac, Telefono, Domicilio) VALUES ('".$this->getNroDni()."', '".$this->getApellido()."', '".$this->getNombre()."', '".$this->getFechaNac()."', '".$this->getTelefono()."', '".$this->getDomicilio()."')";
        try {
            if ($base->Iniciar()) {
                if ($base->Ejecutar($sql)) {
                    $resp = true;
                } else {
                    $this->setMensajeOperacion("Persona->insertar: ".$base->getError());
                }
            } else {
                $this->setMensajeOperacion("Persona->insertar: ".$base->getError());
            }
        } catch (PDOException $e) {
            $this->setMensajeOperacion("Persona->insertar: ".$e->getMessage());
        }
        return $resp;
    }

    public function modificar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE persona SET Apellido='".$this->getApellido()."', Nombre='".$this->getNombre()."', fechaNac='".$this->getFechaNac()."', Telefono='".$this->getTelefono()."', Domicilio='".$this->getDomicilio()."' WHERE NroDni='".$this->getNroDni()."'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Persona->modificar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Persona->modificar: ".$base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM persona WHERE NroDni='".$this->getNroDni()."'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Persona->eliminar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Persona->eliminar: ".$base->getError());
        }
        return $resp;
    }

    public function listar($parametro=""){
        $arreglo = [];
        $base = new BaseDatos();
        $sql = "SELECT * FROM persona";
        if ($parametro != "") {
            $sql .= ' WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res > -1){
            if($res > 0){
                while ($row = $base->Registro()){
                    $obj = new Persona();
                    $obj->setear($row['NroDni'], $row['Apellido'], $row['Nombre'], $row['fechaNac'], $row['Telefono'], $row['Domicilio']);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setMensajeOperacion("Persona->listar: ".$base->getError());
        }
        return $arreglo;
    }
}
?>