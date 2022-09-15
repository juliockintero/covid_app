<?php

require_once("conexion_bd.php");
$idUser= $_REQUEST['id'];

$nombres=$_POST["nombres"];
$apellidos=$_POST["apellidos"];
$rol=$_POST["rol"];
$user=$_POST["user"];

switch ($rol) {
  case 'Estandar':
    $rol=2;
    break;

  case'Administrador':
    $rol=1;
    break;
}

$sql_modify_user="UPDATE usuarios SET nombres = '$nombres', apellidos ='$apellidos', id_rol='$rol',usuario='$user' WHERE usuarios.id = '$idUser'";
$data_modify = mysqli_query($conn, $sql_modify_user);

if ($data_modify==TRUE) {
  Header('Location: ../Home/Consultar.php');
}else {
  echo "error";
}
 ?>
