<?php 
if(isset($_POST['nombre'])){
    session_start();
    $_SESSION[$_POST['nombre']]=$_POST['valor'];
    header('location: index.php');
}
?>