<?php 
require_once '../models/usuario.php';

class usuarioController {
    
        public function index() {
            require_once 'views/usuario/index.php';
        }
    
        public function registro() {
            require_once 'views/usuario/registro.php';
        }
    
        public function save() {
            if (isset($_POST)) {
                $idUsername = isset($_POST['idUsername']) ? $_POST['idUsername'] : false;
                $nombreusuario = isset($_POST['nombreUsuario']) ? $_POST['nombreUsuario'] : false;
                $apellidosUsuario = isset($_POST['apellidoUsuario']) ? $_POST['apellidoUsuario'] : false;
                $password = isset($_POST['password']) ? $_POST['password'] : false;
                $email = isset($_POST['email']) ? $_POST['email'] : false;
                $rol = isset($_POST['rol']) ? $_POST['rol'] : false;
                $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;
                $idOT = isset($_POST['idOT']) ? $_POST['idOT'] : false;

    
                if ($nombreusuario && $apellidoUsuario && $password && $email  ) {
                    $usuario = new Usuario();
                    $usuario->setNombre($nombre);
                    $usuario->setApellidoUsuario($apellidoUsuario);
                    $usuario->setEmail($email);
                    $usuario->setPassword($password);
    
                    $save = $usuario->save();
    
                    if ($save) {
                        $_SESSION['register'] = "complete";
                    } else {
                        $_SESSION['register'] = "failed";
                    }
                } else {
                    $_SESSION['register'] = "failed";
                }
            } else {
                $_SESSION['register'] = "failed";
            }
            header("Location:" . base_url . 'usuario/registro');
        }
    
        public function login() {
            if (isset($_POST)) {
                // Identificar al usuario
                // Consulta a la base de datos
                $usuario = new Usuario();
                $usuario->setEmail($_POST['email']);
                $usuario->setPassword($_POST['password']);    
                $identity = $nombreUsuario->login();
    
                if ($identity && is_object($identity)) {
                    $_SESSION['identity'] = $identity;
				
				if($identity->rol == 'admin'){
					$_SESSION['admin'] = true;
				}
				
			}else{
				$_SESSION['error_login'] = 'Identificación fallida !!';
			}
		
		}
		header("Location:".base_url);
	}
	
	public function logout(){
		if(isset($_SESSION['identity'])){
			unset($_SESSION['identity']);
		}
		
		if(isset($_SESSION['admin'])){
			unset($_SESSION['admin']);
		}
		
		header("Location:".base_url);
	}
	
} // fin clase
?>