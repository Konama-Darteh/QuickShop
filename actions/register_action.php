<?php
include_once "../settings/connection.php";

$conn = get_connection();

function delayedRedirect($link, $time) {
    echo "<script>
            setTimeout(function() {
                window.location.href = '$link';
            }, " . ($time * 1000) . ");
          </script>";
}

if($_SERVER["REQUEST_METHOD"]=="POST") {
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $hashed_passwd = password_hash($password, PASSWORD_BCRYPT);
    $insert_query = "INSERT INTO users(fName,lName, email, `password`, role) values('$fname', '$lname', '$email', '$hashed_passwd', 'customer')";

    //check is user already exists
    $check_email_query = "SELECT * FROM users WHERE email = '$email'";
    $check_email_result = mysqli_query($conn, $check_email_query);

    if (mysqli_num_rows($check_email_result) > 0){
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
