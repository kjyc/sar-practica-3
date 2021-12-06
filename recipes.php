<!DOCTYPE html>
<html>
    <head>
        <title>Recetas</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="resources/css/recipes.css">
        <link rel="stylesheet" type="text/css" href="resources/css/global.css">
        <script type="text/javascript" src="./resources/js/recipes.js"></script>
    </head>
    <body>
        <h1>Receitas Para Sua Mae</h1>
        <div class="navbar">
          <a href="https://receitaparasuamae.000webhostapp.com/recipes.php">Inicio</a>
          <div class="dropdown">
            <button class="dropbtn">Gestionar Recetas 
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <a href="#">Nueva Receta</a>
              <a href="#">Eliminar Receta</a>
            </div>
          </div>
          <a class="signout" href="./resources/php/signout.php">Cerrar Sesión</a>
        </div>

<?php
$servername = "localhost";
$username = "id18030377_root";
$password = 'Da6~zk#l6<$Di&c+';
$dbname = "id18030377_recipes";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM receta NATURAL JOIN ingredientes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  $lastest_id = -1;
  while($row = $result->fetch_assoc()) {
    if($latest_id != $row['id']){
        echo('</div>');
        echo('<div class="receta" id="'.$row['id'].'">');
          echo('<div class="cabecera_receta">');
            echo('<div class="imgBox"><img src="./resources/images/'.$row['id'].'.jpg"><br></div>');
            echo('<span class="nombre">'. $row["nombre"].'</span><br>');
            echo('<span class="autor">'.'Autor: '. $row["autor"].'</span>');
          echo('</div>');
    }
     if($latest_id != $row['id']){   
        echo('<form>
                <input type="button" value="Ver Receta" class="btnReceta" onclick=mostrarReceta('.$row['id'].')>
        </form>');    
        echo('</div>');
     }
    
    $latest_id = $row['id'];
  }
  echo('</div>');
} else {
  echo "0 results";
}


mysqli_close($conn); 

?>
    </body>
</html>

