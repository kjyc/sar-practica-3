<?php
session_start();
if (isset($_SESSION['id'])) {
    echo $_SESSION['email'];
} else {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            const btn = document.getElementById('btn-sign-out');
            btn.addEventListener('click', () => {
                window.location.replace('./resources/php/signout.php');
            });
        });
    </script>
</head>

<body>
    <h1>Hola!!</h1>
    <button id="btn-sign-out">Salir</button>
</body>

</html>