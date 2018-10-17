<?php 
session_start();
if(isset($_SESSION['test'])){
    echo "Existe la sesi&oacute;n";
}else{
    echo "No existe la sesi&oacute;n";
}
?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <header>
        <nav>
            <ul>
            	<li><a href="./">Inicio</a></li>
            	<li><a href="conectar.php">Conectar</a></li>
            	<li><a href="desconectar.php">Desconectar</a></li>
            	<li><a href="comprobar.php">Comprobar</a></li>
            </ul>
        </nav>
        </header>
    </body>
</html>