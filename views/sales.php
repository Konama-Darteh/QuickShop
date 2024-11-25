<?php
  include "../actions/get_users.php";
  include "../actions/get_products.php";
  include "../actions/get_orders.php";

  $var_data = get_all();
  $var_products = get_all_products();
  $var_orders = get_all_orders();
  $var_order_details = get_all_order_details();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QuickShop Sales Dashboard</title>
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
    <!-- <h1>QuickShop Sales Dashboard</h1> -->
  </header>

  <div class="welcome-message">
    Welcome, Sales Personnel! <br>
    Select an option from the menu to manage orders or assist customers.
  </div>

  <nav>
    <a href="#" onclick="showTab('viewOrders')">Orders</a>
    <a href="#" onclick="showTab('viewProducts')"> Products</a>
  </nav>

  <div class="container">
    <!-- View/Update Orders Section -->
    <div id="viewOrders" class="tab active">
      <h2>Orders Management</h2>
      <table>
        <thead>
          <tr>
            <th>OrderID</th>
            <th>Date</th>
            <th>CustomerID</th>
            <th>Total Amount</th>
            <th>Actions</th>
          </tr>
        <tbody>
        <?php foreach ($var_orders as $var_row): ?>
            <tr>
              <td> <?php echo $var_row['OrderID']?></td>
              <td> <?php echo $var_row['Date'] ?></td>
              <td> <?php echo $var_row['UserID'] ?></td>
              <td> <?php echo $var_row['TotalAmount'] ?></td>
              <td>
                  <a href="#">
                  <button href="edit_chore_view.php">Process</button>
                  </a>

                  <a href="#">
                  <button href="../actions/delete_chore_action.php">Delete</button>
                  </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <!-- View Products Section -->
    <div id="viewProducts" class="tab">
      <h2>Product Catalog</h2>
      <table>
        <thead>
          <tr>
            <th>ProductID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Stock</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($var_products as $var_row): ?>
            <tr>
              <td> <?php echo $var_row['prodID'] ?></td>
              <td> <?php echo $var_row['prodName'] ?></td>
              <td> <?php echo $var_row['prodDescription'] ?></td>
              <td> <?php echo $var_row['price'] ?></td>
              <td> <?php echo $var_row['stockQuantity'] ?></td>
          </tr>
            <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>

