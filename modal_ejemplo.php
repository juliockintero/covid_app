<?php

//
$nombre_img = $_FILES['imagen']['name'];
$tamano_img = $_FILES['imagen']['size'];
$tipo_img = $_FILES['imagen']['type'];
$carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/App/Imgs/';

echo $nombre_img;
echo $tamano_img;
echo $tipo_img;

//Move the image
if ($tamano_img<1200000) {

  //Selecting data type
  if ($tipo_img=="image/jpg" || $tipo_img=="image/png" || $tipo_img=="image/jpeg") {
    echo "selecciono imagen correcta";
    $ext=pathinfo($nombre_img,PATHINFO_EXTENSION);
    $fullpath_img='../Imgs/'.$nombres.$apellidos.'.'.$ext;
    $b=move_uploaded_file($_FILES['imagen']['tmp_name'],$fullpath_img);

    if ($b==TRUE) {
      echo "moved";
      $query="";
      $datos = mysqli_query($conn, $query);
        if ($datos==TRUE) {
          $_SESSION['insert']=true;
          header("Location:../Home/Home.php");
        }else {
          $_SESSION['insert']=false;
          echo "<script>console.log('Error en ejecucion de la consulta');</script>";
              }
    }else {
      echo "<script>console.log('Error al subir la imagen al servidor');</script>";
    }
    // SQL to create Full User with img.



  }else{
    echo "no selecciono una imga correcta";
  }

}require_once('conexion_bd.php');
$id=$_POST['id'];
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
//
$nombre_img = $_FILES['imagen']['name'];
$tamano_img = $_FILES['imagen']['size'];
$tipo_img = $_FILES['imagen']['type'];
$carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/App/Imgs/';

//Move the image
if ($tamano_img<1200000) {

  //Selecting data type
  if ($tipo_img=="image/jpg" || $tipo_img=="image/png" || $tipo_img=="image/jpeg") {
    echo "selecciono imagen correcta";
    $ext=pathinfo($nombre_img,PATHINFO_EXTENSION);
    $fullpath_img='../Imgs/'.$nombres.$apellidos.'.'.$ext;
    $b=move_uploaded_file($_FILES['imagen']['tmp_name'],$fullpath_img);

    if ($b==TRUE) {
      echo "moved";
      $query="";
      $datos = mysqli_query($conn, $query);
        if ($datos==TRUE) {
          $_SESSION['insert']=true;
          header("Location:../Home/Home.php");
        }else {
          $_SESSION['insert']=false;
          echo "<script>console.log('Error en ejecucion de la consulta');</script>";
              }
    }else {
      echo "<script>console.log('Error al subir la imagen al servidor');</script>";
    }
    // SQL to create Full User with img.



  }else{
    echo "no selecciono una imga correcta";
  }

}
 ?>
