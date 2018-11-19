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

}
?>
