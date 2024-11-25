<?php
// require "../settings/connection.php";
$conn = get_connection();


function get_all_products(){
    $query = "SELECT * FROM products";
    $result = mysqli_query($GLOBALS['conn'], $query);
    if(!$result){
        die("Query failed: ". mysqli_error($GLOBALS['conn']));
    }
    if(mysqli_num_rows($result)>0){
        $productlist = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $productlist;
    } else{
        return false;
    }
}
?>