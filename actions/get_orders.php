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

function get_personal_order_history($userID){
    $query = "SELECT 
                o.OrderID, 
                o.Date, 
                o.TotalAmount,
                GROUP_CONCAT(CONCAT('ProductID: ', od.ProductID, ', Quantity: ', od.Quantity, ', Price: ', od.Price) SEPARATOR ' | ') AS ProductsBought
              FROM orders o
              JOIN orderdetails od ON o.OrderID = od.OrderID
              WHERE o.UserID = ?
              GROUP BY o.OrderID";
    
    $stmt = mysqli_prepare($GLOBALS['conn'], $query);
    if(!$stmt){
        die("Query preparation failed: " . mysqli_error($GLOBALS['conn']));
    }

    mysqli_stmt_bind_param($stmt, "i", $userID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if(!$result){
        die("Query execution failed: " . mysqli_error($GLOBALS['conn']));
    }

    if(mysqli_num_rows($result) > 0){
        $orderHistory = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $orderHistory;
    } else {
        return false; // No orders found for the user
    }
}
?>