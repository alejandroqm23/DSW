<?php 
if(isset($_POST['apellidos'])){
    session_start();
    $_SESSION['apellidos']=$_POST['apellidos'];

?>
<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<form method="post" action="final.php">
		<?php 
		echo "<p>Tu nombre de usuario es: " .$_SESSION['nombre']."</p>";
		echo "<p>Tus apellidos son: " .$_SESSION['apellidos']."</p>";
		?>
		<p><button type="submit" value="si" name="accion">Confirmar</button><button type="submit" value="no" name="accion">No confirmar</button></p>
		</form>
	</body>
</html>
<?php 
}
?>