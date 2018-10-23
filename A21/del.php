<?php
session_start();
if(isset($_SESSION['name'])){
  require_once 'pdo.php';
  if(isset($_POST['delete'])){
      $sql = "DELETE FROM autos WHERE auto_id = :mat";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(':mat' => $_POST['id']));
      $_SESSION['success']="Registro borrado";
      header('location: index.php');
      return;
  }
  ?>
  <!DOCTYPE html>
  <html>
    <head>
      <title>Alejandro Quintana Mateos</title>
    </head>
    <body>

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
      <button type="button" name="cancelar" onclick="window.location.href='view.php'">Cancelar</button>
      <button type="button" name="logout" onclick="window.location.href='logout.php'">Logout</button>
    </body>
  </html>
  <?php
}else{
  die("Falta el nombre del par&aacute;metro");
}
 ?>
