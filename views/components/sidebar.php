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
