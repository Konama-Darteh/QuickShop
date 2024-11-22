<?php
session_start();
include_once "../settings/connection.php";
$conn = get_connection();

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $email= mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $select_query = "SELECT * FROM users WHERE email='$email'";

    $result = mysqli_query($conn, $select_query);

    if (mysqli_num_rows($result)==0) {
        echo "You are not registered with us";
        delayedRedirect('../login.php', 2);
        exit();
    }

    $rows = mysqli_fetch_assoc($result);
    if (password_verify($password, $rows['password'])) {
        $_SESSION['username'] = $rows['fName'] . " " . $rows["lName"];
        $_SESSION['role'] = $rows['role'];

        header("Location: ../views/customer/customer_dashboard.php");
    } else {
        echo "Incorrect username or password. Please try again";
        header('refresh:2;url=../login.php');
        exit();
    }
}