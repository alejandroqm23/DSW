<?php
session_start();
if(isset($_SESSION['name'])){


  require_once 'pdo.php';
  if(isset($_POST['enviar']))
  {
      if($_POST['marca']==""){
          $_SESSION['error']="El campo marca es obligatorio";
          header('location: add.php');
          return;
      }
      if($_POST['ano']==""){
          $_SESSION['error']="El campo Kilómetros es obligatorio";
          header('location: add.php');
          return;
      }
      if($_POST['km']==""){
          $_SESSION['error']="El campo año es obligatorio";
          header('location: add.php');
          return;
      }
      if(is_numeric($_POST['ano'])!=true || is_numeric($_POST['km'])!=true){
          $_SESSION['error']="Kilometraje y A&ntilde;o deben ser num&eacute;ricos";
          header('location: add.php');
          return;
      }
      if(!isset($_SESSION['error'])){
          $stmt=$pdo->prepare('Insert into autos (make,year,mileage) Values (:mk,:yr,:mi)');
          $stmt->execute(array(
              ':mk'=>htmlentities($_POST['marca']),
              ':yr'=>htmlentities($_POST['ano']),
              ':mi'=>htmlentities($_POST['km'])
          ));
          $_SESSION['success']="Registro Insertado";
          header('location: index.php');
          return;
      }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Alejandro Quintana Mateos</title>
  </head>
  <body>
    <?php
    if ( isset($_SESSION['error']) ) {
      echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
      unset($_SESSION['error']);
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
        <input type="submit" name="enviar" value="A&ntilde;adir">
        <button type="button" name="cancler" onclick="window.location.href='index.php'">Cancelar</button>
      </p>
    </form>
    <button type="button" name="cancelar" onclick="window.location.href='logout.php'">Logout</button>
  </body>
</html>
<?php
}else{
  die("Acceso denegado");
}
 ?>
