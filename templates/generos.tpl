<div>
  <ul class="list-group">
    {foreach $generos as $genero}
      <li class="list-group-item">
        {$genero['tipo']}
          <!--<a class="btn btn-primary glyphicon glyphicon-pencil" id="genero" data-toggle="modal" data-target="#edGenero"></a>-->
          <a class="glyphicon glyphicon-trash" href="index.php?action=abm_borrar_genero&id_genero={$genero['id']}"></a>
    {/foreach}
  </ul>
</div>

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
