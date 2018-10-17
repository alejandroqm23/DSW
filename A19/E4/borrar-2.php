<?php 
if(isset($_POST['borrar'])){
    session_start();
    foreach ($_SESSION as $key=>$value) {
        if(isset($_POST[$key])){
            unset($_SESSION[$key]);
        }
    }
    header('location: index.php');
}
?>