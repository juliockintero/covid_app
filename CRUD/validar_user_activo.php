<?php
session_destroy();
session_start();
if (isset($_SESSION['id'])){
  header("Location: ../index.php" );

}


 ?>
