<?php
require("C:/xampp/htdocs/App/CRUD/conexion_bd.php");
$query_all_users="select usuarios.id, usuarios.nombres,usuarios.apellidos,usuarios.usuario, roles.nombre,usuarios.estado from usuarios INNER JOIN roles on usuarios.id_rol = roles.id";
$all_users = mysqli_query($conn, $query_all_users);
$row_users  = mysqli_fetch_array($all_users);
foreach ($row_users as $key ) {
  echo $key;
}
 ?>
