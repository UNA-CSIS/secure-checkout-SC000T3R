<?php
session_start();

include ('test_input.php');

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
        <title>checkout.php</title>
    </head>
    <body>
        <?php

        class checkout {

            public function validateCard($number) {


                $cardType = '';
                $lastFourDigits = substr($number, -4);

                if (strlen($number) === 13 && substr($number, 0, 1) === '4') {
                    $cardType = 'VISA';
                    return [$cardType, $lastFourDigits];
                } elseif (strlen($number) === 16 && substr($number, 0, 1) === '4') {
                    $cardType = 'VISA';
                    return [$cardType, $lastFourDigits];
                } elseif (strlen($number) === 16 && (substr($number, 0, 2) >= 51 && substr($number, 0, 2) <= 55)) {
                    $cardType = 'MasterCard';
                    return [$cardType, $lastFourDigits];
                } elseif (strlen($number) === 15 && (substr($number, 0, 2) === '34' || substr($number, 0, 2) === '37')) {
                    $cardType = 'AMEX';
                    return [$cardType, $lastFourDigits];
                } else {
                    return false;
                }
            }

            public function display() {
                echo '<h2>Checkout</h2>';
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $cardNumber = test_input($_POST['card_number']);
                    list($cardType, $lastFourDigits) = $this->validateCard($cardNumber);

                    if ($cardType) {

                        echo "Your {$cardType} ending with {$lastFourDigits} has been charged \$" . number_format($_SESSION['total'], 2);
                        session_destroy();
                    } else {

                        echo "Invalid card. Please check your card number and try again.";
                    }
                }

                echo '<form method="post">
        <p>Enter Credit Card Number: <input type="text" name="card_number" required></p>
        <button type="submit">Pay</button>
      </form>';
            }
        }

        $checkout = new Checkout();
        $checkout->display();
        ?>

    </body>
</html>
