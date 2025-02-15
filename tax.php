<?php
session_start();

if (!isset($_SESSION['authenticated']) || !isset($_SESSION['subtotal'])) {
    header('Location: login.php');
    exit();
}

$taxRate = 0.045;
$tax = $_SESSION['subtotal'] * $taxRate;
$total = $_SESSION['subtotal'] + $tax;
$_SESSION['total'] = $total;
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
        <h2>Tax Calculation</h2>
        <p>Subtotal: $<?= number_format($_SESSION['subtotal'], 2) ?></p>
        <p>Tax (4.5%): $<?= number_format($tax, 2) ?></p>
        <p>Total: $<?= number_format($total, 2) ?></p>

        <a href="checkout.php">Proceed to Checkout</a>
        <br><br>
        <a href="index.php?reset=true">Continue Shopping</a>

    </body>
</html>
