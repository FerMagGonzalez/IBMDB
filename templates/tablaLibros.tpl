  {foreach $libros as $libro}
       <tr>
         <td>{$libro['titulo']}</td>
         <td>{$libro['autor']}</td>
         <td><img src="{$libro['portada']}" alt="imagen-libro-{$libro['titulo']}" class="img-responsive"/></td>
         <td>{$libro['pelicula']}</td>
       </tr>
 {/foreach}
