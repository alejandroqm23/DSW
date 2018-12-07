<?php
// En este archivo se encuentra toda información referente a la aplicación, como la base de datos y sus diferentes
// campos, el nombre que tendrá la aplicación el layout que se utilizará, en caso de que queramos cargar un layout
// diferente para cada página
class Config
{
  public $appName = "Application";
  public $layout = "layouts/layout";
  public $debug = true;
  // esta es la informacion de la base de datos
  public $db = array(
    'mysql' => array(
      'driver' => 'mysql',
      'dbname' => '',
      'host' => 'localhost',
      'user' => '',
      'password' => ''
    )
  );
  // esta es la vista que se ejecutara como vista de inicio, quiere decir que el controlador se llama demo,
  // y que la vista se llama index
  public $DirectoryIndex="index.php?r=demo/index";
  // esta es la vista que se ejecutara en caso de erro, en caso de no encontrarse una determinada vista/archivo 
  // se ejecutara esta vista
  public $ErrorPage = "index.php?r=demo/error";
  // estas reglas se utilizan para la creación de URL amigable, y no solo para eso, si no, también para limitar
  // los valores que se pueden pasar por la URL
  public $rules = array(
    "demo/index" => array(
      "?r=demo/index" => "index"
    ),

    "demo/login" => array(
      "?r=demo/login" => "login",
    ),
    "demo/insert" => array(
      "?r=demo/insert" => "insert",
    ),
    "demo/delete" => array(
      "?r=demo/delete" => "delete",
      "?r=demo/delete&id=$1" => "delete/id/([0-9]+)"
    ),
    "demo/editar" => array(
      "?r=demo/editar" => "editar",
      "?r=demo/editar&id=$1" => "editar/id/([0-9]+)"
    ),
    "demo/insertH" => array(
      "?r=demo/insertH" => "insertH",
    ),
    "demo/deleteH" => array(
      "?r=demo/deleteH" => "deleteH",
      "?r=demo/deleteH&id=$1" => "deleteH/id/([0-9]+)"
    ),
    "demo/editarH" => array(
      "?r=demo/editarH" => "editarH",
      "?r=demo/editarH&id=$1" => "editarH/id/([0-9]+)"
    ),
    "demo/add" => array(
      "?r=demo/add" => "add",
      "?r=demo/add&id=$1" => "add/id/([0-9]+)"
    ),
    "demo/quit" => array(
      "?r=demo/quit" => "quit",
      "?r=demo/quit&id=$1" => "quit/id/([0-9]+)"
    ),
    "demo/admin" => array(
      "?r=demo/admin" => "admin",
      "?r=demo/admin&errorusuario=$1" => "admin/errorusuario/si"
    ),
    "demo/logout" => array(
      "?r=demo/logout" => "logout"
    ),
    "demo/error" => array(
      "?r=demo/error" => "error"
    ),
  );
}

?>
