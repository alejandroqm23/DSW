<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Alejandro Quintana Mateos</title>
	</head>
	<body>
		<?php
		if(isset($_SESSION['success'])){
				echo "<p style='color: green;'>".$_SESSION['success']."</p>";
				unset($_SESSION['success']);
		}
		if(isset($_SESSION['error'])){ echo "<p style='color: red;'>".htmlentities($_SESSION['error'])."</p>";
		unset($_SESSION['error']);}
		?>
	<h1>Bienvenido a Autom&oacute;viles</h1>
	<p><a href="login.php">Para avanzar, debes logearte</a></p>
	<p>Intentar acceder a <a href="view.php">view.php</a> sin haberse logeado mostrara un mensaje de error</p>
	</body>
</html>
