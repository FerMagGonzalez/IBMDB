<?php

  include_once 'model/genero_model.php';
  include_once 'controller/controller.php';

  class GeneroController extends Controller
  {

    function __construct()
    {
      $this->view = new GeneroView();
      $this->model = new GeneroModel();
    }

    function RetornarContenido($contenido)
    {
      $ruta = "templates/" . $contenido . ".tpl";
      return $this->view->mostrarTPL($ruta,$this->model->getGeneros());
    }

    public function agregarGenero()
    {
      if(isset($_REQUEST['genero']) && ($_REQUEST['genero'] != '')){
          $this->model->agregarGenero($_REQUEST['genero']);
        }
      else{
        $this->view->mostrarError('La categoría que intenta crear esta vacia');
      }
      $this->view->MostrasIndex();
    }

    function borrarGenero(){
      if(isset($_REQUEST['id_genero'])){
        $this->model->borrarGenero($_REQUEST['id_genero']);
      }
      else{
        $this->view->mostrarError('La tarea que intenta borrar no existe');
      }
      $this->view->MostrasIndex();
    }

  }

?>
