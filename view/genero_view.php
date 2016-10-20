<?php
  include_once 'view/view.php';

  class GeneroView extends View
  {

      function MostrasIndex()
      {
        $this->smarty->assign('errores', $this->errores);
        $this->smarty->display('index.tpl');
      }

      public function mostrarTPL($contenido,$genero)
      {
        $this->smarty->assign('errores', $this->errores);
        $this->smarty->assign('generos', $genero);
        return $this->smarty->fetch($contenido);
      }

  }

?>
