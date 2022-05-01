<?php 
require_once('config/parameters.php'); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if (!empty($title)) { print($title . ' - '); } echo APP_NAME ?></title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://bulma.io/vendor/fontawesome-free-5.15.2-web/css/all.min.css">
    <link rel="stylesheet" href="<?= APP_URL . 'css/bulma.min.css' ?>">
    <link rel="stylesheet" href="<?= APP_URL . 'assets/css/style.css' ?>">
</head>
<body>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="<?= APP_URL ?>">
                <img src="<?= APP_URL . 'img/logo_x28.png' ?>" height="28" style="margin-right: 1rem">
                <?= APP_NAME ?>
            </a>
            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbar">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <div id="navbar" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item">
                    Inicio
                </a>
            </div>
            <div class="navbar-end">
                <?php if(isset($_SESSION['userID'])) { ?>
                <a class="navbar-item">
                    <?= 'Bienvenido ' . $_SESSION['username'] ?> 
                </a>
                <a href="<?= APP_URL . 'logout' ?>" class="navbar-item">
                    Cerrar sesión
                </a>
                <?php } else { ?>
                <div class="navbar-item">
                    <div class="buttons">
                        <a href="<?= APP_URL . 'signup' ?>" class="button is-primary">
                            <strong>Registrarse</strong>
                        </a>
                        <a href="<?= APP_URL . 'login' ?>" class="button is-light">
                            Iniciar sesión
                        </a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </nav>
