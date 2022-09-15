<?php
require_once ('../CRUD/conexion_bd.php');
$estado=$_POST['estado'];
$profesion=$_POST['profesion'];
$sexo=$_POST['sexo'];
$tipo_prueba=$_POST['tipo_prueba'];
$comunas=$_POST['comuna'];
$conglomerado=$_POST['conglomerado'];
$eps=$_POST['eps'];
$fecha_inicio=$_POST['fecha_inicio'];
$fecha_fin=$_POST['fecha_fin'];
$edad=$_POST['edad'];
$contactos=$_POST['contactos'];
$rh=$_POST['rh'];

$sql_add_case="INSERT INTO casos (id,sexo,edad,rh,contactos,profesion,id_estado,id_tipo_prueba,id_comunas,id_conglomerado,id_eps,fecha_inicio_aislamiento,fecha_fin_aislamiento)
VALUES('','$sexo','$edad','$rh','$contactos','$profesion','$estado','$tipo_prueba','$comunas','$conglomerado','$eps','$fecha_inicio','$fecha_fin')";
$data_add_case=mysqli_query($conn, $sql_add_case);

if ($data_add_case==TRUE) {
  Header('Location:../Home/Home.php');
}else {
  echo "error";
}
 ?>

 ?>
