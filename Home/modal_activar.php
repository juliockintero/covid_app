<!-- Modal -->
  <div class="modal fade" id="modalDesAct<?php echo $show['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Activar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="" action="../CRUD/activar_user.php" method="post">
          <input type="hidden" name="id" value="<?php echo $show['id'];?>"> </input>
        <div class="modal-body">
          ¿Desea activar el usuario?
        </div>
        <div class="modal-footer">
          <button type="button" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" onclick="disable_user()">Activar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
