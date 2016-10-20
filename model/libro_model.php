<?php

  include_once "model/model.php";

  class LibrosModel extends Model
  {

    private $libro;

    public function getLibros()
    {
      $libros = array();
      $consulta = $this->db->prepare("SELECT * FROM ibmdb.libro");
      $consulta->execute();
      $id=0;
      while ($libro = $consulta->fetch()){
        $libros[$id]['id'] = $libro['id'];
        $libros[$id]['titulo'] = $libro['titulo'];
        $libros[$id]['autor'] = $libro['autor'];
        $libros[$id]['portada'] = $libro['portada'];
        $libros[$id]['id_genero'] = $libro['id_genero'];
        $id++;
      }
      return $libros;
    }

    private function buscarId($nombreLibro)
    {
      $consulta = $this->db->prepare("SELECT * FROM ibmdb.libro");
      $consulta->execute();
      while ($libro = $consulta->fetch()){
        if ($libro['titulo'] = $nombreLibro) {
          return $libro['id'];
        }
      }
    }

    private function subirArchivos($archivos)
    {
      $destino = 'images/uploaded/' . uniqid() . $archivos['name'][0];
      move_uploaded_file($archivos['tmp_name'][0], $destino);
      return $destino;
    }

    public function agregarLibro($libro,$autor,$portada,$genero)
    {
      $id_gen = $this->buscarId($genero);
      $ruta = $this->subirArchivos($portada);
      $consulta = $this->db->prepare('INSERT INTO ibmdb.libro(titulo, autor, portada, id_genero) VALUES (?,?,?,?)');
      $consulta->execute(array($libro, $autor, $ruta, $id_gen));
    }

    public function borrarProducto($id)
    {
      $consulta = $this->db->prepare('DELETE FROM ibmdb.libro WHERE id=?');
      $consulta->execute(array($id));
    }

  }

?>
