<?php
class Database{
  public static function Inicio(){
    $pdo=new PDO('mysql:host=localhost;port=3306;dbname=automoviles;charset=utf8','piloto','coche');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
  }
}
