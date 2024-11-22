<?php
include_once "../SETTINGS/connection.php";

$conn = get_connection();

session_start();

// Redirect if not logged in as admin
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../login.php");
    exit();
}

// Handle CRUD operations
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_user'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $role = $_POST['role'];

        $sql = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username, $email, $password, $role]);
    } elseif (isset($_POST['edit_user'])) {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $role = $_POST['role'];

        $sql = "UPDATE users SET username = ?, email = ?, role = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username, $email, $role, $id]);
    } elseif (isset($_POST['delete_user'])) {
        $id = $_POST['id'];

        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
    }
}

// Fetch all users
$users = $pdo->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="../CSS/manage_user.css">
</head>
<body>
    <div class="admin-dashboard">
        <h1>Manage Users</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['role'] ?></td>
                    <td>
                        <form method="POST" class="inline-form">
                            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                            <input type="text" name="username" value="<?= $user['username'] ?>">
                            <input type="text" name="email" value="<?= $user['email'] ?>">
                            <select name="role">
                                <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                                <option value="user" <?= $user['role'] === 'user' ? 'selected' : '' ?>>User</option>
                            </select>
                            <button type="submit" name="edit_user">Edit</button>
                        </form>
                        <form method="POST" class="inline-form">
                            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                            <button type="submit" name="delete_user">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Add New User</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <select name="role">
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
            <button type="submit" name="add_user">Add User</button>
        </form>
    </div>
</body>
</html>
