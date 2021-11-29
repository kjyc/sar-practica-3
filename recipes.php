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
echo "Connected successfully";

$sql = "SELECT id, autor, nombre, preparacion FROM receta";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Autor: " . $row["autor"]. " " ."Nombre:" . $row["nombre"]. "Preparacion". $row["preparacion"] . "<br>";
  }
} else {
  echo "0 results";
}

mysqli_close($conn); 

?>