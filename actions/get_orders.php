<?php
// require "../settings/connection.php";
$conn = get_connection();


function get_all_orders(){
    $query = "SELECT * FROM orders";
    $result = mysqli_query($GLOBALS['conn'], $query);
    if(!$result){
        die("Query failed: ". mysqli_error($GLOBALS['conn']));
    }
    if(mysqli_num_rows($result)>0){
        $orderslist = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $orderslist;
    } else{
        return false;
    }
}


function get_all_order_details(){
    $query = "SELECT * FROM orderdetails";
    $result = mysqli_query($GLOBALS['conn'], $query);
    if(!$result){
        die("Query failed: ". mysqli_error($GLOBALS['conn']));
    }
    if(mysqli_num_rows($result)>0){
        $orderdetailslist = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $orderdetailslist;
    } else{
        return false;
    }
}
?>