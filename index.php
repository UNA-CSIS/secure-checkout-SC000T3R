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

        class Product {

            private $products = [
                1 => ['name' => 'MacBook', 'price' => 1000],
                2 => ['name' => 'iPhone', 'price' => 600],
                3 => ['name' => 'AirPods', 'price' => 150]
            ];

            public function display() {
                echo '<h2>Available Products</h2>';
                echo '<form method="post" action="summary.php">';
                foreach ($this->products as $id => $product) {
                    echo "<p>{$product['name']} - \${$product['price']} <input type='number' name='order[{$id}]'</p>";
                }
                echo '<button type="submit">Submit Order</button></form>';
            }
        }

        $product = new Product();
        $product->display();
        ?>
    </body>
</html>
