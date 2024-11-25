<?php
  include_once __DIR__ . "../../actions/get_users.php";
  $var_data = get_all();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QuickShop Admin Dashboard</title>
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
    <h1>    Welcome, Administrator! <br> </h1>
     <h3>Select an option from the menu to get started.</h3> 
  </header>

  <!-- <div class="welcome-message">
    Welcome, Administrator! <br>
    Select an option from the menu to get started.
  </div> -->

  <nav>
    <!-- <a href="#" onclick="showTab('dashboard')">Dashboard</a> -->
    <a href="#" onclick="showTab('users')"> Users</a>
    <a href="#" onclick="showTab('products')"> Products</a>
    <a href="#" onclick="showTab('orders')"> Orders</a>
  </nav>

  <div class="container">
    <!-- Dashboard Section -->
    <div id="dashboard" class="tab active">
      <h2>Dashboard Overview</h2>
      <p>Quick summary of activity and insights will go here.</p>
    </div>

    <!-- User Management Section -->
    <div id="users" class="tab">
      <h2>Manage Users</h2>
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($var_data as $var_row): ?>
            <tr>
            <td> <?php echo $var_row['fName'] . ' ' . $var_row['lName'] ?></td>
            <td> <?php echo $var_row['email'] ?></td>
            <td> <?php echo $var_row['role'] ?></td>
            <td>
                <a href="#">
                <button href="edit_chore_view.php">Edit</button>
                </a>

                <a href="#">
                <button href="../actions/delete_chore_action.php">Delete</button>
                </a>
            </td>
        </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <button>Add New User</button>
    </div>
    <!-- Product Management Section -->
    <div id="products" class="tab">
      <h2>Manage Products</h2>
      <table>
        <thead>
          <tr>
            <th>ProductID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>101</td>
            <td>Smartphone</td>
            <td>Latest model smartphone</td>
            <td>$699</td>
            <td>50</td>
            <td>
              <button>Edit</button>
              <button>Delete</button>
            </td>
          </tr>
          <tr>
            <td>102</td>
            <td>Vacuum Cleaner</td>
            <td>High-power vacuum</td>
            <td>$120</td>
            <td>30</td>
            <td>
              <button>Edit</button>
              <button>Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
      <button>Add New Product</button>
    </div>

    <!-- Order Management Section -->
    <div id="orders" class="tab">
      <h2>Manage Orders</h2>
      <table>
        <thead>
          <tr>
            <th>OrderID</th>
            <th>Date</th>
            <th>User</th>
            <th>Total Amount</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>5001</td>
            <td>2024-11-20</td>
            <td>John Doe</td>
            <td>$200</td>
            <td>
              <button>View</button>
              <button>Delete</button>
            </td>
          </tr>
          <tr>
            <td>5002</td>
            <td>2024-11-21</td>
            <td>Jane Smith</td>
            <td>$150</td>
            <td>
              <button>View</button>
              <button>Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
