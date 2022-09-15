<!-- Modal -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>


</style>
  <div class="modal fade" id="modalModificar<?php echo $show['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modificar Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>



        <div class="modal-body">
          <form class="" name="miFormulario" action="../CRUD/modificar_user.php" method="post">
            
            <input type="hidden" name="id" value="<?php echo $show['id'];?>">
            <?php
            $id=$show['id'];
            $sql="SELECT nombres, apellidos, usuario from usuarios WHERE id='$id'";
            $result=mysqli_query($conn,$sql);
            $rowtoModify=mysqli_fetch_assoc($result);
            ?>
            <div class="form-group">
              <label class="text-left">Nombres:</label>
              <input type="text" class="form-control" name="nombres" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?php echo $rowtoModify['nombres'];?>" placeholder="Ingrese Nombres">

            </div>
            <div class="form-group">
              <label class="text-left">Apellidos:</label>
              <input type="text" class="form-control" name="apellidos"id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $rowtoModify['apellidos'];?>" placeholder="Ingrese Apellidos">
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect2">Rol:</label>
                <select class="form-control" name="rol" id="exampleFormControlSelect2">
                  <option>Estandar</option>
                  <option>Administrador</option>
                </select>
            </div>
            <div class="form-group">
              <label class="text-left">Usuario:</label>
              <input type="text" class="form-control" name="user" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $rowtoModify['usuario'];?>" placeholder="Ingrese Usuario">
            </div>
            
            <div class="form-group">
              <label class="text-left">Desea cambiar la contrasena?</label>
              <input id ="idcheck"type="checkbox" onclick="alertaChecked()">
            </div>
            
            <div id="divContrasena"class="form-group" style="display:none">
              <label class="text-left">Contraseña</label>
              <input type="password" class="form-control" name="password" id="exampleInputEmail1" aria-describedby="emailHelp"  placeholder="Ingrese contraseña nueva">
            </div>
            
        </div>
        
          <div class="modal-footer">
            <button type="button" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Modificar</button>
          </div>
        </form>

      </div>
    </div>
  </div>
  <script type="text/javascript">

function alertaChecked(){
  var isChecked = document.getElementById('idcheck').checked;
  var div =document.getElementById('divContrasena')
    if(isChecked){
    alert('marcado');
      div.style.display="block";
      div.style.transition=".4s";

    }else {
      alert('Desmarcado');
      div.style.display="none";
      div.style.transition=".2s";
}
}
</script>
