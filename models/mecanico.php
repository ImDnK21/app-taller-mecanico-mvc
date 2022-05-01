<?php

Class Mecanico{
    private $rutMecanico;
    private $nombreMecanico;
    private $apellidoMecanico;
    private $correoElectronico;
    private $telefoneMecanico;

    public function __construct() {
        $this->db = Database::connect();
    }

    function getRutMecanico() {
        return $this->rutMecanico;
    }

    function getNombreMecanico() {
        return $this->nombreMecanico;
    }

    function getApellidoMecanico() {
        return $this->apellidoMecanico;
    }

    function getCorreoElectronico() {
        return $this->correoElectronico;
    }

    function getTelefoneMecanico() {
        return $this->telefoneMecanico;
    }

    function setRutMecanico($rutMecanico) {
        $this->rutMecanico = $this->db->real_escape_string($rutMecanico);
    }

    function setNombreMecanico($nombreMecanico) {
        $this->nombreMecanico = $this->db->real_escape_string($nombreMecanico);
    }

    function setApellidoMecanico($apellidoMecanico) {
        $this->apellidoMecanico = $this->db->real_escape_string($apellidoMecanico);
    }

    function setCorreoElectronico($correoElectronico) {
        $this->correoElectronico = $this->db->real_escape_string($correoElectronico);
    }

    function setTelefoneMecanico($telefoneMecanico) {
        $this->telefoneMecanico = $this->db->real_escape_string($telefoneMecanico);
    }

    public function getAll() {
        $sql = "SELECT * FROM mecanico";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getOne() {
        $sql = "SELECT * FROM mecanico WHERE rutMecanico = '$this->rutMecanico'";
        $result = $this->db->query($sql);
        return $result;
    }

    public function save() {
        $sql = "INSERT INTO mecanico VALUES ('$this->rutMecanico', '$this->nombreMecanico', '$this->apellidoMecanico', '$this->correoElectronico', '$this->telefoneMecanico')";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }
}