<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $servername = "localhost";
    $username = "id18030377_root";
    $password = 'Da6~zk#l6<$Di&c+';
    $dbname = "id18030377_recipes";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    $sql ="SELECT * FROM `receta` NATURAL JOIN `ingredientes` WHERE `id`=".$id;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
        $row = $result->fetch_assoc();
        $preparacion = $row['preparacion'];
        echo('<div class="cabecera_receta">');
            echo('<div class="imgBox"><img src="../resources/images/'.$row['id'].'.jpg"></div>');
            echo('<span class="nombre">'. $row["nombre"].'</span><br>');
            echo('<span class="autor">'.'Autor: '. $row["autor"].'</span>');
        echo('</div><br>');
        echo('<form>
                <input type="button" value="Ver Receta" class="btnReceta" onclick="mostrarReceta('.$id.')">
        </form>');

    }
    mysqli_close($conn); 
}
?>