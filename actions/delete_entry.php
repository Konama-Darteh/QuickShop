<?php
include_once "../settings/connection.php";

if(isset($_GET["userID"])){
    $id = $_GET['userID'];
    echo "Page has been accessed";
    $query = "DELETE FROM users WHERE userID = $id";

    $result = mysqli_query($GLOBALS['conn'], $query);
    if($result) {
        header( "location: ../views/admin.php" );
        exit();
    } else {
        echo "Error: ". $conn->error;
    }
}

?>