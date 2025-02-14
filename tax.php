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
        <title>tax.php</title>
    </head>
    <body>
        <?php

        class tax {

            private $taxRate = 0.045;

            public function display() {
                echo '<h2>Tax Calculation</h2>';

                if (!isset($_SESSION['subtotal'])) {
                    header('Location: index.php');
                    exit();
                }

                $tax = $_SESSION['subtotal'] * $this->taxRate;
                $total = $_SESSION['subtotal'] + $tax;
                $_SESSION['total'] = $total;

                echo "<p>Subtotal: \$" . number_format($_SESSION['subtotal'], 2) . "</p>";
                echo "<p>Tax (4.5%): \$" . number_format($tax, 2) . "</p>";
                echo "<p>Total: \$" . number_format($total, 2) . "</p>";
                echo '<a href="checkout.php">Go to Checkout</a>';
                echo '<br></br><a href="index.php">Continue Shopping</a>';
            }
        }

        $tax = new Tax();
        $tax->display();
        ?>


    </body>
</html>
