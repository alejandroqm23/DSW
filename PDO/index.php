<?php 
require_once "pdo.php";
if(isset($_POST["Crear"])){
    $sql="Insert into usuarios (userName,name,password) Values (:uName, :name, :password)";
    $stmt=$pdo->prepare($sql);
    $stmt->execute(array(
        ':uName' => $_POST['userName'],
        ':name' => $_POST['Name'],
        ':password' => md5($_POST['password'])
    ));
}
if(isset($_POST['borrar'])){
    $sql="Delete from usuarios where id = :test";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array('test'=>$_POST['id']));
}
?>
<html>
	<head></head>
    <body>
    <table border="1">
        <tr><th>UserName</th><th>Name</th><th>Password</th><th>Action</th></tr>
        <tr>
            <form method='post'>
                <td><input type="text" name='userName' placeholder="userName" required="required"></td>
                <td><input type="text" name='Name' placeholder="Name" required="required"></td>
                <td><input type="password" name="password" placeholder="password" required="required"></td>
                <td><input type="submit" value="crear" name="Crear"></td>
            </form>
        </tr>
        <?php
            $stmt = $pdo->query("SELECT userName, name, password, id FROM usuarios");
            while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                echo "<tr><td>";
                echo($row['userName']);
                echo("</td><td>");
                echo($row['name']);
                echo("</td><td>");
                echo($row['password']);
                echo("</td><td>");
                echo('<form method="post"><input type="hidden" ');
                echo('name="id" value="'.$row['id'].'">'."\n");
                echo('<input type="submit" value="Borrar" name="borrar">');
                echo("\n</form>\n");
                echo("</td></tr>\n");
            }
            $pdo=null;
        ?>
        </table>
	</body>
</html>