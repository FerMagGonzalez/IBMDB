<?php
  include_once 'view/view.php';

  class LibroView extends View
  {

    function MostrasIndex()
    {
      $this->smarty->assign('errores', $this->errores);
      $this->smarty->display('index.tpl');
    }

      public function mostrarTPL($contenido,$libro)
      {
        $this->smarty->assign('errores', $this->errores);
        $this->smarty->assign('libros', $libro);
        return $this->smarty->fetch($contenido);
      }

  }

?>
