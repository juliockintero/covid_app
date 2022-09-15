<!-- Modal -->
  <div class="modal fade" id="modal_cambiar_img" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Cambiar Imagen de Perfil</h5>
          <button type="button" class="close" onclick="Cerrar_modal_cambiar_img()" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="" action="../CRUD/cambiar_img.php"  enctype="multipart/form-data"method="post">
          <input type="hidden" name="id" value="<?php echo $row_datos_user['id'];?>"> </input>
          <input type="hidden" name="nombres" value="<?php echo $row_datos_user['nombres'];?>"> </input>
          <input type="hidden" name="apellidos" value="<?php echo $row_datos_user['apellidos'];?>"> </input>
        <div class="modal-body">
            <input type="file"  required="required" name="imagen"  accept="image/png, image/gif, image/jpeg" class="form-control-file" >
        </div>
        <div class="modal-footer">
          <button type="button" data-toggle="modal" onclick="Cerrar_modal_cambiar_img()" data-target="#exampleModalCenter" class="btn btn-secondary" data-toggle="modal">Cancelar</button>
          <button type="submit" class="btn btn-success">Cambiar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
