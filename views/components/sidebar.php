<?php

require_once 'autoload.php';
require_once 'config/bd.php';
require_once 'config/parameters.php';
// require_once 'helpers/utils.php';
// require_once 'views/layout/header.php';
require_once 'views/components/sidebar.php';
require_once 'views/components/header.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/style.css">
	<title>login</title>
</head>
<body>
	
<aside id="lateral">
	<div id="login" class="block_aside">
		<?php if(!isset($_SESSION['identity'])): ?>
			<h3>Entrar a la web</h3>
			<form action="<?=APP_URL?>usuario/login" method="post">
				<label for="email">Email</label>
				<input type="email" name="email" />
				<label for="password">Contraseña</label>
				<input type="password" name="password" />
				<input type="submit" value="Enviar" />
			</form>
            
		<?php else: ?>
			<h3><?=$_SESSION['identity']->nombre_usuario ?> <?=$_SESSION['identity']->apellido_usuario ?></h3>
		<?php endif; ?>

		 <ul>
			<?php if(isset($_SESSION['admin'])): ?>
				<li><a href="<?=APP_URL?>categoria/index">Gestionar categorias</a></li>
				<li><a href="<?=APP_URL?>producto/gestion">Gestionar productos</a></li>
				<li><a href="<?=APP_URL?>pedido/gestion">Gestionar pedidos</a></li>
			<?php endif; ?>
			
			<?php if(isset($_SESSION['identity'])): ?>
				<li><a href="<?=APP_URL?>pedido/mis_pedidos">Mis pedidos</a></li>
				<li><a href="<?=APP_URL?>usuario/logout">Cerrar sesión</a></li>
			<?php else: ?> 
				<li><a href="<?=APP_URL?>usuario/registro">Registrate aqui</a></li>
			<?php endif; ?> 
		</ul> 
	</div>
</aside>
</body>
</html>



