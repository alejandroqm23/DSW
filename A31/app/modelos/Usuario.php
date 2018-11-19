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
}

?>
