<!DOCTYPE html>
<?php
error_reporting(0);
session_start();
if ($_SESSION['acceso'] == TRUE && $_SESSION['rol'] == 1) {
} else {
  echo "<script>alert('Ops');
     window.location.href='../Home/Home.php';
     </script>";
}
?>
<html lang="en" dir="ltr">

<head>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="sidebar.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../myown.js"></script>


  <meta charset="utf-8">

  <title>Añadir usuario</title>
</head>
<! <header class="navbar navbar-expand navbar-dark flex-column flex-md-row bd-navbar" style="
    background-color: #4c2d7a;
    height: 64px;
">
  </header>

  <body>

    <?php

    session_start();
    require_once("../CRUD/conexion_bd.php");
    include('modal_cambiar_img.php');


    // ----------------------SQl with the data of the user logged--------------------------
    $query_datos_user = "SELECT usuarios.id,usuarios.nombres, usuarios.apellidos,usuarios.img, roles.nombre from usuarios INNER JOIN roles on usuarios.id_rol = roles.id WHERE usuarios.id='" . $_SESSION['id'] . "'";
    $datos_user = mysqli_query($conn, $query_datos_user);
    $row_datos_user = mysqli_fetch_assoc($datos_user);
    ?>
    <div class="container-fluid">
      <div class="row  " style="
          height: 750px;
      ">

        <! --- Barra de la izquierda --->
          <?php include('Barra_izquierda.php') ?>

          <div class="col-12 col-sm-10 col-md-4 col-lg-9">
            <div id="id_insertok" class="alert alert-success" role="alert" style="position: absolute;
        width: 25%;
        top: 20px;
        left: 75%;
        display:none"><strong>
                Registro creado con exito.</strong>
            </div>
            <div id="id_inserterror" class="alert alert-danger div_insert_alert" role="alert" style="position: absolute;
        width: 25%;
        top: 20px;
        left: 75%;
        display:none"> <strong>
                No se pudo crear el registro. </strong></div>
            <div class="container mt-3"  style="width: 80%;">
              <!-- FORMULARIO DE CREAR USUARIO-->
              <div style="background-color: #28a745; padding:10px; border-radius:5px ; box-shadow: 2px 2px 5px #999;" class=" mb-3">
                <h5 class="ml-3 text-white" style="margin-bottom: 0px;">Crear Usuario </h5>
              </div>
              <form class=text-dark" method="POST"  style="padding:24px; border-radius:5px; background-color:
#dfe8e3 ;box-shadow: 2px 2px 5px #999;" enctype="multipart/form-data" action="../CRUD/crear_user.php">
              
                <div class="form-group">
                  <label class="text-left">Nombres:</label>
                  <input type="text" required="required" class="form-control" name="nombres" aria-describedby="emailHelp" placeholder="Ingrese Nombres">

                </div>
                <div class="form-group">
                  <label class="text-left">Apellidos:</label>
                  <input type="text" required="required" class="form-control" name="apellidos" aria-describedby="emailHelp" placeholder="Ingrese Apellidos">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect2">Rol:</label>
                  <select class="form-control" name="rol" id="exampleFormControlSelect2">
                    <option>Estandar</option>
                    <option>Administrador</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="text-left">Usuario:</label>
                  <input type="text" required="required" class="form-control" name="user" aria-describedby="emailHelp" placeholder="Ingrese Usuario">
                </div>
                <div class="form-group">
                  <label class="text-left">Contraseña:</label>
                  <input type="password" required="required" class="form-control" aria-describedby="emailHelp" placeholder="Ingrese Contraseña">
                </div>
                <div class="form-group">
                  <label class="text-left">Confirmacion de Contraseña:</label>
                  <input type="password" required="required" class="form-control" name="password" aria-describedby="emailHelp" placeholder="Ingrese Contraseña">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlFile1">Imagen</label>
                  <input type="file" required="required" name="imagen" class="form-control-file">
                </div>
                <div class="form-group text-center">
                  <button type="submit" class="btn btn-primary  text-center">Crear Usuario</button>
                </div>

              </form>
              <!--      <div id="id_inserterror" class="alert alert-danger div_insert_alert" role="alert">
        No se pudo crear el registro.
      </div>--->

            </div>

          </div>

      </div>
    </div>
    <script type="text/javascript">
     
      
      /* coding  in js to show pop up alert if the sql was success or not*/
      var insert = '<?php echo $_GET['insert']; ?>';
      if (insert == '1') {
        mostrar_div_success();
        console.log(insert);
      } else if (insert == '0') {
        mostrar_div_error();
      }

      function mostrar_div_success() {
        $("#id_insertok").slideDown(400);
        setTimeout('ocultar_div_success()', 2000);
      }

      function ocultar_div_success() {
        $("#id_insertok").slideUp(400);
      }

      function mostrar_div_error() {
        $("#id_inserterror").slideDown(400);
        setTimeout('ocultar_div_error()', 2000);
      }

      function ocultar_div_error() {
        $("#id_inserterror").slideUp(400);
      }
    </script>
  </body>

</html>