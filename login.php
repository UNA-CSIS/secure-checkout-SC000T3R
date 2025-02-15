<?php
session_start();

include('test_input.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);

    if (!empty($username) && !empty($password)) {
        if ($password === $username) {
            $_SESSION['authenticated'] = true;
            header('Location: index.php');
            exit();
        } else {
            $error = "Invalid username or password.";
        }
    } else {
        $error = "Username and password cannot be blank.";
    }
}
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>login.php</title>
    </head>
    <body>
        <form method="post">
            <p>Username: <input type="text" name="username" required></p>
            <p>Password: <input type="password" name="password" required></p>
            <button type="submit">Login</button>
        </form>

        <?php
        if (isset($error))
            echo "<p style='color:red;'>$error</p>";
        ?>
    </body>
</html>
