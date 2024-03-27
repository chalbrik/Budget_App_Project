<?php 
session_start();

if(isset($_SESSION['logged_id']) && isset($_SESSION['logged_name'])){
    unset($_SESSION['logged_id']);
    unset($_SESSION['logged_name']);


    header("Location: index.php");
    exit();

} else {
    header("Location: index.php");
    exit();
}



//jeszcze incomy będą zmiennymi sesyjnymi

?>