<?php
require_once "../app/librerias/Controlador.php";
class Paginas Extends Controlador {
    // los modelos se cargan desde este construnctor
    public function __construct() {
        $this->usuarioModelo = $this->cargaModelo("Usuario");
    }
    public function index(){
      $datos=Array("Titulo"=>"Framework de Alejandro","datos"=>$this->usuarioModelo->obtenerUsuarios());
      $this->cargaVista("inicio",$datos);
    }
    public function agregar(){
      $datos=[];
      if(isset($_POST["nombre"])){
        $nombre=htmlentities($_POST["nombre"]);
        $email=htmlentities($_POST["email"]);
        $tlf=htmlentities($_POST["tlf"]);
        $datos=array("nombre"=>$nombre,"email"=>$email,"tlf"=>$tlf);
        if($this->usuarioModelo->agregarUsuario($datos)){
          redireccionar("paginas");
        }
      }else{
        $this->cargaVista("agregar",$datos);
      }
    }

    public function editar($id){
      if(isset($_POST["nombre"])){
        $nombre=htmlentities($_POST["nombre"]);
        $email=htmlentities($_POST["email"]);
        $tlf=htmlentities($_POST["tlf"]);
        $id=htmlentities($_POST["id"]);
        $datos=array("nombre"=>$nombre,"email"=>$email,"tlf"=>$tlf,"id"=>$id);
        if($this->usuarioModelo->actualizarUsuario($datos)){
          redireccionar("paginas");
        }
      }
        $Id=htmlentities($id);
        $datos=$this->usuarioModelo->obtenerUsuario($Id);
        $this->cargaVista("editar",$datos);
    }

    public function borrar($id){
      if(isset($_POST["id"])){
        $Id=htmlentities($_POST["id"]);
        if($this->usuarioModelo->borrarUsuario($Id)){
          redireccionar("paginas");
        }
      }
      $Id=htmlentities($id);
      $datos=$this->usuarioModelo->obtenerUsuario($Id);
      $this->cargaVista("borrar",$datos);
    }

}
?>
