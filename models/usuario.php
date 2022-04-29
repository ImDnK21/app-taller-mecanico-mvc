<?php

class Usuario {
    private $idUsername;
    private $nombreUsuario;
    private $apellidoUsuario;
    private $password;
    private $email;
    private $rol;
    private $imagen;
    private $idOT;
    private $db;

    public function __contruct(){
        $this->db = Database::connect();
    }

    public function getIdUsername() {
        return $this->idUsername;
    }

	function getNombreUsuario() {
		return $this->nombreUsuario;
	}

    function geApellidoUsuario(){
        return $this->apellidoUsuario;
    }

	function getPassword() {
		return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
	}

    function getEmail() {
        return $this->email;
    }

	function getRol() {
		return $this->rol;
	}

	function getImagen() {
		return $this->imagen;
	}

	function getIdOT() {
        return $this->idOT;
    }

    function setIdUsername($idUsername) {
        $this->idUsername = $idUsername;
    }

    function setNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
    }

    function setApellidoUsuario($apellidoUsuario) {
        $this->apellidoUsuario = $apellidoUsuario;
    }
	function setPassword($password) {
		$this->password = $password;
	}

	function setEmail($email) {
		$this->email = $this->db->real_escape_string($email);
	}



	function setRol($rol) {
		$this->rol = $rol;
	}

	function setImagen($imagen) {
		$this->imagen = $imagen;
	}

    function setIdOT($idOT) {
        $this->idOT = $idOT;
    }

	public function save(){
		$sql = "INSERT INTO usuario VALUES(NULL, '{$this->getIdUsername()}','{$this->getNombreUsuario()}','{$this->getApellidoUsuario}' '{$this->getIdOT()}', '{$this->getEmail()}', '{$this->getPassword()}','{$this->getImagen()}','{$this->getRol()}', 'user', null);";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	
	public function login(){
		$result = false;
		$email = $this->email;
		$password = $this->password;
		
		// Comprobar si existe el usuario
		$sql = "SELECT * FROM usuario WHERE email = '$email'";
		$login = $this->db->query($sql);
		
		
		if($login && $login->num_rows == 1){
			$usuario = $login->fetch_object();
			
			// Verificar la contraseña
			$verify = password_verify($password, $usuario->password);
			
			if($verify){
				$result = $usuario;
			}
		}
		
		return $result;
	}




}