<!DOCTYPE html>
<html>
<head>
    <title>Purchase Bill</title>
</head>
<body>
<center>
    <h1>Purchase Bill</h1>
    <form method="post" action="">
        <label for="product_name">Product Name:</label>
        <input type="text" name="product_name" required><br><br>

        <label for="price">Price per Item:</label>
        <input type="number" step="0.01" name="price" required><br><br>

        <label for="quantity">Quantity Purchased:</label>
        <input type="number" name="quantity" required><br><br>

        <input type="submit" name="add_item" value="Add Item">
    </form>

    <?php
    $purchased_items = [];
    
    if (isset($_POST['add_item'])) {
        $product_name = $_POST['product_name'];
        $price = floatval($_POST['price']);
        $quantity = intval($_POST['quantity']);
        $total_cost = $price * $quantity;

        $item = [
            'product_name' => $product_name,
            'price' => $price,
            'quantity' => $quantity,
            'total_cost' => $total_cost
        ];

        array_push($purchased_items, $item);
    }

    if (!empty($purchased_items)) {
        echo '<h2>Bill Details</h2>';
        echo '<table border="1">';
        echo '<tr><th>Product Name</th><th>Price per Item</th><th>Quantity</th><th>Total Cost</th></tr>';

        $total_purchase_cost = 0;
        foreach ($purchased_items as $item) {
            echo '<tr>';
            echo '<td>' . $item['product_name'] . '</td>';
            echo '<td>' . $item['price'] . '</td>';
            echo '<td>' . $item['quantity'] . '</td>';
            echo '<td>' . $item['total_cost'] . '</td>';
            echo '</tr>';

            $total_purchase_cost += $item['total_cost'];
        }

        echo '<tr><td colspan="3">Total Purchase Cost</td><td>' . $total_purchase_cost . '</td></tr>';
        echo '</table>';
    }
    ?>
</body>
</html>
