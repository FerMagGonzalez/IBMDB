<div>
  <ul class="list-group">
    {foreach $libros as $libro}
      <li class="list-group-item">
        {$libro['titulo']}
            <a class="glyphicon glyphicon-trash" href="index.php?action=abm_borrar_libro&id_libro={$libro['id']}"></a>
      </li>
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
