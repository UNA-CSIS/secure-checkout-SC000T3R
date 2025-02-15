<?php
session_start();

if (!isset($_SESSION['authenticated'])) {
    header('Location: login.php');
    exit();
}

//$action = $_GET['action'] ?? 'product';
//include "$action.php";
//$page = new $action();
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>index.php</title>
    </head>
    <body>
        <?php
        $products = [
            1 => ['name' => 'MacBook', 'price' => 1000],
            2 => ['name' => 'iPhone', 'price' => 600],
            3 => ['name' => 'AirPods', 'price' => 150]
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_SESSION['order'] = $_POST['order'];
            header('Location: summary.php');
            exit();
        }
        ?>

        <form method = "post">
            <?php foreach ($products as $id => $product):
                ?>
                <p>
                    <?= $product['name'] ?> - $<?= $product['price'] ?>
                    <input type="number" name="order[<?= $id ?>]" value="0" min="0">
                </p>
            <?php endforeach; ?>
            <button type="submit">Submit Order</button>
        </form>
    </body>
</html>
