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
      //$ruta = "templates/' . $contenido .'.tpl";
      $ruta = "templates/index.tpl";
      return $this->view->mostrarTPL($ruta,$this->model->getGeneros());
    }

    public function agregarGenero()
    {
      if(isset($_REQUEST['genero']) && ($_REQUEST['genero'] != '')){
      //  $existeGenero=$this->model->estaGenero($_REQUEST['genero']);
      //  if ($existeGenero) {
          $this->model->agregarGenero($_REQUEST['genero']);
      //  }
      //  else {
          $this->view->mostrarError('ERROR: El genero ya se encuentra en la base de datos.');
    //    }
      }
      else{
        $this->view->mostrarError('ERROR: El genero que intenta crear esta vacio.');
      }
    }

    public function actualizarGenero()
    {
      if(isset($_REQUEST['selGenero'])&&isset($_REQUEST['generoMod'])&&($_REQUEST['generoMod'] != ''))
      {
        $this->model->editarGenero($_REQUEST['selGenero'], $_REQUEST['generoMod']);

        }
      else
      {
        $this->view->mostrarError('El genero que intenta crear esta vacio');
      }
    }

    // public function editarGenero()
    // {
    //   $gSel = $_REQUEST['selGenero'];
    //   $gMod = $_REQUEST['generoMod'];
    //   $this->model->editarGenero($gSel,$gMod);
    //
    //
    //   // if(isset($_REQUEST['selGenero'])&&isset($_REQUEST['generoMod'])&&($_REQUEST['generoMod'] != '')){
    //   //     $this->model->editarGenero($_REQUEST['selGenero'],$_REQUEST['generoMod']);
    //   //   }
    //   // else{
    //   //   $this->view->mostrarError('ERROR: El genero que intenta crear esta vacio.');
    //   // }
    // }

    function borrarGenero(){
      if(isset($_REQUEST['id_genero'])){
        $this->model->borrarGenero($_REQUEST['id_genero']);
      }
      else{
        $this->view->mostrarError('La tarea que intenta borrar no existe');
      }
      //$this->view->MostrasIndex();
    }

  }

?>
