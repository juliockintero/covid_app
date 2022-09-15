<?php

require_once("conexion_bd.php");
$idCaso= $_REQUEST['idCaso'];
$sql_delete_caso="DELETE FROM casos WHERE casos.id = '$idCaso'";
$datos_delete = mysqli_query($conn, $sql_delete_caso);

if ($datos_delete==TRUE) {
  Header('Location: ../Home/List_Casos.php?insertCaso=1');
}else {
  Header('Location: ../Home/List_Casos.php?insertCaso=0');
}
 ?>