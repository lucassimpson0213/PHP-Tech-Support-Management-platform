





<?php

require("../models/database.php");  // provides connection for the database through PDO
require("../models/product_db.php"); // 
      
// functions.php

function greet($name) {
    return "Hello, $name!";
}
?>

// index.php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <?php require("./header.php");  ?>
    </header>
    <main>
        <p> </p>
    </main>
    <footer>
        <?php require("./footer.php");?>
    </footer>
</body>
</html>
