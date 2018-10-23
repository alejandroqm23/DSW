<?php
session_start();
$salt="dvnlserv8nv383v8yrtw8woad9rjfdsaow";
$storedpass=hash('md5',"password".$salt);
if(isset($_POST['name']) || isset($_POST['pass']))
{
    $name=$_POST['name'];
    $pass=$_POST['pass'];
    if($name == "" | $pass=="")
    {
        $_SESSION['error']="Se requiere email y password";
        header('location: index.php');
        return;
    }
    else
    {
        $pass=hash('md5',$pass.$salt);
        if($pass!=$storedpass)
        {
            $_SESSION['error']="Contraseña incorrecta";
            error_log("Login fail ".$name." ".$pass);
            header('location: index.php');
            return;
        }
        if(strpos($_POST['name'],'@') ===false){
            $_SESSION['error']="El correo electrónico debe tener un signo (@)";
            header('location: index.php');
            return;
        }
        if(!isset($_SESSION['error']))
        {
            error_log("Login Success ".$name);
            $_SESSION['name']=$name;
            header("Location: view.php");
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
