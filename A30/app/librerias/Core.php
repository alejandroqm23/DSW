<?php
class Core {

    protected $controladorActual ="Paginas"; //Controlador por defecto
    protected $metodoActual = "index"; // Método por defecto
    protected $parametros = []; // Por defecto no hay parámetros
    // el constructor, es el que se encarga de dar valor a la variable url con la función
    // getURL()
    public function __construct() {
        $url = $this->getUrl();
        //Comprueba si existe el archivo, que usaremos como primer argumento en la url
        // como controlador, si existe, cambia el controlador actual por ese controlador,
        // en caso contrario se usará el controlador por defecto que es Paginas
        if(file_exists("../app/controladores/" . ucwords($url[0]) . ".php")) {
          $this->controladorActual = ucwords($url[0]);
          unset($url[0]);
        }

        require_once "../app/controladores/" . $this->controladorActual . ".php";
        $this->controladorActual = new $this->controladorActual;

        //Comprueba si el metodo dado como segundo paramentro en la url existe dentro
        // del controlador actual, en caso de existir se usará como metodo actual, en
        // caso contrario se usará el metodo por defecto que es index
        if (isset($url[1])) {
          if (method_exists($this->controladorActual, $url[1])) {
            $this->metodoActual = $url[1];
            unset($url[1]);
          }
        }
        $this->parametros = $url ? array_values($url) : [];
        call_user_func_array ([$this->controladorActual, $this->metodoActual], $this->parametros);
    }

    // esta funcion es ta que imprime la variable url que le llega por GET
    public function getURL(){
      if (isset($_GET["url"])) {
        $url = rtrim($_GET["url"], "/");//esta funcion se encarga de remover todo lo que
        // se encuentra a la derecha de la cadena especificada
        $url = filter_var($url, FILTER_SANITIZE_URL);// Elimina todos los caracteres, excepto
        // letras y dígitos
        $url = explode("/", $url);//Separa un String en un array usando como base la /
        return $url; //devuelve la variable url
      }
    }
}

?>
