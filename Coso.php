<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
<link rel="shortcut icon" href="https://commons.wikimedia.org/wiki/File:SARS-CoV-2_without_background.png">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link href="sidebar.css" rel="stylesheet" media="screen"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"> </script>
    <meta charset="utf-8">
    <title>Casos</title>
    <style>
body{
  background-color: indianred;
}



  </style>
  </head>
  <body>
  <div style="background-color: #28a745; padding:10px; border-radius:5px ; box-shadow: 2px 2px 5px #999;" class=" mb-3">
<h5 class="ml-3 text-white" style="margin-bottom: 0px;">Añadir Casos </h5>
</div>
<form class="needs-validation" method="POST" action="../CRUD/crear_casos.php" target="_blank"  style="padding:24px; border-radius:5px; background-color:
#dfe8e3 ;box-shadow: 2px 2px 5px #999;">
  
  <div class="form-row">
    <div class="col-md-7 mb-3">
      <label for="validationCustom0s">Sintomas:</label><br>
      <div class="form-check ml-5">
        <input class="form-check-input " name="sintomas[]" value="Ninguno" type="checkbox">
        <label class="form-check-label" for="exampleCheck1">Ninguno</label><br>
        <input class="form-check-input" name="sintomas[]" value="Tos" type="checkbox">
        <label class="form-check-label" for="exampleCheck1">Tos</label> <br>
        <input  class="form-check-input" name="sintomas[]" type="checkbox">
	      <label class="form-check-label" for="exampleCheck1">Fiebre</label><br>
        <input  class="form-check-input" name="sintomas[]" type="checkbox">
        <label class="form-check-label" for="exampleCheck1">Cansancio</label><br>
        <input class="form-check-input" name="sintomas[]" type="checkbox">
        <label class="form-check-label" for="exampleCheck1">Perdida del gusto</label><br>
        <input  class="form-check-input" name="sintomas[]" type="checkbox">
        <label class="form-check-label" for="exampleCheck1">Dolor de garganta</label><br>
        <input  class="form-check-input" name="sintomas[]" type="checkbox">
        <label class="form-check-label" for="exampleCheck1">Vomito</label><br>
        <input  class="form-check-input" name="sintomas[]" type="checkbox">
        <label class="form-check-label" for="exampleCheck1">Fatiga</label>
       </div>
     </div>
    
  </div>
  <div class="form-row">

    <button class="btn btn-success" type="submit">Submit form</button>

  </div>

</form>




  <script>
$(document).ready(function() {
    setTimeout(function() {
        $("#ring").show(1500);
    },3000);

    //setTimeout(function() {
     //   window.location.href="../Home/Home.php"
  // },3000);

});
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})

  </script>
</html>
