<?php
session_start();
if(isset($_SESSION['name']))
{
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
    		$stmt = $pdo->query("SELECT auto_id, make, year,mileage FROM autos");
    		echo '<table border="1">'."\n";
    		echo "<tr><th>Marca</th><th>A&ntilde;o</th><th>Kil&oacute;metros</th><th>Action</th></tr>";
    		while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
    		    echo "<tr><td>";
    		    echo($row['make']);
    		    echo("</td><td>");
    		    echo($row['year']);
    		    echo("</td><td>");
    		    echo($row['mileage']);
    		    echo("</td><td>");
    		    echo('<button type="button" name="delete" onclick="window.location.href=\'del.php\'">Delete</button>');
    		    echo("</td></tr>\n");
    		}
    		echo "</table>\n";?>
        <button type="button" name="nuevo" onclick="window.location.href='add.php'">Nuevo</button>
        <button type="button" name="cancelar" onclick="window.location.href='view.php'">Cancelar</button>
        <button type="button" name="logout" onclick="window.location.href='logout.php'">Logout</button>
    	</body>
    </html>
    <?php
}
else
{
    die("Falta el nombre del par&aacute;metro");
}
?>
