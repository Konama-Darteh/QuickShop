<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QuickShop Inventory Dashboard</title>
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
    <!-- <h1>QuickShop Inventory Dashboard</h1> -->
  </header>

  <div class="welcome-message">
    Welcome, Inventory Manager! <br>
    Select an option from the menu to manage stock levels or analyze sales trends.
  </div>

  <nav>
    <a href="#" onclick="showTab('manageProducts')">Manage Products</a>
    <a href="#" onclick="showTab('viewOrders')">View Orders</a>
  </nav>

  <div class="container">
    <!-- Manage Products Section -->
    <div id="manageProducts" class="tab active">
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
              <button>Update Stock</button>
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
              <button>Update Stock</button>
            </td>
          </tr>
        </tbody>
      </table>
      <button>Add New Product</button>
    </div>

    <!-- View Orders Section -->
    <div id="viewOrders" class="tab">
      <h2>Orders Overview</h2>
      <table>
        <thead>
          <tr>
            <th>OrderID</th>
            <th>Date</th>
            <th>Customer</th>
            <th>Total Amount</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>5001</td>
            <td>2024-11-20</td>
            <td>John Doe</td>
            <td>$200</td>
          </tr>
          <tr>
            <td>5002</td>
            <td>2024-11-21</td>
            <td>Jane Smith</td>
            <td>$150</td>
          </tr>
        </tbody>
      </table>

      <h3>Order Details</h3>
      <table>
        <thead>
          <tr>
            <th>OrderDetailID</th>
            <th>OrderID</th>
            <th>ProductID</th>
            <th>Quantity</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1001</td>
            <td>5001</td>
            <td>101</td>
            <td>2</td>
            <td>$1398</td>
          </tr>
          <tr>
            <td>1002</td>
            <td>5002</td>
            <td>102</td>
            <td>1</td>
            <td>$120</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
