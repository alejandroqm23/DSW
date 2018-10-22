<?php
session_name("tragaperras");
session_start();
$simbolos=8;
// si no existe la variable de sesion cara la crea
if(!isset($_SESSION["cara"])){
  $_SESSION["cara"]="plain";
}
// si no existe la variable de sesion premio la crea
if(!isset($_SESSION["premio"])){
  $_SESSION["premio"]=0;
}
// si no existen las variables de sesion de las frutas, o no existe la variable de sesión de las monedas, se crea
if (!isset($_SESSION["monedas"]) || !isset($_SESSION["fruta1"]) ||
    !isset($_SESSION["fruta2"]) || !isset($_SESSION["fruta3"])) {
    $_SESSION["monedas"] = 0;
    $_SESSION["fruta1"] = mt_rand(1, $simbolos);
    $_SESSION["fruta2"] = mt_rand(1, $simbolos);
    $_SESSION["fruta3"] = mt_rand(1, $simbolos);
}
?>
<!DOCTYPE html>
<html>
  <head></head>
  <body>
    <?php
     ?>
     <form method="get" action="tragaperras2.php">
       <table width="100%" height="100%">
         <tr><td>
           <table width="58%" align="center"  style="border: black 4px solid; padding: 10px">
             <tr>
               <?php
               print "        <td style=\"border: black 4px solid; padding: 10px\">"
                      . "<img src=\"frutas/".$_SESSION["fruta1"].".svg\" width=\"160\" alt=\"Imagen\" /></td>\n";
               print "        <td style=\"border: black 4px solid; padding: 10px\">"
                      . "<img src=\"frutas/".$_SESSION["fruta2"].".svg\" width=\"160\" alt=\"Imagen\" /></td>\n";
               print "        <td style=\"border: black 4px solid; padding: 10px\">"
                      . "<img src=\"frutas/".$_SESSION["fruta3"].".svg\" width=\"160\" alt=\"Imagen\" /></td>\n";
                ?>
              <td><button type="submit" name="accion" value="moneda">Meter moneda</button><br>
                <?php print "<p style=\"margin: 0; font-size: 300%; border: black 4px solid; padding: 2px\">$_SESSION[monedas]</p>\n"; ?>
                  <button type="submit" name="accion" value="jugar">Jugar</button>
                  <?php
                  if (isset($_SESSION["cara"])) {
                    print "            <p style=\"margin: 1px; font-size: 300%; border: black 4px solid; padding: 2px\">";
                    print "<img src=\"face-$_SESSION[cara].svg\" alt=\"Mal\" height=\"50\" />$_SESSION[premio]</p>\n";
                  }
                  ?>
              </td>
             </tr>
           </table>
         </td></tr>
      </table>
    </form>
  </body>
</html>
