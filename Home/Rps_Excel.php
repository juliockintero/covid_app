<!DOCTYPE html>
<?php
error_reporting(0);
session_start();
if($_SESSION['acceso'] == TRUE && $_SESSION['rol'] == 1){
   }else {
     echo "<script>alert('Ops');
     window.location.href='../Home/Home.php';
     </script>";
  }


 ?>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <meta charset="utf-8">
    <script src="../myown.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Usuarios</title>
  </head>


  <body>
    <?php

    // -------------------Calling Database connection.-----------------
    include('modal_cambiar_img.php');
    require("../CRUD/conexion_bd.php");
    session_start();


    // ----------------------SQl with the data of the user logged--------------------------
    $query_datos_user="SELECT usuarios.id,usuarios.nombres, usuarios.apellidos,usuarios.img, roles.nombre from usuarios INNER JOIN roles on usuarios.id_rol = roles.id WHERE usuarios.id='".$_SESSION['id']."'";
    $datos_user = mysqli_query($conn, $query_datos_user);
    $row_datos_user = mysqli_fetch_assoc($datos_user);


    // ----------------------SQl with all data of table users--------------------------
    $query_all_users="select usuarios.id, usuarios.nombres,usuarios.apellidos,usuarios.usuario, roles.nombre as rol,usuarios.estado from usuarios INNER JOIN roles on usuarios.id_rol = roles.id";
    $all_users = mysqli_query($conn, $query_all_users);

    ?>
    <div class="container-fluid" >
      <div class="row  " style="
          height: 750px;
      ">
    <!---Barra de la izquierda  ------>
    <?php include('Barra_izquierda.php')  ?>
  <! --- Central--->
        <div class="col-12 col-sm-10 col-md-4 col-lg-9">
          <div class="container mt-5" style="
        width: 100%;">
        <h3 class="m-4"> Generar reportes Xls </h3>
        <form action="../Reports/Users_list.php"class="form-inline">
        <div class="form-group mx-sm-3 ">
          <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" required style="width:450px">
          <option value="1">Usuarios</option>
        </select>
        </div>
        <button type="submit" class="btn btn-success">Generar</button>
        </form>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script type="text/javascript">

</script>

</html>
