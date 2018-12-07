<?php
// la función de este archivo es la de cargar cada uno de los modelo, cargar la configuración de nuestra 
// aplicación, cargar los controladores y crear el archivo HTACCESS que usará nuestra aplicación
session_start();
require "Model/ModelRouter.php";
require "Model/ModelDb.php";
require "Model/ModelHtaccess.php";
require "Model/ModelUrl.php";
require "Model/ModelPagination.php";
require "../app/Config/Config.php";
require "../app/Controllers/Controllers.php";


$config = new Config();

if($config->debug)
{
  require "Model/ErrorHandler.php";
}
else
{
  error_reporting("E_ALL");
}


HTACCESS::$DirectoryIndex= $config->DirectoryIndex;
HTACCESS::$ErrorPage=$config->ErrorPage;
HTACCESS::$rules = $config->rules;
HTACCESS::run();
if (isset($_GET["r"])){
  $route=$_GET["r"];

  $route = explode("/", $route);

  $controller = $route[0];
  $action = $route[1];

  $class_controller = ucfirst($controller)."Controller";

  require "../app/Controllers/$class_controller.php";

  $app = new $class_controller;

  call_user_func(array($app, $action));
}

?>
