<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./resources/css/index.css">
    <link rel="stylesheet" href="./resources/css/global.css">
    <script src="./resources/js/index.js"></script>
    <title>Inicio</title>
</head>

<body>
    <div class="index-container">
        <div class="btn-container">
            <button id="btn-sign-in">Iniciar sesión</button>
            <button id="btn-sign-up">Registrarse</button>
        </div>
        <div id="signin" class="form-container">
            <h1 class="title">Sign In</h1>
            <form id="signInForm" class="form" action="index.php" method="POST">
                <div class="row">
                    <input class="input" type="text" name="si-email" id="si-email" placeholder="Correo">
                </div>
                <div class="row">
                    <input class="input" type="password" name="si-password" id="si-password" placeholder="Contraseña">
                </div>
                <div class="row">
                    <input class="input" type="submit" id="si-submit" name="si-submit" value="Iniciar sesión">
                </div>
            </form>
        </div>
        <div id="signup" class="form-container">
            <h1 class="title">Sign Up</h1>
            <form id="signUpForm" class="form" action="index.php" method="POST" onsubmit="return validateSUSubmit()">
                <div class="row">
                    <input class="input" type="text" name="su-name" id="su-name" placeholder="Nombre">
                </div>
                <div class="row">
                    <input class="input" type="text" name="su-lastname" id="su-lastname" placeholder="Apellido/s">
                </div>
                <div class="row">
                    <input class="input" type="text" name="su-email" id="su-email" placeholder="Correo">
                </div>
                <div class="row">
                    <input class="input" type="password" name="su-password" id="su-password" placeholder="Contraseña">
                </div>
                <div class="row">
                    <input class="input" type="password" name="su-password_" id="su-password_" placeholder="Repetir contraseña">
                </div>
                <div class="row">
                    <input class="input" type="submit" id="su-submit" name="su-submit" value="Registrarse">
                </div>
            </form>
        </div>
    </div>
</body>

</html>
<?

if (isset($_POST['si-submit'])) {
    header('location: index.php');
} else if (isset($_POST['su-submit'])) {
    $name = $_POST['su-name'];
    $lastname = $_POST['su-lastname'];
    $email = $_POST['su-email'];
    $password = $_POST['su-password'];
    $password_ = $_POST['su-password_'];

    $users = simplexml_load_file('./resources/xml/Users.xml');
    $user = $users->addChild('user');
    $user->addChild('name', $name);
    $user->addChild('lastname', $lastname);
    $user->addChild('email', $email);
    $user->addChild('password', $password);
    $users->asXML('./resources/xml/Users.xml');

    header('location: index.php');
}

?>