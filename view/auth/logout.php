<?php
session_start();

if(isset($_POST['logout'])){
    unset($_SESSION['Uid']);
    header("location: login.php");
}



?>


?>