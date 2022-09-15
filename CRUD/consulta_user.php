<?php
session_start();
      require_once("conexion_bd.php");

                $user=$_POST["user"];
                $password=$_POST["password"];

              // Consulta de usuario registrado. para el log in.
              $query="SELECT id,id_rol,estado from usuarios WHERE usuario='$user' AND contrasena='$password'";
              $datos = mysqli_query($conn, $query);
              $row_datos = mysqli_fetch_assoc($datos);
              $totalRows_datos = mysqli_num_rows($datos);
              $acceso=false;
              if ($totalRows_datos==1 && $row_datos['estado']!='Inactivo') {
                //Guardo id de usuario
                $_SESSION['id']=$row_datos["id"];
                $_SESSION['rol']=$row_datos["id_rol"];
                $_SESSION['acceso']=TRUE;
                header("Location:../Home/Actualizar.html");
              }else {
                $_SESSION['acceso']='false';
                header("Location:../Index.php?log=0");


              }
              $conn->close();
 ?>
