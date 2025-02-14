<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>product.php</title>
    </head>
    <body>
        <?php

        class product {

            private $products = [
                1 => ['name' => 'MacBook', 'price' => 1000],
                2 => ['name' => 'Iphone', 'price' => 600],
                3 => ['name' => 'AirPods', 'price' => 150]
            ];

            public function display() {
                echo '<h2>Available Products</h2>';
                echo '<form method="post" action="index.php?action=summary">';
                foreach ($this->products as $id => $product) {
                    echo "<p>{$product['name']} - \${$product['price']} <input type='number' name='order[{$id}]' value='0'></p>";
                }
                echo '<button type="submit">Submit Order</button></form>';
            }
        }
        ?>
    </body>
</html>
