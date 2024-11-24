<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled Navbar</title>
    <style>
        .navbar {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            font-size: 24px;
        }

        .navbar-logo {
            text-decoration: none;
            color: #fff;
            padding: 0px 20px 0px 20px;
        }

        .navbar-menu {
            list-style-type: none;
            margin: 0;
            padding: 0px 20px 0px 20px;
        }

        .navbar-item {
            display: inline-block;
            margin-left: 20px;
        }

        .navbar-link {
            text-decoration: none;
            color: #fff;
            font-size: 18px;
        }

        .navbar-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <div class="navbar-brand">
                <a href="../views/dashboard.php" class="navbar-logo">Quickshop</a>
            </div>
            <ul class="navbar-menu">
                <li class="navbar-item"><a href="../admin/users.php" class="navbar-link">Users</a></li>
                <li class="navbar-item"><a href="../views/products.php" class="navbar-link">Products</a></li>
                <li class="navbar-item"><a href="../views/orders.php" class="navbar-link">Orders</a></li>
            </ul>
        </div>
    </nav>
</body>
</html>
