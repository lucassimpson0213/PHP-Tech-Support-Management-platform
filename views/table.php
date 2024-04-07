<?php 
require("../models/database.php");
require("../models/product_db.php");

function list_products() {
     $products = get_products();
    $table = ""; // Initialize the table variable
    
   foreach ($products as $product_details) {
        $table .= "<tr>";
        $table .= "<td>" . $product_details['productCode'] . "</td>";
        $table .= "<td>" . $product_details['name'] . "</td>";
        $table .= "<td>" . $product_details['version'] . "</td>";
        $table .= "<td>" . $product_details['releaseDate'] . "</td>";
        $table .= "<td>" . "<button>Delete</button>" . "</td>";
        $table .= "</tr>";
    }

    echo $table;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/styles.css">
    <title>Product List</title>
    <style>
       
    </style>
</head>
<body>

    <h1>Product List</h1>
    <table class="styled-table">
        <tr>
            <th>Product Code</th>
            <th>Name</th>
            <th>Version</th>
            <th>Release Date</th>
            <th></th>
        </tr>
        <?php 
         list_products();
        ?>
    </table>
    <a href="./product_add.php">add product</a>
</body>
</html>



