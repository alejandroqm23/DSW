<?php
// Este metod se usa para generar la URL que se usará como base para nuestra apliación
class URL
{
  static function base_url()
  {
    if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] != "off")
    {
      $protocol = "https";
    }else{
      $protocol = "http";
    }
    $server_name = $_SERVER["SERVER_NAME"];
    $server_php_self = $_SERVER["PHP_SELF"];
    $path = explode("/", $server_php_self);
    if (in_array("mod_rewrite", apache_get_modules())){
      array_pop($path);
      $path = implode("/", $path);
    }else{
      $path = implode("/", $path);
    }
    return $protocol."://".$server_name.$path;
  }

  static function redirect($url){
    header("location: $url");
  }

  static function redirect1($url){
    header("refresh:1;url=$url");
  }
}

?>
