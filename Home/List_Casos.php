<!DOCTYPE html>
<?php
error_reporting(0);
session_start();
if ($_SESSION['acceso'] == TRUE) {
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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

    <body>
        <?php

        // -------------------Calling Database connection.-----------------
        include('modal_cambiar_img.php');
        require("../CRUD/conexion_bd.php");
        session_start();

        // ----------------------SQl with the data of the user logged--------------------------
        $query_datos_user = "SELECT usuarios.id,usuarios.nombres, usuarios.apellidos,usuarios.img, roles.nombre from usuarios INNER JOIN roles on usuarios.id_rol = roles.id WHERE usuarios.id='" . $_SESSION['id'] . "'";
        $datos_user = mysqli_query($conn, $query_datos_user);
        $row_datos_user = mysqli_fetch_assoc($datos_user);

        // ----------------------SQl with all data of table casos--------------------------
        $query_all_casos = "SELECT casos.id, casos.sexo, casos.edad, casos.rh,casos.contactos, casos.profesion, estados_casos.estado , tipos_pruebas.tipo_prueba, comunas.comuna, conglomerados.conglomerado, casos.eps, casos.fecha_inicio_aislamiento, casos.fecha_fin_aislamiento, casos.coomorbilidad from casos inner join estados_casos on casos.id_estado_caso = estados_casos.id inner join tipos_pruebas on casos.id_tipo_prueba= tipos_pruebas.id INNER JOIN comunas on comunas.id = casos.id_comunas INNER JOIN conglomerados on conglomerados.id = casos.id_conglomerado ORDER BY casos.id ASC";
        $all_casos = mysqli_query($conn, $query_all_casos);

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
                                <!-- Alert window if all goes well-->
                                <div id="id_insertok" class="alert alert-success" role="alert" style="box-shadow: 2px 2px 5px #999;position: absolute;
        width: 25%;
        top: 20px;
        left: 81%;
        display:none"><strong>
                                        Registro creado con exito.</strong>
                                </div>
                                <!-- Alert window if all goes bad-->
                                <div id="id_inserterror" class="alert alert-danger div_insert_alert" role="alert" style="box-shadow: 2px 2px 5px #999;position: absolute;
        width: 25%;
        top: 20px;
        left: 81%;
        display:none"> <strong>
                                        No se creó el registro. </strong></div>

                                <table class="table table-hover  table-sm text-center" style="box-shadow: 2px 2px 5px #999;">
                                    <thead style="background-color
                                    :#428dfc;width:100%">
                                        <tr class=" text-white">
                                            <form action="buscar_caso.php">
                                                <div class="input-group mb-2" style="border-radius: 8px; width:250px">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"> <i class="fa fa-search"></i></div>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Buscar...">
                                                    <button type="submit" class="btn btn-success" style="margin-left:8px;">Buscar</button>
                                                </div>

                                            </form>

                                        </tr>
                                        <tr class=" text-white ">
                                            <th scope="col">Caso</th>
                                            <th scope="col">Sexo</th>
                                            <th scope="col">Edad</th>
                                            <th scope="col">RH</th>
                                            <th scope="col">Contactos</th>
                                            <th scope="col">Profesion</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Prueba</th>
                                            <th scope="col">Comuna</th>
                                            <th scope="col">Conglomerado</th>
                                            <th scope="col">EPS</th>
                                            <th scope="col">Inicio</th>
                                            <th scope="col">Fin </th>
                                            <th scope="col">Comorbilidad</th>
                                            <th scope="col"><i class="fas fa-cog"></i></th>
                                        </tr>

                                    </thead>

                                    <tbody>
                                        <?php while ($show = mysqli_fetch_array($all_casos)) {
                                            // code...
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $show['id']; ?></th>
                                                <td><?php echo $show['sexo']; ?></td>
                                                <td><?php echo $show['edad']; ?></td>
                                                <td><?php echo $show['rh']; ?></td>
                                                <td><?php echo $show['contactos']; ?></td>
                                                <td><?php echo $show['profesion']; ?></td>
                                                <td><?php echo $show['estado']; ?></td>
                                                <td><?php echo $show['tipo_prueba']; ?></td>
                                                <td><?php echo $show['comuna']; ?></td>
                                                <td><?php echo $show['conglomerado']; ?></td>
                                                <td><?php echo $show['eps']; ?></td>
                                                <td><?php echo $show['fecha_inicio_aislamiento']; ?></td>
                                                <td><?php echo $show['fecha_fin_aislamiento']; ?></td>
                                                <td><?php echo $show['coomorbilidad']; ?></td>
                                                <td>
                                                    <button class="btn btn-sm btn-danger " title="Activar/Desactivar " data-toggle="modal" data-target="#modalEliminarCaso<?php echo $show['id']; ?>"><i class="fas fa-minus-circle"></i></button>
                                                </td>
                                            </tr>
                                            <!-- Modal -->
                                            <div class="modal fade" id="modalEliminarCaso<?php echo $show['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Eliminar</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form class="" action="../CRUD/eliminar_caso.php" method="post">
                                                            <input type="hidden" name="idCaso" value="<?php echo $show['id']; ?>"> </input>
                                                            <div class="modal-body">
                                                                ¿Esta seguro que desea eliminar el siguiente registro?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" data-toggle="modal" data-target="#modalEliminarCaso" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php } ?>
                                    </tbody>
                                </table>

                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                    </ul>
                                </nav>
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
        var insert = '<?php echo $_GET['insertCaso']; ?>';
        if (insert == '1') {
            $("#id_insertok").fadeIn(1000);
            setTimeout(function() {
                $("#id_insertok").fadeOut(1000)
            }, 2000);
        } else if (insert == '0') {
            mostrar_div_error();
        }
    </script>

</html>