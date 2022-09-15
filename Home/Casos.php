<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta charset="utf-8">

    <title>Casos</title>
  </head>
  <!
  <header class="navbar navbar-expand navbar-dark flex-column flex-md-row bd-navbar" style="
    background-color: #4c2d7a;
    height: 64px;
"></header>

  <body>
    <?php
    session_start();
    require_once("../CRUD/conexion_bd.php");


    // ----------------------SQl with the data of the user logged--------------------------
    $query_datos_user="SELECT usuarios.id,usuarios.nombres, usuarios.apellidos,usuarios.img, roles.nombre from usuarios INNER JOIN roles on usuarios.id_rol = roles.id WHERE usuarios.id='".$_SESSION['id']."'";
    $datos_user = mysqli_query($conn, $query_datos_user);
    $row_datos_user = mysqli_fetch_assoc($datos_user);
    ?>
    <div class="container-fluid" >
      <div class="row  " style="
          height: 750px;
      ">
    <! --- Barra de la izquierda --->
    <div class="col-12   col-md-3 col-lg-3 text-white d-block" style="background-color:
#563d7c;">
      <div class="row mt-4 ml-1 h-20">
        <img src="<?php if ($row_datos_user['img']=="") {
          echo "https://image.shutterstock.com/image-vector/profile-picture-vector-260nw-404138239.jpg";
        }else{
          echo $row_datos_user['img'];
        } ?>" style="border-radius:50%; height:50px; width:50px;"></img>
        <div  class=""id="informacion del usuario" style="margin-left:10%;">
          <?php echo $row_datos_user['nombres']; ?><br>
          <?php echo $row_datos_user['apellidos'];?><br>
          <?php echo $row_datos_user['nombre'];?>
        </div>

      </div>
      <hr style="width:100%;text-align:left;border-color:white;">
      <div class="row mt-2 ml-1 mb-2 text-center">
        <a href="Home.php" style="color:white"><i class="fas fa-home" style="margin-top: auto;
          margin-right: 10px;
          margin-bottom: auto;
          margin-left: 10px;
          "></i>Home
        </a>
      </div>
      <div class="row mt-2 ml-1 mb-2 text-center">
        <a href="Home.php" style="color:white"><i class="fas fa-search" style="margin-top: auto;
          margin-right: 10px;
          margin-bottom: auto;
          margin-left: 10px;
          "></i>Casos
        </a>
      </div>
      <div class="row ml-1 mt-2 ml-1 mb-2 text-center">
        <a href="Usuarios.php" style="color:white"><i class="fas fa-user" style="margin-top: auto;
           margin-right: 10px;
           margin-bottom: auto;
           margin-left: 10px;

           "></i>Agregar Usuario
         </a>
      </div>
      <div class="row mt-2 ml-1 mb-2 text-center">
        <a href="Consultar.php" style="color:white"><i class="fas fa-search" style="margin-top: auto;
           margin-right: 10px;
           margin-bottom: auto;
           margin-left: 10px;

           "></i>Usuarios
         </a>
      </div>
      <div class="row mt-2 ml-1 mb-2 text-center">
        <a href="#" onclick="cerrar_sessionjs()"
value="Activar Función" style="color:white"><i class="fas fa-sign-out-alt" style="margin-top: auto;
           margin-right: 10px;
           margin-bottom: auto;
           margin-left: 10px;
           "></i>Salir
         </a>
      </div>
    </div>
    <! --- Central--->
    <div class="col-12   col-md-9 ">
      <div class="container mt-3" style="
    border: 3px solid #745a9b;
    border-radius:22px;
    background-color: #745a9b;
    width: 80%;">
      <?php include('Formulario_casos.php') ?>
      </div>

    </div>

  </div>
</div>
<script type="text/javascript">
function show() {
  $("#modal_cambiar_img").modal('show');
  alert('clik');
}
function over(x) {
  x.src="http://localhost/App/Imgs/Refresh.png"
}
function out(x) {
  x.src="https://image.shutterstock.com/image-vector/profile-picture-vector-260nw-404138239.jpg"
}
function cerrar_sessionjs()
{
  if (confirm('¿Esta seguro que desea cerrar sesion?')) {
  // Save it!
  window.location.href = '../CRUD/cerrar_session.php';
} else {
  // Do nothing!
    window.location.href = '#';
};
}
</script>
  </body>
</html>
