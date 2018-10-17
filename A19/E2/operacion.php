<?php 
session_start();
if(isset($_POST['accion'])){
    if($_POST['accion']=="restar"){
        $_SESSION['numero']--;
        header("location: index.php");
    }
    if($_POST['accion']=="sumar"){
        $_SESSION['numero']++;
        header("location: index.php");
    }
    if($_POST['accion']=="reset"){
        $_SESSION['numero']=0;
        header("location: index.php");
    }
}
?>