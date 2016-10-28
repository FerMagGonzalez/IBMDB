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
        $libros[$id]['pelicula'] = $libro['pelicula'];
        $libros[$id]['id_genero'] = $libro['id_genero'];
        $id++;
      }
      return $libros;
    }

    private function buscarId($titulo)
    {
      $consulta = $this->db->prepare("SELECT * FROM ibmdb.libro");
      $consulta->execute();
      while ($libro = $consulta->fetch()){
        if ($libro['titulo'] == $titulo) {
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

    public function agregarLibro($libro,$autor,$portada,$pelicula,$genero)
    {
      $ruta = $this->subirArchivos($portada);
      $consulta = $this->db->prepare('INSERT INTO ibmdb.libro(titulo, autor, portada,pelicula, id_genero) VALUES (?,?,?,?,(select id from ibmdb.genero where tipo=?))');
      $consulta->execute(array($libro, $autor, $ruta,$pelicula,$genero));
    }

    public function actualizarLibroGenero($libro,$genero)
    {
      $id_libro = $this->buscarId($libro);
      $consulta = $this->db->prepare('UPDATE ibmdb.libro SET id_genero=(select id from genero where tipo=?) WHERE id=?');
      $consulta->execute(array($genero,$id_libro));
    }

    public function actualizarLibro($libro,$titulo,$autor,$portada,$pelicula,$genero)
    {
      $id_libro = $this->buscarId($libro);
      $ruta = $this->subirArchivos($portada);
      $consulta = $this->db->prepare('UPDATE ibmdb.libro SET titulo=?, autor=?, portada=?, pelicula=?, id_genero=(select id from genero where tipo=?) WHERE id=?');
      $consulta->execute(array($titulo,$autor,$ruta,$pelicula,$genero,$id_libro));
    }

    public function borrarLibro($id)
    {
      $consulta = $this->db->prepare('DELETE FROM ibmdb.libro WHERE id=?');
      $consulta->execute(array($id));
    }

    function ListarxGenero($valGenero){
      $sentencia = $this->db->prepare("SELECT * from libro where id_genero = (select id from genero where tipo=?)");
      $sentencia->execute(array($valGenero));
      return $sentencia;
    }

  }

?>
