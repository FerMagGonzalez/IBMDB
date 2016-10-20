<?php

  include_once "model/model.php";

  class PeliculasModel extends Model
  {

    private $pelicula;

    public function getPeliculas()
    {
      $peliculas = array();
      $consulta = $this->db->prepare("SELECT * FROM ibmdb.pelicula");
      $consulta->execute();
      $id=0;
      while ($pelicula = $consulta->fetch()){
        $peliculas[$id]['id'] = $pelicula['id'];
        $peliculas[$id]['titulo'] = $pelicula['titulo'];
        $peliculas[$id]['director'] = $pelicula['director'];
        $peliculas[$id]['img'] = $pelicula['img'];
        $peliculas[$id]['id_libro'] = $pelicula['id_libro'];
        $id++;
      }
      return $peliculas;
    }

    private function buscarId($nombrePelicula)
    {
      $consulta = $this->db->prepare("SELECT * FROM ibmdb.pelicula");
      $consulta->execute();
      while ($pelicula = $consulta->fetch()){
        if ($pelicula['titulo'] = $nombrePelicula) {
          return $pelicula['id'];
        }
      }
    }

    private function subirArchivos($archivos)
    {
      $destino = 'images/uploaded/' . uniqid() . $archivos['name'][0];
      move_uploaded_file($archivos['tmp_name'][0], $destino);
      return $destino;
    }

    public function agregarPelicula($pelicula,$director,$img,$id_libro)
    {
      $id_cat = $this->buscarId($pelicula);
      $ruta = $this->subirArchivos($img);
      $consulta = $this->db->prepare('INSERT INTO ibmdb.pelicula(pelicula, director, img, id_libro) VALUES (?,?,?,?)');
      $consulta->execute(array($pelicula, $director, $ruta, $id_libro));
    }

    public function borrarPelicula($id)
    {
      $consulta = $this->db->prepare('DELETE FROM ibmdb.pelicula WHERE id=?');
      $consulta->execute(array($id));
    }

  }

?>
