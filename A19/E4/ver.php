<?php 
session_start();
?>
<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<ul>
		<?php 
		foreach ($_SESSION as $key=>$value) {
		    echo "<li>".$key.":".$value."</li>";
		}
		?>
		</ul>
		<p><a href="index.php">Volver al inicio</a></p>
	</body>
</html>