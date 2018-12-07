<?php
// Modelo que se encarga de conectar con la base de datos
Class DB
{
  static function connect($db)
  {
    if ($db["driver"]== "mysql")
    {
      $driver=$db["driver"];
      $dbname=$db["dbname"];
      $host = $db["host"];
      $user = $db["user"];
      $password = $db["password"];
      return new PDO("$driver:dbname=$dbname;host=$host;", $user, $password);
    }
  }
}


?>
