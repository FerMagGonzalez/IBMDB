<?php

  include_once 'config/config_app.php';
  include_once 'controller/controller.php';
  include_once 'controller/index_Controller.php';
  include_once 'controller/genero_controller.php';
  include_once 'controller/relacion_controller.php';
  include_once 'controller/libro_Controller.php';

  if(!array_key_exists(ConfigApp::$ACTION, $_REQUEST) || $_REQUEST[ConfigApp::$ACTION] == ConfigApp::$ACTION_DEFAULT)
  {
    $controlador = new IndexController();
    $controlador->MostrasIndex();
  }
  else {
    switch ($_REQUEST[ConfigApp::$ACTION])  {
      case ConfigApp::$ACTION_INICIO:
        $controlador = new IndexController();
        echo $controlador->RetornarContenido($_REQUEST[ConfigApp::$ACTION]);
        break;
      case ConfigApp::$ACTION_LISTA_LP:
        $controlador = new RelacionController();
        echo $controlador->RetornarContenido($_REQUEST[ConfigApp::$ACTION]);
        break;
      case ConfigApp::$ACTION_LISTA_GENERO:
        $controlador = new LibrosController();
        $controlador->listarxGenero();
        break;
      case ConfigApp::$ACTION_ADMINITRACION:
        $controlador = new RelacionController();
        echo $controlador->RetornarContenido($_REQUEST[ConfigApp::$ACTION]);
        break;
      case ConfigApp::$ACTION_AMB_AGREGAR_GENERO:
        $controlador = new GeneroController();
        $controlador->agregarGenero();
        echo $controlador->RetornarContenido($_REQUEST[ConfigApp::$ACTION]);
        break;
      case ConfigApp::$ACTION_AMB_EDITAR_GENERO:
        $controlador = new GeneroController();
        $controlador->actualizarGenero();
        echo $controlador->RetornarContenido($_REQUEST[ConfigApp::$ACTION]);
        break;
      case ConfigApp::$ACTION_AMB_BORRAR_GENERO:
        $controlador = new GeneroController();
        $controlador->borrarGenero();
        echo $controlador->RetornarContenido($_REQUEST[ConfigApp::$ACTION]);
        break;
      case ConfigApp::$ACTION_AMB_AGREGAR_LIBRO:
        $controlador = new LibrosController();
        $controlador->agregarLibro();
        echo $controlador->RetornarContenido($_REQUEST[ConfigApp::$ACTION]);
        break;
      case ConfigApp::$ACTION_AMB_BORRAR_LIBRO:
        $controlador = new LibrosController();
        $controlador->borrarLibro();
        echo $controlador->RetornarContenido($_REQUEST[ConfigApp::$ACTION]);
        break;
      case ConfigApp::$ACTION_CONTACTO:
        $indexController = new IndexController();
        echo $indexController->RetornarContenido($_REQUEST[ConfigApp::$ACTION]);
        break;
        case ConfigApp::$ACTION_AMB_EDITAR_LIBROG:
          $controlador = new LibrosController();
          $controlador->actualizarLibroGenero();
          echo $controlador->RetornarContenido($_REQUEST[ConfigApp::$ACTION]);
          break;
        case ConfigApp::$ACTION_AMB_EDITAR_LIBRO:
          $controlador = new LibrosController();
          $controlador->actualizarLibro();
          echo $controlador->RetornarContenido($_REQUEST[ConfigApp::$ACTION]);
          break;
      default:
        echo 'Pagina no encontrada';
        break;
    }
  }
?>
