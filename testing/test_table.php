<?php
require("../models/database.php");
require("../models/product_db.php");


$values1 = get_products();

foreach($values1 as $key => $value) { 
    echo "Key: " . $key . "<br>" . "Value: ";
    if (is_array($value)) {
        echo implode(", ", $value); // Convert array to string
    } else {
        echo $value; // If $value is not an array, just echo it
    }
    echo "<br>";
}
?>