<?php
  // Start the session
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

// Example: Set a sample UserID if not already set (for testing purposes)
if (!isset($_SESSION['UserID'])) {
  $_SESSION['UserID'] = 1; // Replace 1 with the actual UserID of the logged-in user
}
  
  
  include "../actions/get_users.php";
  include "../actions/get_products.php";
  include "../actions/get_orders.php";

  $var_data = get_all();
  $var_products = get_all_products();
  $var_orders = get_all_orders();
  $var_order_details = get_all_order_details();
  $var_personal_orders = get_personal_order_history($_SESSION['UserID']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QuickShop Customer Dashboard</title>
  <style>
    /* Inline CSS */
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f9;
      margin: 0;
      padding: 0;
    }

    /* header {
      background-color: #3f51b5;
      color: white;
      padding: 1rem 0;
      text-align: center;
    } */

    .welcome-message {
      background-color: #e8eaf6;
      padding: 1rem;
      text-align: center;
      font-size: 1.2rem;
      color: #3f51b5;
      font-weight: bold;
    }

    nav {
      background: #e8eaf6;
      padding: 0.5rem;
      text-align: center;
    }

    nav a {
      margin: 0 1rem;
      text-decoration: none;
      color: #3f51b5;
      font-weight: bold;
    }

    nav a:hover {
      text-decoration: underline;
    }

    .container {
      padding: 1rem;
    }

    h1 {
      color: #3f51b5;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin: 1rem 0;
    }

    table th, table td {
      padding: 0.5rem;
      text-align: left;
      border: 1px solid #ddd;
    }

    button {
      padding: 0.5rem 1rem;
      background-color: #3f51b5;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: #303f9f;
    }

    .tab {
      display: none;
    }

    .tab.active {
      display: block;
    }
  </style>
  <script>
    // JavaScript to toggle between sections
    function showTab(tabId) {
      const tabs = document.querySelectorAll('.tab');
      tabs.forEach(tab => tab.classList.remove('active'));
      document.getElementById(tabId).classList.add('active');
    }
  </script>
</head>
<body>
  <header>
  </header>

  <div class="welcome-message">
    Welcome, Customer! <br>
    Select an option from the menu to browse products or view your orders.
  </div>

  <nav>
    <a href="#" onclick="showTab('browseProducts')">Browse Products</a>
    <a href="#" onclick="showTab('viewOrders')">View Order History</a>
    <a href="#" onclick="showTab('updateInfo')">Update Information</a>
  </nav>

  <div class="container">
    <!-- Browse Products Section -->
    <div id="browseProducts" class="tab active">
      <h2>Browse Products</h2>
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Stock</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($var_products as $var_row): ?>
            <tr>
              <td> <?php echo $var_row['prodName'] ?></td>
              <td> <?php echo $var_row['prodDescription'] ?></td>
              <td> <?php echo $var_row['price'] ?></td>
              <td> <?php echo $var_row['stockQuantity'] ?></td>
          </tr>
            <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <!-- View Order History Section -->
    <div id="viewOrders" class="tab">
      <h2>Your Order History</h2>
      <table>
        <thead>
          <tr>
            <th>OrderID</th>
            <th>Date</th>
            <th>Products Bought</th>
            <th>Total Amount</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($var_personal_orders as $var_row): ?>
            <tr>
              <td> <?php echo $var_row['OrderID'] ?></td>
              <td> <?php echo $var_row['Date'] ?></td>
              <td> <?php echo $var_row['ProductsBought']; ?> </td>
              <td> <?php echo $var_row['TotalAmount'] ?></td>
          </tr>
            <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <!-- Update Information Section -->
    <div id="updateInfo" class="tab">
      <h2>Update Your Information</h2>
      <form>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter new password" required><br><br>
        
        <button type="submit">Update Information</button>
      </form>
    </div>
  </div>
</body>
</html>
