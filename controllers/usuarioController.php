<?php 
require_once 'models/usuario.php';

class usuarioController {
    public function index() {
        // require_once 'views/usuario/index.php';
        //echo "Controlador Usuarios, Acción index";
    }

    public function inicio() {
        require_once 'views/usuario/login.php';
    }

    public function registro() {
        require_once 'views/usuario/register.php';
    }

    public function save() {
        if (isset($_POST)) {
            $id = isset($_POST['idOT']) ? $_POST['idOT'] : false;
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            if ($id && $nombre && $apellido && $email && $password) {
                $usuario = new Usuario();
                $usuario->setId($id);
                $usuario->setNombre($nombre);
                $usuario->setApellido($apellido);
                $usuario->setEmail($email);
                $usuario->setPassword($password);

                if ($usuario->save()) {
                    $_SESSION['signup_message'] = 'Usuario creado correctamente';
                    $_SESSION['signup_message_type'] = 'success';
                } else {
                    $_SESSION['signup_message'] = 'Error al crear el usuario';
                    $_SESSION['signup_message_type'] = 'danger';
                }
            } else {
                $_SESSION['signup_message'] = 'Todos los campos son obligatorios';
                $_SESSION['signup_message_type'] = 'danger';
            }
        } else {
            $_SESSION['signup_message'] = 'Las Contraseñas no coinciden';
            $_SESSION['signup_message_type'] = 'danger';
        }
        header("Location:" . APP_URL . 'usuario/registro');
    }

    public function login() {
        if (isset($_POST) && !empty($_POST)) {
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);            
            $usuario->setPassword($_POST['password']);
            $identity = $usuario->login();            

            if ($identity && is_object($identity)) {
                $_SESSION['identity'] = $identity;
                if ($identity->rol == 'admin') {
                    $_SESSION['admin'] = true;
                }
                header('Location:' . APP_URL);
            } else {
                $_SESSION['error_message'] = 'Error';
                $_SESSION['error_type'] = 'warning';
                header('Location:' . APP_URL . 'usuario/login');
            }
        }
    }
	
	public function logout(){
		if(isset($_SESSION['identity'])){
			unset($_SESSION['identity']);
		}
		
		if(isset($_SESSION['admin'])){
			unset($_SESSION['admin']);
		}
		
		header("Location:".APP_URL);
	}
} // fin clase
