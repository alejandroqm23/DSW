<?php

Class Controlador{

  public function cargaModelo ($modelo) {
    // Carga el modelo
    require_once "../app/modelos/".$modelo.".php";

    //Instanciamos el modelo y lo devuelve
    return new $modelo();

  }


  public function cargaVista ($vista, $datos) {
    // Si el fichero existe lo carga, en caso contrario informa del error y lo devuelve
    if(file_exists("../app/vistas/paginas/".$vista.".php")){
      require_once "../app/vistas/paginas/".$vista.".php";
    }else{
      die("error, no encontrado");
    }
  }

}




?>
