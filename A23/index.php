<?php
session_start();
if(!isset($_SESSION['name'])){


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
	</body>
</html>
<?php
}else{
	  require_once 'pdo.php';
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
	    		?>

	    		<?php
					$sql="SELECT auto_id, make, year,mileage FROM autos ";
					if(isset($_SESSION['marca']) || isset($_SESSION['ano']) || isset($_SESSION['km'])){
						$sql.="WHERE ";
					}
					if(isset($_SESSION['marca'])){
						$sql.=" make like '%".$_SESSION['marca']."%' ";
						unset($_SESSION['marca']);
					}
					if(isset($_SESSION['ano'])){
						$sql.=" year like '%".$_SESSION['ano']."%' ";
						unset($_SESSION['ano']);
					}
					if(isset($_SESSION['km'])){
						$sql.=" mileage like '%".$_SESSION['km']."%' ";
						unset($_SESSION['km']);
					}
	    		$stmt = $pdo->query($sql);
					$numfilas=$stmt->rowCount();
	    		echo '<table border="1">'."\n";
	    		echo "<tr><th>Marca</th><th>A&ntilde;o</th><th>Kil&oacute;metros</th><th>Action</th></tr>";
					if($numfilas){
					while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
	    		    echo "<tr><td>";
	    		    echo($row['make']);
	    		    echo("</td><td>");
	    		    echo($row['year']);
	    		    echo("</td><td>");
	    		    echo($row['mileage']);
	    		    echo("</td><td>");
	    		    echo('<button type="button" name="delete" onclick="window.location.href=\'del.php\'">Delete</button>');
	            echo("<button type='button' name='edit' onclick='window.location.href=\"edit.php?auto=".$row['auto_id']."\"'>Edit</button>");
	    		    echo("</td></tr>\n");
	    		}
				}else{
					echo "<tr><th colspan=4>No se encontraron resultados</th></tr>";
				}
	    		echo "</table>\n";?>
	        <button type="button" name="nuevo" onclick="window.location.href='add.php'">Nuevo</button>
					<button type="button" name="search" onclick="window.location.href='search.php'">Search</button>
	        <button type="button" name="cancelar" onclick="window.location.href='index.php'">Cancelar</button>
	        <button type="button" name="logout" onclick="window.location.href='logout.php'">Logout</button>
	    	</body>
	    </html>
			<?php
}
 ?>
