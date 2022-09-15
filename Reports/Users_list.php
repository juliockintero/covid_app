<?php

header('Content-Type:application/xls');
header('Content-Disposition: attachment; filename=Usuarios.xls');
header('Content-type: text/html; charset=utf-8');
  require_once('../CRUD/conexion_bd.php');

  $query_all_users="select usuarios.id, usuarios.nombres,usuarios.apellidos,usuarios.usuario, roles.nombre as rol,usuarios.estado ,usuarios.create_at , usuarios.update_at from usuarios INNER JOIN roles on usuarios.id_rol = roles.id";
  $all_users = mysqli_query($conn, $query_all_users);
  $row_datos_user = mysqli_fetch_assoc($all_users);

  $html= '<h3> INFORME DE USUARIOS</h3>
            <table >
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Usuario</th>
                <th scope="col">Rol</th>
                <th scope="col">Estado</th>
                <th scope="col">Creado</th>
                <th scope="col">Actualizado</th>
              </tr>
            </thead>';
            $i=0;
            do{
              $i++;
            $html= $html.'
            <tbody>
              <tr>
                <th>'.$row_datos_user['id'].'</th>
                <td>'.$row_datos_user['nombres'].'</td>
                <td>'.$row_datos_user['apellidos'].'</td>
                <td>'.$row_datos_user['usuario'].'</td>
                <td>'.$row_datos_user['rol'].'</td>
                <td>'.$row_datos_user['estado'].'</td>
                <td>'.$row_datos_user['create_at'].'</td>
                <td>'.$row_datos_user['update_at'].'</td>
              </tr>
              </tbody>';
            } while($row_datos_user= mysqli_fetch_assoc($all_users));

            $html= $html.'</table>';
            echo $html;



 ?>
