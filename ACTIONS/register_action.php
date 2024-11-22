<?php
include_once "../SETTINGS/connection.php";

$conn = get_connection();

function delayedRedirect($link, $time) {
    echo "<script>
            setTimeout(function() {
                window.location.href = '$link';
            }, " . ($time * 1000) . ");
          </script>";
}

if($_SERVER["REQUEST_METHOD"]=="POST") {
    $uname = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $security_measure = hash("sha256", $password);
    $insert_query = "INSERT INTO user(fname,lname, email, `password`) values('$fname', '$lname', '$email', '$password')";


    // check if username already exists
    $check_username_query = "SELECT * FROM user WHERE uname = '$uname'";
    $check_result = mysqli_query($conn, $check_username_query);

    //check is user already exists
    $check_email_query = "SELECT * FROM user WHERE email = '$email'";
    $check_email_result = mysqli_query($conn, $check_email_query);

    if (mysqli_num_rows($check_result) > 0){
        echo "Username unavailable. Please try again";
    } elseif (mysqli_num_rows($check_email_result) > 0){
        echo "You are already registered.";
        delayedRedirect('../login.php', 5);
    }
    else {
        //execute query
        $result = mysqli_query($conn, $insert_query);
    }
    
    if($result) {
        echo "Registration successful. Redirecting in 5 seconds...";
        delayedRedirect('../login.php', 5);
    } else {
        echo "Error: " . $conn->error;
    }
}
