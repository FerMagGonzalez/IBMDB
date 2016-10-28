<?php

  include_once 'model/libro_model.php';
  include_once 'model/genero_model.php';
  include_once 'view/libro_view.php';
  include_once 'controller/controller.php';

  class LibrosController extends Controller
  {

    function __construct()
    {
      $this->view = new LibroView();
      $this->model = new LibrosModel();
      $this->modelg = new GeneroModel();
    }

    function RetornarContenido($contenido)
    {
      //$ruta = "templates/" . $contenido . ".tpl";
      $ruta = "templates/index.tpl";
      return $this->view->mostrarTPL($ruta,$this->model->getLibros());
    }

    public function agregarLibro()
    {
      if(isset($_REQUEST['book'])&&($_REQUEST['book'] != '')&&isset($_REQUEST['autor'])&&($_REQUEST['autor'] != '')&&isset($_FILES['imagesToUpload'])&&isset($_REQUEST['movie'])&&isset($_REQUEST['genero'])){
        $this->model->agregarLibro($_REQUEST['book'], $_REQUEST['autor'],$_FILES['imagesToUpload'],$_REQUEST['movie'],$_REQUEST['genero']);
        }
      else{
        $this->view->mostrarError('El libro que intenta crear esta vacio');
      }
    }

    public function actualizarLibroGenero()
    {
      if(isset($_REQUEST['bookMod'])&&($_REQUEST['generoMod'] != '')&&isset($_REQUEST['bookMod'])){
        $this->model->actualizarLibroGenero($_REQUEST['bookMod'],$_REQUEST['generoMod']);
      }
      else{
        $this->view->mostrarError('El libro que intenta crear esta vacio');
      }
    }

    public function actualizarLibro()
    {
      if(isset($_REQUEST['bookMod'])&&($_REQUEST['bookMod'] != '')&&isset($_REQUEST['book'])&&($_REQUEST['book'] != '')&&isset($_REQUEST['autor'])&&($_REQUEST['autor'] != '')&&isset($_FILES['imagesToUpload'])&&isset($_REQUEST['movie'])&&isset($_REQUEST['genero'])){
        $this->model->actualizarLibro($_REQUEST['bookMod'], $_REQUEST['book'], $_REQUEST['autor'],$_FILES['imagesToUpload'],$_REQUEST['movie'],$_REQUEST['genero']);

        }
      else{
        $this->view->mostrarError('El libro que intenta crear esta vacio');
      }
    }

    function borrarLibro(){
      if(isset($_REQUEST['id_libro'])){
        $this->model->borrarLibro($_REQUEST['id_libro']);
      }
      else{
        $this->view->mostrarError('El libro no existe');
      }
    }

    public function listarxGenero(){
      $key = $_GET['valGenero'];
      $libros = $this->model->ListarxGenero($key);
      $this->view->mostrarxGenero($libros);
    }
  }

?>
