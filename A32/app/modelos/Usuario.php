<?php

class Usuario{
  private $db;
  public function __construct(){
    $this->db=new Base();
  }

  public function obtenerUsuarios(){
    $this->db->query("Select * from usuarios");
    return $this->db->registros();
  }

  public function agregarUsuario($datos){
    $this->db->query('Insert into usuarios (nombre, email, tlf) values (:nombre, :email, :tlf)');
    $this->db->bind(":nombre",$datos["nombre"]);
    $this->db->bind(":email",$datos["email"]);
    $this->db->bind(":tlf",$datos["tlf"]);
    if ($this->db->execute()) {
      return true;
    }else{
      return false;
    }
  }

  public function obtenerUsuario($id){
    $this->db->query("Select * from usuarios where id_usuario = :id");
    $this->db->bind(":id",$id);
    return $this->db->registro();
  }

  public function actualizarUsuario($datos){
    $this->db->query('Update usuarios set nombre = :nombre, email = :email, tlf = :tlf where id_usuario = :id');
    $this->db->bind(":nombre",$datos["nombre"]);
    $this->db->bind(":email",$datos["email"]);
    $this->db->bind(":tlf",$datos["tlf"]);
    $this->db->bind(":id",$datos["id"]);
    if ($this->db->execute()) {
      return true;
    }else{
      return false;
    }
  }

  public function borrarUsuario($id){
    $this->db->query('Delete from usuarios where id_usuario = :id');
    $this->db->bind(":id",$id);
    if ($this->db->execute()) {
      return true;
    }else{
      return false;
    }
  }
}

?>
