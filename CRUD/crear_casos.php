<?php
require_once("conexion_bd.php");

$estado=$_POST['estado'];
$profesion=$_POST['profesion'];
$sexo=$_POST['sexo'];
$edad=$_POST['edad'];
$contactos=$_POST['contactos'];
$rh=$_POST['rh'];
$tipo_prueba=$_POST['tipo_prueba'];
$comunas=$_POST['comunas'];
$conglomerado=$_POST['conglomerado'];
$eps=$_POST['eps'];
$inicio_aislamiento=$_POST['inicio_aislamiento'];
$fin_aislamiento=$_POST['fin_aislamiento'];
$sintomas=$_POST['sintomas'];
$coomorbilidad=$_POST['enfermedad'];


switch ($estado) {
    case 'Activo':
      $estado=1;
      break;
  
    case'Fallecido':
      $estado=2;
      break;

    case'Recuperado':
        $estado=3;
        break;
  }

  switch ($tipo_prueba) {
    case 'Antigenos':
      $tipo_prueba=1;
      break;
  
    case'PCR':
      $tipo_prueba=2;
      break;
    }
    switch ($conglomerado) {
        case 'Familiar':
          $conglomerado=1;
          break;
      
        case'Institucional':
          $conglomerado=2;
          break;
        case'Laboral':
            $conglomerado=3;
            break;
        case'Exterior':
            $conglomerado=4;
            break;
        }

$query_casos="insert into casos  VALUES('','$sexo','$edad','$rh','$contactos','$profesion','$estado','$tipo_prueba','$comunas','$conglomerado','$eps','$inicio_aislamiento','$fin_aislamiento','$coomorbilidad')";
$result_casos = mysqli_query($conn, $query_casos);


     


if($result_casos==TRUE){
  //$queryid="SELECT id FROM casos ORDER BY ID DESC LIMIT 1";
  //$idcasosql=mysqli_query($conn,$queryid);
  //$dato = mysqli_fetch_array($idcasosql);
  //$idcaso=$dato['id'];
  //$array_num= count($sintomas);
//for ($i = 0; $i < $array_num; ++$i){
 // $query_sintomas="insert into sintomas values('','$sintomas[$i]','$idcaso')";
  //$oksintomas= mysqli_query($conn, $query_sintomas);
  Header('Location: ../Home/Home.php');
//}
}else{
    echo "$query_sintomas";
}
