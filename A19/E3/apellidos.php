<?php 
if(isset($_POST['nombre'])){
    session_start();
    $_SESSION['nombre']=$_POST['nombre'];

?>
<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<form method="post" action="confirmar.php">
		<?php 
		echo "<p>Tu nombre de usuario es: " .$_SESSION['nombre']."</p>";
		?>
		<p>Apellidos:<input type="text" name="apellidos" required="required"></p>
		<p><button type="submit" value="reset" name="accion">Enviar</button></p>
		</form>
	</body>
</html>
<?php 
}
?>