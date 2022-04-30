<?php

Class Vehiculo {

    private  $patenteVehiculo;
    private  $marcaVehiculo;
    private $modeloVehiculo;
    private  $anioVehiculo;
    private $tipoCombustible;
    private $transmision;
    private $colorPrimario;
    private $numeroChasis;
    private $kilometraje;
    private $tipoVehiculo;
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    function getPatenteVehiculo() {
        return $this->patenteVehiculo;
    }

    function getMarcaVehiculo() {
        return $this->marcaVehiculo;
    }

    function getModeloVehiculo() {
        return $this->modeloVehiculo;
    }

    function getAnioVehiculo() {
        return $this->anioVehiculo;
    }

    function getTipoCombustible() {
        return $this->tipoCombustible;
    }

    function getTransmision() {
        return $this->transmision;
    }

    function getColorPrimario() {
        return $this->colorPrimario;
    }

    function getNumeroChasis() {
        return $this->numeroChasis;
    }

    function getKilometraje() {
        return $this->kilometraje;
    }

    function getTipoVehiculo() {
        return $this->tipoVehiculo;
    }

    function setPatenteVehiculo($patenteVehiculo) {
        $this->patenteVehiculo = $this->db->real_escape_string($patenteVehiculo);
    }

    function setMarcaVehiculo($marcaVehiculo) {
        $this->marcaVehiculo = $this->db->real_escape_string($marcaVehiculo);
    }

    function setModeloVehiculo($modeloVehiculo) {
        $this->modeloVehiculo = $this->db->real_escape_string($modeloVehiculo);
    }

    function setAnioVehiculo($anioVehiculo) {
        $this->anioVehiculo = $this->db->real_escape_string($anioVehiculo);
    }

    function setTipoCombustible($tipoCombustible) {
        $this->tipoCombustible = $this->db->real_escape_string($tipoCombustible);
    }

    function setTransmision($transmision) {
        $this->transmision = $this->db->real_escape_string($transmision);
    }

    function setColorPrimario($colorPrimario) {
        $this->colorPrimario = $this->db->real_escape_string($colorPrimario);
    }

    function setNumeroChasis($numeroChasis) {
        $this->numeroChasis = $this->db->real_escape_string($numeroChasis);
    }

    function setKilometraje($kilometraje) {
        $this->kilometraje = $this->db->real_escape_string($kilometraje);
    }

    function setTipoVehiculo($tipoVehiculo) {
        $this->tipoVehiculo = $this->db->real_escape_string($tipoVehiculo);
    }
    
    public function getVehiculos(){
        $sql = "SELECT * FROM vehiculo";
        $vehiculos = $this->db->query($sql);
        return $vehiculos;
    }

    public function save() {
        $sql = "INSERT INTO vehiculo VALUES(NULL, '{$this->patenteVehiculo}', '{$this->marcaVehiculo}', '{$this->modeloVehiculo}', '{$this->anioVehiculo}', '{$this->tipoCombustible}', '{$this->transmision}', '{$this->colorPrimario}', '{$this->numeroChasis}', '{$this->kilometraje}', '{$this->tipoVehiculo}')";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

}