<?php
require("../models/database.php");
require("../models/product_db.php");

//http://localhost/product_manager-project1/testing/test_table.php
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












//127.0.0.1/tech_support/products/		http://localhost/phpmyadmin/index.php?route=/table/sql&db=tech_support&table=products

//Showing rows 0 -  6 (7 total, Query took 0.0008 seconds.)


//select * from products;


//productCode	name	version	releaseDate	
//DRAFT10	Draft Manager 1.0	1.0	2019-03-01 00:00:00	
//DRAFT20	Draft Manager 2.0	2.0	2021-08-15 00:00:00	
//LEAG10	League Scheduler 1.0	1.0	2018-06-01 00:00:00	
//LEAGD10	League Scheduler Deluxe 1.0	1.0	2018-09-01 00:00:00	
//TEAM10	Team Manager Version 1.0	1.0	2020-06-01 00:00:00	
//TRNY10	Tournament Master Version 1.0	1.0	2018-01-01 00:00:00	
//TRNY20	Tournament Master Version 2.0	2.0	2020-03-15 00:00:00	
?>