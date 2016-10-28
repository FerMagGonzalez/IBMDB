<?php
  include_once 'view/view.php';

  class RelacionView extends View
  {
      public function mostrarTPL($contenido,$genero,$libro)
      {
        $this->smarty->assign('errores', $this->errores);
        $this->smarty->assign('generos', $genero);
        $this->smarty->assign('libros', $libro);
        return $this->smarty->fetch($contenido);
      }
  }

?>
