<?php 
if(isset($_POST['accion'])){
    session_start();

?>
<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<?php
		if($_POST['accion']=="si"){
		    echo "<p>Tu nombre de usuario es: " .$_SESSION['nombre']."</p>";
		    echo "<p>Tus apellidos son: " .$_SESSION['apellidos']."</p>";
		}
		if($_POST['accion']=="no"){
		    echo "<p>Tu nombre de usuario no es: " .$_SESSION['nombre']."</p>";
		    echo "<p>Tus apellidos no son: " .$_SESSION['apellidos']."</p>";
		}
		?>
		<p><a href="index.php">Volver a la primera p&aacute;gina</a></p>
	</body>
</html>
<?php 
}
?>