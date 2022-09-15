<div style="background-color: #28a745; padding:10px; border-radius:5px ; box-shadow: 2px 2px 5px #999;" class=" mb-3">
<h5 class="ml-3 text-white" style="margin-bottom: 0px;">Añadir Casos </h5>
</div>
<form class="needs-validation" method="POST" action="../CRUD/crear_casos.php" target="_blank"  style="padding:24px; border-radius:5px; background-color:
#dfe8e3 ;box-shadow: 2px 2px 5px #999;">
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationCustom01">Estado:</label>
      <select class="custom-select mr-sm-2" name="estado" required>
      <option >Fallecido</option>
      <option >Activo</option>
      <option >Recuperado</option>
    </select>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Profesion:</label>
      <input type="text" class="form-control" name="profesion" placeholder="Profesion"  required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustomUsername">Sexo:</label>
      <div class="input-group">
        <select class="custom-select mr-sm-2" name="sexo" placeholder="Email">
        <option>M</option>
        <option>F</option>

      </select>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationCustom01">Edad:</label>
      <input type="number" class="form-control"  name="edad" placeholder="Edad"  required>
    </select>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Contactos:</label>
      <input type="text" class="form-control" name="contactos" placeholder="Numero de contactos"  required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustomUsername">RH:</label>
      <div class="input-group">
        <select class="custom-select mr-sm-2" name="rh">
        <option>O+</option>
        <option>O-</option>
        <option>A-</option>
        <option>A+</option>
        <option>B-</option>
        <option>B+</option>
        <option>AB-</option>
        <option>AB+</option>

      </select>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom03">Tipo de Prueba:</label>
      <select class="custom-select mr-sm-2" name="tipo_prueba">

        <option value="1">Antigenos</option>
        <option value="2">PCR</option>

    </select>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom04">Comunas:</label>
      <select class="custom-select mr-sm-2" name="comunas" require>

        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom05">Conglomerado:</label>
      <select class="custom-select mr-sm-2" name="conglomerado">

        <option value="1">Familiar</option>
        <option value="2">Institucional</option>
        <option value="3">Laboral</option>
        <option value="3">Exterior</option>
    </select>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-2 mb-3">
        <label for="validationCustom05">Eps:</label>
        <input type="text" class="form-control"   name="eps" placeholder="Codigo de EPS"  required>
      </select>
    </div>

    <div class="col-md-5 mb-3">
      <label for="validationCustom04">Inicio Aislamiento:</label>
      <input type="date" class=" col-md-12 text-muted" name="inicio_aislamiento" style="  border-radius: 6px;
      height: 37.5px;
      border-style: hidden;"
      /*margin: 0 8px 0 0;
    /*  padding: 6px 28px 6px 12px;>
    </div>
    <div class="col-md-5   mb-3">
      <label for="validationCustom04">Fin Aislamiento:</label>
      <input type="date" class=" col-md-12 text-muted" name="fin_aislamiento" style="  border-radius: 6px;
      height: 37.5px;
      border-style: hidden;"
      /*margin: 0 8px 0 0;
    /*  padding: 6px 28px 6px 12px;>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-7 mb-3">
      <label for="validationCustom0s">Sintomas:</label><br>
      <div class="form-check ml-5">
        <input class="form-check-input " name="sintomas[]" value="Ninguno" type="checkbox">
        <label class="form-check-label" for="exampleCheck1">Ninguno</label><br>
        <input class="form-check-input" name="sintomas[]" value="Tos" type="checkbox">
        <label class="form-check-label" for="exampleCheck1">Tos</label> <br>
        <input  class="form-check-input" name="sintomas[]"  value="Fiebre" type="checkbox">
	<label class="form-check-label" for="exampleCheck1">Fiebre</label><br>
        <input  class="form-check-input" name="sintomas[]" value="Cansancio" type="checkbox">
        <label class="form-check-label" for="exampleCheck1">Cansancio</label><br>
        <input class="form-check-input" name="sintomas[]" value="Perdida del gusto" type="checkbox">
        <label class="form-check-label" for="exampleCheck1">Perdida del gusto</label><br>
        <input  class="form-check-input" name="sintomas[]" value="Dolor de garganta" type="checkbox">
        <label class="form-check-label" for="exampleCheck1">Dolor de garganta</label><br>
        <input  class="form-check-input" name="sintomas[]" value="Vomito" type="checkbox">
        <label class="form-check-label" for="exampleCheck1">Vomito</label><br>
        <input  class="form-check-input" name="sintomas[]" value="Fatiga" type="checkbox">
        <label class="form-check-label" for="exampleCheck1">Fatiga</label>
       </div>
     </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom04">Coomorbilidad:</label>
      <input type="text" class="form-control" name="enfermedad" placeholder="Enfermedad"  >
      
    </div>
  </div>
  <div class="form-row">

    <button class="btn btn-success" type="submit">Submit form</button>

  </div>

</form>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();


</script>
