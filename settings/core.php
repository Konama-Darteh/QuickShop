<?php
session_start();

function checkLogin(){
    if(!isset($_SESSION['userID'])){
        header("Location: ../login.php");
        die();
    }else{
        return true;
    }
}
?>