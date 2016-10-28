<?php

  include_once 'model/genero_model.php';
  include_once 'model/libro_model.php';
  include_once 'controller/controller.php';

  class RelacionController extends Controller
  {

    function __construct()
    {
      $this->view = new RelacionView();
      $this->model = new GeneroModel();
      $this->modell = new LibrosModel();
    }

    function RetornarContenido($contenido)
    {
      $ruta = "templates/" . $contenido . ".tpl";
      return $this->view->mostrarTPL($ruta,$this->model->getGeneros(),$this->modell->getLibros());
    }

  }

?>
