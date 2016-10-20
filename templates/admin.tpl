<section>
  <div class="row">
    <h2>Sección de administración de la página.</h2>

    <!--      Generos     -->

    <div class="row">
      <h3>Generos</h3>
      <div>
        <ul id="aMostrar"class="list-group">
          {foreach $generos as $genero}
            <li class="list-group-item">
              {$genero['tipo']}
                <a class="glyphicon glyphicon-trash" href="index.php?action=abm_borrar_genero&id_genero={$genero['id']}"></a>
          {/foreach}
        </ul>
      </div>
      <button id="mostrar" class="btn btn-default">Mostrar/Ocultar Generos</button>

      {if count($errores) gt 0}
        <div class="panel panel-danger">
          <div class="panel-heading">
              <h3 class="panel-title">Errores</h3>
          </div>
          <ul>
            {foreach $errores as $error}
              <li>{$error}</li>
            {/foreach}
          </ul>
        </div>
      {/if}

      <form action="index.php?action=abm_agregar_genero" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="genero">Genero</label>
          <input type="text" class="form-control" id="genero" name="genero" placeholder="Genero">
        </div>
        <!--<div class="form-group">
          <label for="imagesToUpload">Imagenes</label>
          <input type="file" name="imagesToUpload[]" id="imagesToUpload" multiple/>
        </div>-->
        <button type="submit" class="btn btn-default">Agregar Genero</button>
      </form>
    </div>

    <!--      Libros     -->
    <div class="row">
      <h3>Libros</h3>
      <ul id="listaLibros" class="list-group">
        {foreach $libros as $libro}
          <li class="list-group-item">
            {$libro['titulo']}
            {$libro['autor']}
            <img src="{$libro['portada']}" alt="imagen-libro-{$libro['titulo']}" class="img-responsive"/>
            <a class="glyphicon glyphicon-trash" href="index.php?action=abm_borrar_libro&id_libro={$libro['id']}"></a>
        {/foreach}

      </ul>

      {if count($errores) gt 0}
        <div class="panel panel-danger">
          <div class="panel-heading">
              <h3 class="panel-title">Errores</h3>
          </div>
          <ul>
            {foreach $errores as $error}
              <li>{$error}</li>
            {/foreach}
          </ul>
        </div>
      {/if}

      <form action="index.php?action=abm_agregar_libro" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="book">Libro</label>
          <input type="text" class="form-control" id="book" name="book" placeholder="Titulo">
        </div>
        <div class="form-group">
          <label for="autor">Autor</label>
          <input type="text" class="form-control" id="autor" placeholder="Autor">
        </div>
        <div class="form-group">
          <label for="imagesToUpload">Portada</label>
          <input type="file" name="imagesToUpload[]" id="imagesToUpload" multiple/>
        </div>
        <div class="form-group">
          <div>
            <label for="genero">Genero</label>
          </div>
          <select class="form-control" id="genero">
            {foreach $generos as $genero}
              <option>{$genero['tipo']}</option>
            {/foreach}
          </select>
        </div>
        <button type="submit" class="btn btn-default" id="agregarLibro">Agregar Libro</button>
      </form>
    </div>
  </div>

</section>
