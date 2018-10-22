<?php

// funcion que se utiliza para la comprobacion del premio
function comprobarPremio($valor1,$valor2,$valor3){
  $valor=0;
  if($valor1 ==1 && $valor2==1 && $valor3==1){
    $valor=10;
  }elseif (($valor1 ==1 && $valor2==1 && $valor3!=1) ||
  ($valor1 ==1 && $valor2!=1 && $valor3==1) ||
  ($valor1 !=1 && $valor2==1 && $valor3==1)) {
    $valor=4;
  }elseif ($valor1 ==1 || $valor2==1 || $valor3==1){
    $valor =1;
    if(($valor1 == $valor2) || ($valor1 == $valor3) || ($valor2== $valor3)){
      $valor=3;
    }
  }elseif (($valor1 == $valor2) && ($valor2== $valor3)) {
    $valor=5;
  }elseif (($valor1 == $valor2) || ($valor1 == $valor3) || ($valor2== $valor3)) {
    $valor=2;
  }else{
    $valor=0;
  }
  return $valor;
}
session_name("tragaperras");
session_start();
$simbolos=8;
// su se recibe por GET la variable accion realiza estas acciones
if(isset($_GET["accion"])){
  $accion=$_GET["accion"];
  if ($accion == "moneda") {
      $_SESSION["monedas"] += 1;
      header("Location:index.php");
      return;
  }
  if ($accion == "jugar" && $_SESSION["monedas"] > 0) {
    $_SESSION["fruta1"] = mt_rand(1, $simbolos);
    $_SESSION["fruta2"] = mt_rand(1, $simbolos);
    $_SESSION["fruta3"] = mt_rand(1, $simbolos);
    $_SESSION["monedas"] -= 1;
    $_SESSION["premio"]=comprobarPremio($_SESSION["fruta1"],$_SESSION["fruta2"],$_SESSION["fruta3"]);
    if ($_SESSION["premio"] > 0) {
        $_SESSION["cara"] = "smile";
    } else {
        $_SESSION["cara"] = "sad";
    }
    $_SESSION["monedas"]+=$_SESSION["premio"];
    header("Location:index.php");
    return;
  }
  header("Location:index.php");
  return;
}


?>
