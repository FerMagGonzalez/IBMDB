<?php
  include_once 'view/view.php';

  class RelacionView extends View
  {

    public function mostrarIndex()
    {
      $this->smarty->assign('generos', $genero);
      $this->smarty->assign('libros', $libro);
      $this->smarty->assign('peliculas', $pelicula);
      $this->smarty->display('admin.tpl');
    }

    public function mostrarTPL($contenido,$genero,$libro,$pelicula)
    {
      $this->smarty->assign('errores', $this->errores);
      $this->smarty->assign('generos', $genero);
      $this->smarty->assign('libros', $libro);
      $this->smarty->assign('peliculas', $pelicula);
      return $this->smarty->fetch($contenido);
    }

  }

?>
