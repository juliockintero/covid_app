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
  <link rel="stylesheet" href="ssidebar.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../myown.js"></script>
  <title>Usuarios</title>
</head>
<! <header class="navbar navbar-expand navbar-dark flex-column flex-md-row bd-navbar" style="
    background-color: #4c2d7a;
    height: 64px;
">
  </header>

  <body">
    <?php

    // -------------------Calling Database connection.-----------------
    include('modal_cambiar_img.php');
    require("../CRUD/conexion_bd.php");
    session_start();

    // ----------------------SQl with the data of the user logged--------------------------
    $query_datos_user = "SELECT usuarios.id,usuarios.nombres, usuarios.apellidos,usuarios.img, roles.nombre from usuarios INNER JOIN roles on usuarios.id_rol = roles.id WHERE usuarios.id='" . $_SESSION['id'] . "'";
    $datos_user = mysqli_query($conn, $query_datos_user);
    $row_datos_user = mysqli_fetch_assoc($datos_user);

    // ----------------------SQl with all data of table users--------------------------
    $query_all_users = "select usuarios.id, usuarios.nombres,usuarios.apellidos,usuarios.usuario, roles.nombre as rol,usuarios.estado from usuarios INNER JOIN roles on usuarios.id_rol = roles.id";
    $all_users = mysqli_query($conn, $query_all_users);

    ?>
    <div class="container-fluid">
      <div class="row" style="
          height: 750px;
      ">
        <! --- Barra de la izquierda --->
          <?php include('Barra_izquierda.php') ?>
          <! --- Central--->
            <div class="col-12 col-sm-10 col-md-4 col-lg-9">
              <div class="container mt-5" style="
        width: 100%;
    ">

                <div style="background-color: #28a745; padding:10px; border-radius:5px ; box-shadow: 2px 2px 5px #999;" class=" mb-3">
                  <h5 class="ml-3 text-white" style="margin-bottom: 0px;">Usuarios </h5>
                </div>
                <div>
                <form action="buscar_user.php">
                  <div class="input-group mb-2" style="border-radius: 8px; width:250px">
                    <div class="input-group-prepend">
                      <div class="input-group-text"> <i class="fa fa-search"></i></div>
                    </div>
                    <input type="text" class="form-control" placeholder="Buscar...">
                    <button type="submit" class="btn btn-success" style="margin-left:8px;">Buscar</button>
                  </div>
                </form>
                </div>
                <table class="table table-hover mt-2 " style="box-shadow: 2px 2px 5px #999;">
                  <thead style="background-color:#428dfc;width:100%; ">
                    <tr class=" text-white">
                      <th scope="col">#</th>
                      <th scope="col">Nombres</th>
                      <th scope="col">Apellidos</th>
                      <th scope="col">Usuario</th>
                      <th scope="col">Rol</th>
                      <th scope="col">Estado</th>
                      <th scope="col" class="text-center"><i class="fa fa-cogs "></i></th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php while ($show = mysqli_fetch_array($all_users)) {
                      // code...
                    ?>
                      <tr>
                        <th scope="row"><?php echo $show['id']; ?></th>
                        <td><?php echo $show['nombres']; ?></td>
                        <td><?php echo $show['apellidos']; ?></td>
                        <td><?php echo $show['usuario']; ?></td>
                        <td><?php echo $show['rol']; ?></td>
                        <td><?php echo $show['estado']; ?></td>
                        <td class="text-center">
                          <button class="btn btn-sm btn-danger " title="Activar/Desactivar " data-toggle="modal" data-target="#modalDesAct<?php echo $show['id']; ?>"><i class="fas fa-user-slash"></i></button>
                          <button class="btn btn-sm btn-secondary" title="Modificar " data-toggle="modal" data-target="#modalModificar<?php echo $show['id']; ?>"><i class="fas fa-edit"></i></button>
                        </td>
                      </tr>
                      <?php switch ($show['estado']) {
                        case 'Activo':
                          include('modal_desactivar.php');
                          break;

                        case 'Inactivo':
                          include('modal_activar.php');
                          break;
                      }
                      include('modal_modificar.php');
                      ?>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
      </div>
    </div>
    </body>
    <script type="text/javascript">
      function mostrar_div_reportes() {
        $("#div_reportes").slideDown(400);
        $("#cerrar_div").slideDown(400);
      }

      function ocultar_div_reportes() {
        $("#div_reportes").slideUp(400);
        $("#cerrar_div").slideUp(400);
      }

      function over(x) {
        x.src = "http://localhost/App/Imgs/Refresh.png"
      }

      function out(x) {
        x.src = "https://image.shutterstock.com/image-vector/profile-picture-vector-260nw-404138239.jpg"
      }

      function cerrar_sessionjs() {
        if (confirm('¿Esta seguro que desea cerrar sesion?')) {
          // Save it!
          window.location.href = 'http://localhost/App/CRUD/cerrar_session.php';
        } else {
          // Do nothing!
          window.location.href = '#';
        };
      }
    </script>

</html>