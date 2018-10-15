<?php 
if(isset($_REQUEST['name']))
{
    $mensaje="";
    require_once 'pdo.php';
    if(isset($_POST['enviar']))
    {
        if($_POST['marca']==""){
            $mensaje="El campo marca es obligatorioa";
        }
        if(is_numeric($_POST['ano'])!=true || is_numeric($_POST['km'])!=true){
            $mensaje="Kilometraje y A&ntilde;o deben ser num&eacute;ricos";
        }
        if($mensaje==""){
            $stmt=$pdo->prepare('Insert into autos (make,year,mileage) Values (:mk,:yr,:mi)');
            $stmt->execute(array(
                ':mk'=>$_POST['marca'],
                ':yr'=>$_POST['ano'],
                ':mi'=>$_POST['km']
            ));
            $mensaje="Registro Insertado";
        }
    }
    if(isset($_POST['delete'])){
        $sql = "DELETE FROM autos WHERE auto_id = :mat";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':mat' => $_POST['id']));
        $mensaje="Registro borrado";
    }
    ?>
    <!DOCTYPE html>
    <html>
    	<head>
    		<title>Alejandro Quintana Mateos</title>
    	</head>
    	<body>
    		<?php 
    		if($mensaje=="Registro borrado" || $mensaje=="Registro Insertado"){
    		    echo "<p style='color: green;'>".$mensaje."</p>";
    		}else{
    		    echo "<p>".$mensaje."</p>";
    		}
    		?>
    		<form method="post">
    			<p>
    				<label for="marca">Marca</label>
    				<input type="text" id="marca" name="marca" 
    					size="40" placeholder="Marca es requerido">
    			</p>
    			<p>
    				<label for="km">Kil&oacute;metros</label>
    				<input type="number" id="km" name="km" min=0>
    			</p>
    			<p>
    				<label for="ano">A&ntilde;o</label>
    				<input type="number" id="ano" name="ano" min=1900 max=2019>
    			</p>
    			<p>
    				<input type="hidden" name="name" value='<?php $_REQUEST['name']?>'>
    				<input type="submit" name="enviar" value="A&ntilde;adir">
    				<button type="button" onclick="window.location.href='index.php'">Cerrar Sesi&oacute;n</button>
    			</p>
    		</form>
    		
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
    		    echo('<form method="post"><input type="hidden" ');
    		    echo('name="id" value="'.$row['auto_id'].'">'."\n");
    		    echo('<input type="submit" value="Borrar" name="delete">');
    		    echo("\n</form>\n");
    		    echo("</td></tr>\n");
    		}
    		echo "</table>\n";?>
    	</body>
    </html>
    <?php
}
else
{
    die("Falta el nombre del par&aacute;metro");
}
?>