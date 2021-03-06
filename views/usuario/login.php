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
                            <button type="submit" button is-link">Iniciar sesión</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
