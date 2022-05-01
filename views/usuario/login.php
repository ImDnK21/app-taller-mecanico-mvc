<?php
session_start();
// include_once("views/components/header.php");
// require_once('config/parameters.php');
// require_once('config/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>login</title>
</head>
<body>
<div class="container py-3">
    <div class="row justify-content-center">
        <div class="col-6">
            <?php if (isset($_SESSION['error_message']) && isset($_SESSION['error_type'])) { ?>
            <article class="message is-<?= $_SESSION['error_type'] ?>">
                <div class="message-body">
                <?= $_SESSION['error_message'] ?>
                </div>
            </article>
            <?php } unset($_SESSION['error_message']); unset($_SESSION['error_type']); ?>
            <form action="<?= APP_URL . 'usuario/login' ?>" method="POST" class="card">
                <div class="card-header">
                    <p class="card-header-title">
                        Inicio de sesión
                    </p>
                </div>
                <div class="card-content">
                    <div class="field">
                        <label class="label">Correo electrónico:</label>
                        <div class="control">
                            <input type="email" name="email" class="input">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Contraseña:</label>
                        <div class="control">
                            <input type="password" name="password" class="input">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <button class="button is-link">Iniciar sesión</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>







