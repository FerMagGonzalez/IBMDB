<section>
  <div class="row">
    <h2>Sección de administración de la página.</h2>

    <!--      Generos     -->

    <div class="row">
      <h3>ABM Generos</h3>

      {include 'generos.tpl'}

      <div class="col-lg-6">
        <form action="index.php?action=abm_agregar_genero" method="POST" enctype="multipart/form-data">
          <h3>Agregar genero</h3>
          <div class="form-group">
            <label for="genero">Genero</label>
            <input type="text" class="form-control" id="genero" name="genero" placeholder="Genero">
          </div>
          <button type="submit" class="btn btn-default">Agregar Genero</button>
        </form>
      </div>

      <div class="col-lg-6">
        <form action="index.php?action=abm_editar_genero" method="POST" enctype="multipart/form-data">
          <h3>Editar genero</h3>
          <div class="form-group">
            <select class="form-control" name="selGenero">
              {foreach $generos as $genero}
                <option>{$genero['tipo']}</option>
              {/foreach}
            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="generoMod" name="generoMod" >
          </div>
          <button type="submit" class="btn btn-default" id="actualizarGenero">Editar Genero</button>

        </form>
      </div>

    </div>


    <!--      Libros     -->
    <div class="row">
      <h3>Borrar libro</h3>

        {include 'listaLibrosTitulo.tpl'}

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
    </div>
    <div class="row">
      <form action="index.php?action=abm_agregar_libro" method="POST" enctype="multipart/form-data">
        <h3>Agregar libros</h3>
        <div class="form-group">
          <label for="book">Libro</label>
          <input type="text" class="form-control" name="book" placeholder="Titulo">
        </div>
        <div class="form-group">
          <label for="autor">Autor</label>
          <input type="text" class="form-control" name="autor" placeholder="Autor">
        </div>
        <div class="form-group">
          <label for="imagesToUpload">Portada</label>
          <input type="file" name="imagesToUpload[]" multiple/>
        </div>
        <div class="form-group">
            <label for="movie">Pelicula</label>
            <input type="text" class="form-control" name="movie" placeholder="Pelicula">
        </div>
        <div class="form-group">
            <label for="genero">Genero</label>
            <select class="form-control" name="genero">
              {foreach $generos as $genero}
                <option>{$genero['tipo']}</option>
              {/foreach}
            </select>
        </div>
        <button type="submit" class="btn btn-default" id="agregarLibro">Agregar Libro</button>
      </form>
    </div>

    <div class="row">
      <form action="index.php?action=abm_editar_libro" method="POST" enctype="multipart/form-data">
        <h3>Actualizar libros</h3>
        <h5> ** Todos los campos son obligatorios </h5>
        <label for="bookMod">Libro a actualizar</label>
        <select class="form-control" name="bookMod">
          {foreach $libros as $libro}
            <option>{$libro['titulo']}</option>
          {/foreach}
        </select>
        <div class="form-group">
          <label for="book">Titulo</label>
          <input type="text" class="form-control" name="book" placeholder="Titulo" required="true">
        </div>
        <div class="form-group">
          <label for="autor">Autor</label>
          <input type="text" class="form-control" name="autor" placeholder="Autor" required="true">
        </div>
        <div class="form-group">
          <label for="imagesToUpload">Portada</label>
          <input type="file" name="imagesToUpload[]" multiple/>
        </div>
        <div class="form-group">
            <label for="movie">Pelicula</label>
            <input type="text" class="form-control" name="movie" placeholder="Pelicula" required="true">
        </div>
        <div class="form-group">
            <label for="genero">Genero</label>
            <select class="form-control" name="genero">
              {foreach $generos as $genero}
                <option>{$genero['tipo']}</option>
              {/foreach}
            </select>
        </div>
        <button type="submit" class="btn btn-default" id="actualizarLibro">Actualizar Libro</button>
      </form>
    </div>
    <div class="row">
      <form action="index.php?action=abm_editar_libroGenero" method="POST" enctype="multipart/form-data">
        <h3>Actualizar genero de un libro</h3>
        <div class="form-group">
          <label for="bookMod">Libro</label>
          <select class="form-control" name="bookMod">
            {foreach $libros as $libro}
              <option>{$libro['titulo']}</option>
            {/foreach}
          </select>
        </div>
        <div class="form-group">
            <label for="genero">Genero</label>
            <select class="form-control" name="generoMod">
              {foreach $generos as $genero}
                <option>{$genero['tipo']}</option>
              {/foreach}
            </select>
        </div>
        <button type="submit" class="btn btn-default" id="actualizarLibroGenero">Actualizar Genero de Libro</button>
      </form>
    </div>
  </div>

</section>
