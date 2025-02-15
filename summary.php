<?php
session_start();
if (!isset($_SESSION['authenticated'])) {
    header('Location: login.php');
    exit();
}
if (!isset($_SESSION['order'])) {
    header('Location: index.php');
    exit();
}
$products = [
    1 => ['name' => 'MacBook', 'price' => 1000],
    2 => ['name' => 'Iphone', 'price' => 600],
    3 => ['name' => 'AirPods', 'price' => 150]
];
$subtotal = 0;
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
        <h2>Order Summary</h2>
        <?php foreach ($_SESSION['order'] as $id => $qty): ?>
            <?php
            if ($qty > 0):
                $itemTotal = $products[$id]['price'] * $qty;
                $subtotal += $itemTotal;
                ?>
                <p><?= $products[$id]['name'] ?> x <?= $qty ?> = $<?= number_format($itemTotal, 2) ?></p>
            <?php endif; ?>
        <?php endforeach; ?>

        <?php $_SESSION['subtotal'] = $subtotal; ?>

        <p>Subtotal: $<?= number_format($subtotal, 2) ?></p>
        <a href="tax.php">Go to Calculation</a>
    </body>
</html>
