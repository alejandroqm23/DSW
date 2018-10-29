<?php
session_start();
if(isset($_SESSION['name'])){
  require_once 'pdo.php';
  if(isset($_GET['auto'])){
    $stmt=$pdo->prepare("SELECT * FROM autos WHERE auto_id = :autoId");
    $stmt->execute(array(":autoId" => $_GET['auto']));
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    if($row === false){
      $_SESSION['error'] = "Identificador no valido";
      header('location: index.php');
      return;
    }else{
      $_SESSION['auto']=$_GET['auto'];
      header('location: edit.php');
      return;
    }
  }
  if(isset($_POST['enviar']))
  {
      if($_POST['marca']==""){
          $_SESSION['error']="El campo marca es obligatorio";
          header('location: edit.php');
          return;
      }
      if($_POST['ano']==""){
          $_SESSION['error']="El campo Kil&oacute;metros es obligatorio";
          header('location: edit.php');
          return;
      }
      if($_POST['km']==""){
          $_SESSION['error']="El campo a&ntilde;o es obligatorio";
          header('location: edit.php');
          return;
      }
      if(is_numeric($_POST['ano'])!=true || is_numeric($_POST['km'])!=true){
          $_SESSION['error']="Kilometraje y A&ntilde;o deben ser num&eacute;ricos";
          header('location: edit.php');
          return;
      }
      if(!isset($_SESSION['error'])){
          $stmt=$pdo->prepare('UPDATE autos SET make=:mk, year=:yr, mileage=:mi WHERE auto_id = :id');
          $stmt->execute(array(
              ':mk'=>htmlentities($_POST['marca']),
              ':yr'=>htmlentities($_POST['ano']),
              ':mi'=>htmlentities($_POST['km']),
              ':id'=>$_POST['id']
          ));
          $_SESSION['success']="Registro Modificado Correctamente";
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
    $sql="SELECT auto_id, make, year,mileage FROM autos WHERE auto_id='".$_SESSION['auto']."'";
    $stmt = $pdo->query($sql);
    while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
    ?>
    <form method="post">
      <p>
        <label for="marca">Marca</label>
        <input type="text" id="marca" name="marca"
          size="40" placeholder="Marca es requerido" value='<?php echo $row['make']; ?>'>
      </p>
      <p>
        <label for="km">Kil&oacute;metros</label>
        <input type="number" id="km" name="km" min=0 value='<?php echo $row['mileage']; ?>'>
      </p>
      <p>
        <label for="ano">A&ntilde;o</label>
        <input type="number" id="ano" name="ano" min=1900 max=2019 value='<?php echo $row['year']; ?>'>
      </p>
      <p>
        <input type="hidden" name="id" value='<?php echo $row['auto_id']; ?>'>
        <input type="submit" name="enviar" value="Modificar">
        <button type="button" name="cancler" onclick="window.location.href='index.php'">Cancelar</button>
      </p>
    </form>
    <button type="button" name="cancelar" onclick="window.location.href='logout.php'">Logout</button>
  </body>
</html>
<?php
unset($_SESSION['auto']);
}
}else{
  die("Acceso denegado");
}
 ?>
