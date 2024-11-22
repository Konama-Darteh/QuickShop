<?php
session_start();
include_once "../SETTINGS/connection.php";
include "send_OTP.php";
$conn = get_connection();

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$otp = rand(100000, 999999);
if($_SERVER["REQUEST_METHOD"]=="POST") {
    $uname = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $select_query = "SELECT * FROM user WHERE uname='$uname'";

    $result = mysqli_query($conn, $select_query);

    if (mysqli_num_rows($result)==0){
        echo "You are not registered with us";
    } else {
        $rows = mysqli_fetch_assoc($result);
        $security_measure = hash("sha256", $password);
        if($security_measure === $rows['password']){
            
            $_SESSION['username'] = $rows['uname'];
            $_SESSION['email'] = $rows['email'];
            $_SESSION['password'] = $rows['password'];

            // Store the OTP in the database
            $update_otp_query = "UPDATE user SET otp='$otp' WHERE uname='$uname'";
            
            // Execute the update query
            if (mysqli_query($conn, $update_otp_query)) {
                if (sendOTP($_SESSION['email'], $otp)) {
                    // If the email is sent successfully, redirect to the OTP page
                    header("location: ../enter_otp.php");
                } else {
                    echo "Failed to send OTP.";
                }
            } else {
                // If query fails, display the error
                echo "Error updating OTP: " . mysqli_error($conn);
            }
        } else {
            echo "Incorrect username or password. Please try again";
        }
    
    }
}
