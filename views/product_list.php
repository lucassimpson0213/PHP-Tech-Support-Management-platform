





<?php

 // 
      
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
    <link rel="stylesheet" href="../assets/styles.css" >
</head>
<body>
    <header>
        <?php require("./header.php");  ?>
    </header>
    <main>
        <p><?php require("./table.php"); ?> </p>
    </main>
    <footer>
        <?php require("./footer.php");?>
    </footer>
</body>
</html>
