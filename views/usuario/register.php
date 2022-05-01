
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registrar usuario</title>
</head>
<body>
<div class="container py-3">
    <div class="row justify-content-center">
        <div class="col-6">
        <?php if (isset($_SESSION['signup_message']) && isset($_SESSION['signup_message_type'])): ?>
            <article class="message is-<?= $_SESSION['signup_message_type'] ?>">
                <div class="message-body">
                <?= $_SESSION['signup_message'] ?>
                </div>
            </article>
            <?php unset($_SESSION['signup_message']); unset($_SESSION['signup_message_type']); endif; ?>
            <form action="<?= APP_URL . 'usuario/save' ?>" method="POST" class="card">
                <div class="card-header">
                    <p class="card-header-title">
                        Registro de nuevo usuario
                    </p>
                </div>
                <div class="card-content">
                    <div class="field">
                        <label class="label">Orden de trabajo:</label>
                        <div class="control">
                            <input type="text" name="idOT" class="input">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Nombre:</label>
                        <div class="control">
                            <input type="text" name="nombre" class="input">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Apellido:</label>
                        <div class="control">
                            <input type="text" name="apellido" class="input">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Correo electrónico:</label>
                        <div class="control">
                            <input type="text" name="email" class="input">
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
                            <button class="button is-link">Registrarse</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>


