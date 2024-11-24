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

        switch($rows['role']){
            case 'Admin':
                header("Location: ../views/admin/admin.php");
                break;
            case 'Inventory Manager':
                header("Location: ../views/inventory/inventory.php");
                break;
            case 'Sales Personnel':
                header("Location: ../views/sales/sales.php");
                break;
            case 'Customer':
                header("Location: ../views/customer/customer.php");
                break;
        }

        // header("Location: ../views/customer/customer_dashboard.php");
    } else {
        echo "Incorrect username or password. Please try again";
        header('refresh:2;url=../login.php');
        exit();
    }
}