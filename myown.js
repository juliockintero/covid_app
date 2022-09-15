//1.Do not allowed typing symbols in login
function alpha(e) {
  var k;
  document.all ? k = e.keyCode : k = e.which;
  return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32 || (k >= 48 && k <= 57));
}

function MostrarOcultar_div_reportes() {
  $("#div_reportes").slideToggle("slow", function () {
    // Animation complete.
  });
}
// Change profile img
function Mostrar_modal_cambiar_img() {
  $("#modal_cambiar_img").modal('show');

}

// Close modal img proflie
function Cerrar_modal_cambiar_img() {
  $("#modal_cambiar_img").modal('toggle');

}


function Cerrar_sesion() {
  if (confirm('¿Esta seguro que desea cerrar sesion?')) {
    window.location.href = '../CRUD/cerrar_session.php';
  } else {
    window.location.href = '#';
  };
}
function mostrar_div_admin() {
  
  if (rol==1){
    document.getElementById("soloadmin").style.display = "block";
    console.log(rol);
  }else if(rol==2){
    $("#soloadmin").hide();
  }
}


