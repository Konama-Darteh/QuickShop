<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Document</title>
</head>
<body>
    <form action="./actions/login_action.php" method="post">

        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="john.doe@example.com">

        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;">

        <input type="submit" id="register" value="Login">

        <p>Don't have an account? <a href="./index.php">Register</a></p>
    </form>
</body>
</html>