<?php 
session_start();
if(!isset($_SESSION['numero'])){
    $_SESSION['numero']=0;
}
?>
<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<form method="post" action="operacion.php">
		<button type="submit" value="restar" name="accion">-</button><?php echo $_SESSION['numero']?><button type="submit" value="sumar" name="accion">+</button>
		<button type="submit" value="reset" name="accion">poner a cero</button>
		</form>
	</body>
</html>