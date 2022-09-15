<?php
require_once('conexion_bd.php');
session_start();

// datos usuario

$nombres=$_POST["nombres"];
$apellidos=$_POST["apellidos"];
$rol=$_POST["rol"];
$user=$_POST["user"];
$password=$_POST["password"];

// datos de imagen

$nombre_img = $_FILES['imagen']['name'];
$tamano_img = $_FILES['imagen']['size'];
$tipo_img = $_FILES['imagen']['type'];
$carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/App/Imgs/';


switch ($rol) {
  case 'Estandar':
    $rol=2;
    break;

  case'Administrador':
    $rol=1;
    break;
}


//Move the image
if ($tamano_img<1200000) {

  //Selecting data type
  if ($tipo_img=="image/jpg" || $tipo_img=="image/png" || $tipo_img=="image/jpeg") {
    $ext=pathinfo($nombre_img,PATHINFO_EXTENSION);
    $fullpath_img='../Imgs/'.$nombres.$apellidos.'.'.$ext;
    $b=move_uploaded_file($_FILES['imagen']['tmp_name'],$fullpath_img);


// Insertar en la base de datos
    if ($b==TRUE) {
      // SQL to create Full User with img.
      $query="insert into usuarios (id,usuario,contrasena,id_rol,nombres,apellidos,img,estado) VALUES('null','$user','$password','$rol','$nombres','$apellidos','$fullpath_img','Activo')";
      $datos = mysqli_query($conn, $query);
        if ($datos==TRUE) {
          $_SESSION['insert']=true;
          header("Location:../Home/Usuarios.php?insert=1");
        }else {
          $_SESSION['insert']=false;
          echo "<script>console.log('Error en ejecucion de la consulta');</script>";
          header("Location:../Home/Usuarios.php?insert=0");
              }
    }else {
      echo "<script>console.log('Error al subir la imagen al servidor');</script>";
    }




  }

}

 ?>
