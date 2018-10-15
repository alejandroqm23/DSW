<?php 
$mensaje="";
$salt="dvnlserv8nv383v8yrtw8woad9rjfdsaow";
$storedpass=hash('md5',"password".$salt);
if(isset($_POST['name']) || isset($_POST['pass']))
{
    $name=$_POST['name'];
    $pass=$_POST['pass'];
    if($name == "" | $pass=="")
    {    
        $mensaje="Se requiere email y password";   
    }
    else
    {
        $pass=hash('md5',$pass.$salt);
        if($pass!=$storedpass)
        {
            $mensaje="Contrase&ntilde;a incorrecta";
            error_log("Login fail ".$name." ".$pass);
        }
        if(strpos($_POST['name'],'@') ===false){
            $mensaje="El correo electr&oacute;nico debe tener un signo (&#64;)";
        }
        if($mensaje=="")
        {
            error_log("Login Success ".$name);
            header("Location: autos.php?name=".urlencode($name));
        }
    }
    
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Alejandro Quintana Mateos</title>
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	</head>
	<body>
		<?php if(isset($_POST['pass'])){ echo "<p>".$mensaje."</p>";} ?>
		<form action="login.php" method="post">
			<p>
				<label for="name">Correo Electr&oacute;nico</label>
				<input type="text" id="name" name="name" 
					size="40" placeholder="Correo requerido">
			</p>
			<p>
				<label for="pass">Password</label>
				<input type="password" id="pass" name="pass" size="40"
				placeholder="Password obligatorio";>
			</p>
			<p>
				<input type="submit" name="enviar" value="Iniciar Sesi&oacute;n">
			</p>
		</form>
	</body>
</html>