<!DOCTYPE html>
<?php
error_reporting(0);
session_start();
if($_SESSION['acceso'] != 'TRUE' ){
  echo "<script>alert('Ops, Inicie sesion para validar su usuario.');
  window.location.href='../index.php';
  </script>";  }


 ?>
<htmldsdsd lang="en" dir="ltr">
  <head>

    <link rel="shortcut icon" href="https://commons.wikimedia.org/wiki/File:SARS-CoV-2_without_background.png">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="sidebar.css" rel="stylesheet" media="screen"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../myown.js"></script>
    <meta charset="utf-8">

    <title>Casos</title>
  </head>
  <body>

          <?php


          require_once("../CRUD/conexion_bd.php");


          // ----------------------SQl with the data of the user logged--------------------------
          $query_datos_user="SELECT usuarios.id,usuarios.nombres, usuarios.apellidos,usuarios.img, roles.nombre from usuarios INNER JOIN roles on usuarios.id_rol = roles.id WHERE usuarios.id='".$_SESSION['id']."'";
          $datos_user = mysqli_query($conn, $query_datos_user);
          $row_datos_user = mysqli_fetch_assoc($datos_user);
        include('modal_cambiar_img.php');
          ?>
          <div class="container-fluid" >
            <div class="row  " style="
                height: 750px;
            ">
          <!--- Barra de la izquierda --->
          <?php include('Barra_izquierda.php') ?>
          <! --- Central--->
          <div class="col-12   col-md-9 ">

            <div class="container mt-3" style="
          
          width: 80%;">
            <?php include('Formulario_casos.php') ?>
            </div>

          </div>

        </div>
      </div>
  </body>
<script type="text/javascript">
 var rol= '<?php echo $_SESSION['rol']; ?>'
 console.log(rol)
 if (rol==2){
    document.getElementById("soloadmin").style.display = "none";
    console.log(rol);
  }else if(rol==1){
    $("#soloadmin").show();
  }

function over(x) {
  x.src="http://localhost/App/Imgs/Refresh.png"
}
function out(x) {
  x.src="https://image.shutterstock.com/image-vector/profile-picture-vector-260nw-404138239.jpg"
}
</script>

</html>
