<?php
require "../settings/connection.php";
$conn = get_connection();


function get_all(){
    $query = "SELECT * FROM users";
    $result = mysqli_query($GLOBALS['conn'], $query);
    if(!$result){
        die("Query failed: ". mysqli_error($GLOBALS['conn']));
    }
    if(mysqli_num_rows($result)>0){
        $userslist = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $userslist;
    } else{
        return false;
    }
}
?>