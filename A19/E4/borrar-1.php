<?php 
session_start();
?>
<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<form action="borrar-2.php" method="post">
		<ul>
		<?php 
		foreach ($_SESSION as $key=>$value) {
		    echo "<li><input type='checkbox' name='".$key."' value='".$value."'>".$key.":".$value."</li>";
		}
		?>
		</ul>
		<button type="submit" name="borrar">Borrar</button>
		</form>
		<p><a href="index.php">Volver al inicio</a></p>
	</body>
</html>