<?php
session_start();
if (isset($_SESSION['id'])) {
    header('Location: dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./resources/css/index.css">
    <link rel="stylesheet" href="./resources/css/global.css">
    <script src="./resources/js/index/index.js"></script>
    <script src="./resources/js/index/index-si.js"></script>
    <script src="./resources/js/index/index-su.js"></script>
    <title>Inicio</title>
</head>

<body>
    <div class="index-container">
        <div class="btn-container">
            <button id="btn-sign-in">Iniciar sesión</button>
            <button id="btn-sign-up">Registrarse</button>
        </div>
        <div id="sign-in" class="form-container">
            <h1 class="title">Sign In</h1>
            <form id="si-form" class="form" action="" method="POST">
                <div class="row">
                    <input class="input ipt" type="text" name="si-email" id="si-email" placeholder="Correo">
                </div>
                <div class="row">
                    <input class="input ipt" type="password" name="si-password" id="si-password" placeholder="Contraseña">
                </div>
                <div id="error">
                </div>
                <div class="row">
                    <input class="input btn" type="submit" id="si-submit" name="si-submit" value="Iniciar sesión">
                </div>
            </form>
        </div>
        <div id="sign-up" class="form-container">
            <h1 class="title">Sign Up</h1>
            <form id="su-form" class="form" action="" method="POST">
                <div class="row">
                    <input class="input ipt" type="text" name="su-name" id="su-name" placeholder="Nombre">
                </div>
                <div class="row">
                    <input class="input ipt" type="text" name="su-lastname" id="su-lastname" placeholder="Apellido/s">
                </div>
                <div class="row">
                    <input class="input ipt" type="text" name="su-email" id="su-email" placeholder="Correo">
                </div>
                <div class="row">
                    <input class="input ipt" type="password" name="su-password" id="su-password" placeholder="Contraseña">
                </div>
                <div class="row">
                    <input class="input ipt" type="password" name="su-password_" id="su-password_" placeholder="Repetir contraseña">
                </div>
                <div class="row">
                    <input class="input btn" type="submit" id="su-submit" name="su-submit" value="Registrarse">
                </div>
            </form>
        </div>
    </div>
</body>

</html>