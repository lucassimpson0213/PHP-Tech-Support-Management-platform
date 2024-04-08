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

    return $table;
}

// PHPUnit test class
use PHPUnit\Framework\TestCase;

class ProductListTest extends TestCase
{
    public function testListProducts()
    {
        // Mocking the database function get_products()
        $mocked_products = [
            ['productCode' => '1', 'name' => 'Product 1', 'version' => '1.0', 'releaseDate' => '2022-01-01'],
            ['productCode' => '2', 'name' => 'Product 2', 'version' => '2.0', 'releaseDate' => '2022-02-01']
        ];

        $mocked_product_db = $this->createMock('ProductDB');
        $mocked_product_db->method('get_products')->willReturn($mocked_products);

        // Set up
        require("../models/database.php");
        require("../models/product_db.php");
        
        // Call the function
        $html_output = list_products();

        // Assertions
        $expected_html = '<tr><td>1</td><td>Product 1</td><td>1.0</td><td>2022-01-01</td><td><button>Delete</button></td></tr><tr><td>2</td><td>Product 2</td><td>2.0</td><td>2022-02-01</td><td><button>Delete</button></td></tr>';
        $this->assertEquals($expected_html, $html_output);
    }
}
