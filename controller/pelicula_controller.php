<?php

  include_once 'model/pelicula_model.php';
  include_once 'controller/controller.php';

  class PeliculaController extends Controller
  {

    function __construct()
    {
      $this->view = new PeliculasView();
      $this->model = new PeliculasModel();
    }

    function RetornarContenido($contenido)
    {
      $ruta = "templates/" . $contenido . ".tpl";
      return $this->view->mostrarTPL($ruta,$this->model->getPelicula());
    }

    public function agregarPelicula()
    {
      if(isset($_REQUEST['movie']) && ($_REQUEST['movie'] != '') && isset($_FILES['imagesToUpload'])){
          $this->model->agregarPelicula($_REQUEST['movie'], $_FILES['imagesToUpload']);
        }
      else{
        $this->view->mostrarError('La pelicula que intenta crear esta vacia');
      }
      $this->MostrasIndex();
    }

    function borrarPelicula(){
      if(isset($_REQUEST['id'])){
        $this->model->borrarPelicula($_REQUEST['id']);
      }
      else{
        $this->view->mostrarError('La pelicula que intenta borrar no existe');
      }
      $this->MostrasIndex();
    }

  }

?>
