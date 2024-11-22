<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/login.css">
    <title>Document</title>
</head>
<body>
    <!-- <p>Hello! Register</p> -->
    <form action="actions/register_action.php" method="post" onsubmit="return validateForm()">
        <label for="email">Email</label>
        <input required type="email" name="email" id="email" placeholder="john.doe@example.com">
    
        <label for="fname">firstname</label>
        <input required type="text" name="fname" id="fname" placeholder="DoeJohn123" title="Letters, numbers, and '_' and '-'">

        <label for="lname">lastname</label>
        <input required type="text" name="lname" id="lname" placeholder="Smith" title="Letters only">
    
        <label for="password">Password</label>
        <input required type="password" name="password" id="password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" title="8 - 15 characters,at least one upper case English letter, one lower case English letter, one number and one special character">

        <label for="password">Retype Password</label>
        <input required type="password" name="repassword" id="repassword" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;">

        <!-- <input type="submit" id="register" value="Register"> -->
        <button type="submit" id="button">Register</button>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </form>
    <p>Registration Notes</p>
    <ul>
            <li>Username: Letters, numbers, and '_' and '-'</li>
            <li>Password: 8 - 15 characters,at least one upper case English letter, one lower case English letter, one number and one special </li>
    </ul>
    <script src="js/register.js"></script>
</body>

</html>