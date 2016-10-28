<section>
  <div class="row">
    <h2>Lista de Libros o Películas.</h2>
    <p>En esta sección podras buscar dentro de nuestra base de datos las películas que se realizaron basadas en un libro de tu
    elección o, la otra opción con la que cuentas es, encontrar el libro del que se basó esa película que tanto te gustó.</p>
    <form class="form-horizontal" action="index.php?action=listaLibros" method="post">
      <div class="form-group">
        <label class="control-label col-sm-4">¿Por cual genero queres filtrar?:</label>
        <div class="col-sm-8">
          <select class="form-control" id="getGenero">
            {foreach $generos as $genero}
              <option>{$genero['tipo']}</option>
            {/foreach}
          </select>
        </div>
      </div>
    </form>
    <div class="table-responsive">
     <table class="table">
       <thead>
         <tr>
           <th>LIBRO</th>
           <th>AUTOR</th>
           <th>PORTADA</th>
           <th>PELICULA</th>
         </tr>
       </thead>
       <tbody id="contenidoTabla">

         {include 'tablaLibros.tpl'}

       </tbody>
     </table>
    </div>
  </div>
</section>
