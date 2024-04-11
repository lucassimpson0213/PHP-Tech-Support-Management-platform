<?php
use PHPUnit\Framework\TestCase;

require("../models/database.php");
require("../models/product_db.php");

class ProductDeleteTest extends TestCase
{
    public function testDeleteProduct()
    {
        // Create a stub object for the PDO class
        $dbStub = $this->createStub(PDO::class);

        // Create a stub object for the PDOStatement class
        $statementStub = $this->createStub(PDOStatement::class);

        // Configure the PDO stub to return the PDOStatement stub for the prepare method
        $dbStub->method('prepare')
            ->willReturn($statementStub);

        // Configure the PDOStatement stub to return true for the execute method
        $statementStub->method('execute')
            ->willReturn(true);

        // Set the global $db variable to the stubbed PDO object
        global $db;
        $db = $dbStub;

        // Call the delete_product function
        $product_code = 'ABC123';
        $result = delete_product($product_code);

        // Assert that the delete operation returned true
        $this->assertTrue($result);
    }
}