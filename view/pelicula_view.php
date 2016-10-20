<?php
  include_once 'view/view.php';

  class PeliculaView extends View
  {

      public function mostrarTPL($contenido,$pelicula)
      {
        $this->smarty->assign('errores', $this->errores);
        $this->smarty->assign('libros', $peliculas);
        return $this->smarty->fetch($contenido);
      }

  }

?>
