<?php
class Cliente{
    private $rutCliente;
    private $nombreCliente;
    private $apellidoPaternoCliente;
    private $apellidoMaternoCliente; 
    private $telefonoCliente;
    private $correoElectronico;

    public function __construct(){
        $this->db = Database::connect();
    }

    function getRutCliente(){
        return $this->rutCliente;
    }

    function getNombreCliente() {
        return $this->nombreCliente;
    }

    function getApellidoPaternoCliente() {
        return $this->apellidoPaternoCliente;
    }

    function getApellidoMaternoCliente() {
        return $this->apellidoMaternoCliente;
    }

    function getTelefonoCliente() {
        return $this->telefonoCliente;
    }

    function getCorreoElectronico() {
        return $this->correoElectronico;
    }

    function setRutCliente($rutCliente) {
        $this->rutCliente = $this->db->real_escape_string($rutCliente);
    }

    function setNombreCliente($nombreCliente) {
        $this->nombreCliente = $this->db->real_escape_string($nombreCliente);
    }

    function setApellidoPaternoCliente($apellidoPaternoCliente) {
        $this->apellidoPaternoCliente = $this->db->real_escape_string($apellidoPaternoCliente);
    }

    function setApellidoMaternoCliente($apellidoMaternoCliente) {
        $this->apellidoMaternoCliente = $this->db->real_escape_string($apellidoMaternoCliente);
    }

    function setTelefonoCliente($telefonoCliente) {
        $this->telefonoCliente = $this->db->real_escape_string($telefonoCliente);
    }

    function setCorreoElectronico($correoElectronico) {
        $this->correoElectronico = $this->db->real_escape_string($correoElectronico);
    }

    public function getAll(){
        $clientes = $this->db->query ("SELECT * FROM cliente ORDER BY id ASC");
        return $clientes;
    }

    public function save(){
        $sql = "INSERT INTO cliente (RUT_CLIENTE, NOMBRE_CLIENTE, APELLIDO_PATERNO_CLIENTE, APELLIDO_MATERNO_CLIENTE, TELEFONO_CLIENTE, CORREO_ELECTRONICO) VALUES('{$this->getRutCliente()}', '{$this->getNombreCliente()}', '{$this->getApellidoPaternoCliente()}', '{$this->getApellidoMaternoCliente()}', '{$this->getTelefonoCliente()}', '{$this->getCorreoElectronico()}');";

        $save = $this->db->query($sql);
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function delete(){
        $sql = "DELETE FROM cliente WHERE RUT_CLIENTE = '{$this->getRutCliente()}'";
        $delete = $this->db->query($sql);
        $result = false;
        if($delete){
            $result = true;
        }
        return $result;
    }




}