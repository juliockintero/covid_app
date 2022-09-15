<?php

require_once("conexion_bd.php");
$idUser= $_REQUEST['id'];
$sql_disable_user="UPDATE usuarios SET estado = 'Inactivo' WHERE usuarios.id = '$idUser'";
$datos_disable = mysqli_query($conn, $sql_disable_user);

if ($datos_disable==TRUE) {
  Header('Location: ../Home/Consultar.php');
}else {
  echo "error";
}
 ?>
