<?php
session_start();
include_once "../settings/connection.php";
$conn = get_connection();

if($_SERVER["REQUEST_METHOD"]=="POST") {
    $fName = mysqli_real_escape_string($conn, $_POST['fname']);
    $lName = mysqli_real_escape_string($conn, $_POST['lname']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $select_query = "SELECT * FROM user WHERE fName='$fName' AND lName='$lName'";

    $result = mysqli_query($conn, $select_query);

    if (mysqli_num_rows($result)==0){
        echo "You are not registered with us";
    } else {
        $rows = mysqli_fetch_assoc($result);
        $security_measure = password_hash($password, PASSWORD_BCRYPT);
        if($security_measure === $rows['password']){
            $_SESSION['username'] = $rows['uname'];
            $_SESSION['email'] = $rows['email'];
            $_SESSION['password'] = $rows['password'];
            
            header("Location: ../customer/customer_dashboard.php");
        } else {
            echo "Incorrect username or password. Please try again";
        }
    
    }
}
