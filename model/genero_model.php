<?php

  include_once "model/model.php";

  class GeneroModel extends Model
  {

    private $genero;

    public function getGeneros()
    {
      $generos = array();
      $consulta = $this->db->prepare("SELECT * FROM genero");
      $consulta->execute();
      $id=0;
      while ($genero = $consulta->fetch()){
        $generos[$id]['id'] = $genero['id'];
        $generos[$id]['tipo'] = $genero['tipo'];
        $id++;
      }
      return $generos;
    }

    private function buscarId($nombreGenero)
    {
      $consulta = $this->db->prepare("SELECT * FROM genero");
      $consulta->execute();
      while ($genero = $consulta->fetch()){
        if ($genero['tipo'] == $nombreGenero) {
          return $genero['id'];
        }
      }
    }

    public function estaGenero($nombreGenero){
      $consulta = $this->db->prepare("SELECT * FROM genero where tipo=?");
      $consulta->execute(array($nombreGenero));
      if (empty($consulta)) {
        return true;
      }
      else {
        return false;
      }
    }

    public function agregarGenero($tipo)
    {
      $consulta = $this->db->prepare('INSERT INTO ibmdb.genero(tipo) VALUES (?)');
      $consulta->execute(array($tipo));
    }

    public function editarGenero($selGenero,$generoMod)
    {
      $id_genero = $this->buscarId($selGenero);
      $consulta = $this->db->prepare('UPDATE ibmdb.genero SET tipo=? WHERE id=?');
      $consulta->execute(array($generoMod,$id_genero));
    }

    public function borrarGenero($id_genero)
    {
      $consulta = $this->db->prepare('DELETE FROM ibmdb.genero WHERE id=?');
      $consulta->execute(array($id_genero));
    }

  }

?>
