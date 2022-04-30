<?php
class Usuario {
    private $db;
    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $password;

    public function __construct() {
		$this->db = Database::connect();
	}

    function getId(){
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setApellido($apellido) {
        $this->apellido = $this->db->real_escape_string($apellido);
    }

    function setEmail($email) {
        $this->email = $this->db->real_escape_string($email);
    }

    function setPassword($password) {
        $this->password = $password;
    }

	public function save(){
		$sql = "INSERT INTO usuario (ID_USUARIO, NOMBRE_USUARIO, APELLIDO_USUARIO, CORREO_ELECTRONICO, PASSWORD) VALUES('{$this->getId()}', '{$this->getNombre()}', '{$this->getApellido()}', '{$this->getEmail()}', '{$this->getPassword()}');";

        echo $sql;

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
		$sql = "SELECT * FROM usuario WHERE correo_electronico = '$email'";
		$login = $this->db->query($sql);	
		
		if($login && $login->num_rows == 1){
			$usuario = $login->fetch_object();
			$verify = password_verify($password, $usuario->password);
			
			if($verify){
				$result = $usuario;
			}
		}
		
		return $result;
	}
}
