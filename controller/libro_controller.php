<?php

  include_once 'model/libro_model.php';
  include_once 'controller/controller.php';

  class LibrosController extends Controller
  {

    function __construct()
    {
      $this->view = new LibroView();
      $this->model = new LibrosModel();
    }

    function RetornarContenido($contenido)
    {
      $ruta = "templates/" . $contenido . ".tpl";
      return $this->view->mostrarTPL($ruta,$this->model->getLibros());
    }

    public function agregarLibro()
    {
      if(isset($_REQUEST['book'])&&($_REQUEST['book'] != '')&&isset($_REQUEST['autor'])&&($_REQUEST['autor'] != '')&&isset($_REQUEST['genero'])&&isset($_FILES['imagesToUpload'])){
        $this->model->agregarLibro($_REQUEST['book'], $_REQUEST['autor'],$_REQUEST['genero'],$_FILES['imagesToUpload']);
        }
      else{
        $this->view->mostrarError('El libro que intenta crear esta vacia');
      }
      $this->view->MostrasIndex();
    }

    function borrarLibro(){
      if(isset($_REQUEST['id'])){
        $this->model->borrarLibro($_REQUEST['id']);
      }
      else{
        $this->view->mostrarError('El libro que intenta borrar no existe');
      }
      $this->view->MostrasIndex();
    }

  }

?>
