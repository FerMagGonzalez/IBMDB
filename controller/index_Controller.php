<?php

  include_once 'controller/controller.php';

  class IndexController extends Controller
  {

    function __construct()
    {
      $this->view = new IndexView();
    }

    public function MostrasIndex()
    {
      $this->view->mostrarIndex();
    }

    function RetornarContenido($contenido)
    {
      $ruta = "templates/" . $contenido . ".tpl";
      return $this->view->mostrarTPL($ruta);
    }

  }

?>
