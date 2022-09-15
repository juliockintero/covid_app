<?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$passworddb = "";
$db="proyecto_covid";

$conn =  new mysqli($servername, $username, $passworddb,$db);
if ($conn->connect_errno) {
echo "<script>
alert('NO HAY CONEXION CON EL SERIVOR');
window.location.href='../index.php';
</script>";
  //Sdie("Connection failed: " . $conn->connect_errno);
          }
 ?>
