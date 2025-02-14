<?php
session_start();
if (!isset($_SESSION['authenticated'])) {
    header('Location: login.php');
    exit();
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
        <title>summary.php</title>
    </head>
    <body>
        <?php

        class summary {

            public function display() {
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order'])) {
                    $_SESSION['order'] = $_POST['order'];
                }

                if (!isset($_SESSION['order'])) {
                    header('Location: index.php');
                    exit();
                }

                echo '<h2>Order Summary</h2>';
                $subtotal = 0;
                $products = [
                    1 => ['name' => 'MacBook', 'price' => 1000],
                    2 => ['name' => 'Iphone', 'price' => 600],
                    3 => ['name' => 'AirPods', 'price' => 150]
                ];

                foreach ($_SESSION['order'] as $id => $qty) {
                    if ($qty > 0) {
                        $itemTotal = $products[$id]['price'] * $qty;
                        echo "<p>{$products[$id]['name']} x {$qty} = \${$itemTotal}</p>";
                        $subtotal += $itemTotal;
                    }
                }

                $_SESSION['subtotal'] = $subtotal;
                echo "<p>Subtotal: \$" . number_format($subtotal, 2) . "</p>";
                echo '<a href="tax.php">Go to Tax Calculation</a>';
            }
        }

        $summary = new Summary();
        $summary->display();
        ?>


    </body>
</html>
