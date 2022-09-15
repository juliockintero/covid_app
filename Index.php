<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="../Home/sidebar.css">
    <meta name="author" content="">
    <!---<link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">--->
    <link rel="icon" type="image/png" href="https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/SARS-CoV-2_without_background.png/597px-SARS-CoV-2_without_background.png" />
    <title>Pagina de Logeo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>

    <script src="myown.js"></script>
  </head>

  <body style="background-color:#dfe8e3">

  <header style="height: 40px ; background-color:#428dfc" class="navbar navbar-expand navbar-dark flex-column flex-md-row bd-navbar"> </header>

    <div id="div_alert" class="alert alert-danger" role="alert" style="display:none;
    width:25%;
    position:absolute;
    left:73%;
    top:55px;">
    Usuario y/o contraseña incorrectos, Porfavor intente de nuevo o <strong> Contacte al Administrador</strong>.
  </div>

  <div class="container mt-5">

    <div class=" row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.png" class="img-fluid"
          alt="Sample image">
      </div>
      <div class=" mt-5 col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="CRUD/consulta_user.php" method="POST">
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <h3 class=" fw-normal mb-2 me-3">Iniciar Sesion</h3>
          </div>
          <div class="form-outline mb-4">
            <input type="text"  onkeypress="return alpha(event)"  required="required" name="user" class="form-control form-control-lg" placeholder="Usuario" />
            <i class="fas fa-user form-outline"></i>
          </div>
          <div class="form-outline mb-3">
            <input type="password" id="form3Example4" name="password" required="required" formenctype=""class="form-control form-control-lg"
              placeholder="Contraseña" />
          </div>
          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
</body>
<script type="text/javascript">

var acceso='<?php   echo $_GET['log']; ?>';

 if (acceso=='0') {
   mostrardiv();
 }else {
   console.log('No se mostro el div porque acceso no es igual a 0')
 }
function mostrardiv(){
      //document.getElementById("div1").style.display="block";
      //ocultardiv();
      console.log(acceso);
      $("#div_alert").slideDown(400);
      setTimeout('ocultardiv()',2000);
}

function ocultardiv(){
  //setTimeout('document.getElementById("div1").style.display="none";',2000);
  $("#div_alert").slideUp(400);
}
</script>
</html>
