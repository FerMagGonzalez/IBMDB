<?php
  include_once 'view/view.php';

  class IndexView extends View
  {
      function mostrarIndex()
      {
        $this->smarty->assign('errores', $this->errores);
        $this->smarty->display('index.tpl');
      }

      public function mostrarTPL($contenido)
      {
        $this->smarty->assign('errores', $this->errores);
        return $this->smarty->fetch($contenido);
      }

  }

?>
