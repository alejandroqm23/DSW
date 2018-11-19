<?php
require_once "../app/librerias/Controlador.php";
class Paginas Extends Controlador {
    // los modelos se cargan desde este construnctor
    public function __construct() {
    }
    public function index(){
      $datos=Array("Titulo"=>"Framework de Alejandro");
      $this->cargaVista("inicio",$datos);
    }

}
?>
