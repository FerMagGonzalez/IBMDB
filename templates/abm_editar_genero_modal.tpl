<!--Modal del editar Genero-->
<div class="modal fade" id="edGenero">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <!-- Modal header-->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Editar genero: {$genero['tipo']}</h4>
      </div>

      <!-- Modal body-->
      <div class="modal-body">
        <form action="index.php?action=abm_editar_genero&id_genero={$genero['id']}" method="post">
          <div class="form-group">
            <label for="selGenero">Genero seleccionado:</label>
            <input type="text" class="form-control" id="generoSel" name="generoSel" disabled>
          </div>

         <div class="form-group">
           <label for="generoMod">Ingrese nuevo genero:</label>
           <input type="text" class="form-control" id="generoMod" name="generoMod" autofocus>
         </div>
        </form>
      </div>

      <!-- Modal footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" id="abm_editar_genero">Guardar cambios</button>
      </div>

    </div>

  </div>
</div>
<!--Fin del modal del editar Genero-->
