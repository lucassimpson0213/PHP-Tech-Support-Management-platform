<?php

use PHPUnit\Framework\TestCase;

// Create a stub for the ProductDB class
class ProductDBStub {
    public function get_products() {
        return [
            ['productCode' => '1', 'name' => 'Product 1', 'version' => '1.0', 'releaseDate' => '2022-01-01'],
            ['productCode' => '2', 'name' => 'Product 2', 'version' => '2.0', 'releaseDate' => '2022-02-01']
        ];
    }
}

// Create a stub for the functions in table.php
function list_products() {
    $db = new ProductDBStub();
    $products = $db->get_products();

    $html = '';
    foreach ($products as $product) {
        $html .= '<tr>';
        $html .= '<td>' . $product['productCode'] . '</td>';
        $html .= '<td>' . $product['name'] . '</td>';
        $html .= '<td>' . $product['version'] . '</td>';
        $html .= '<td>' . $product['releaseDate'] . '</td>';
        $html .= '<td><button>Delete</button></td>';
        $html .= '</tr>';
    }

    return $html;
}

class ProductListTest extends TestCase {
    public function testListProducts() {
        // Call the function
        $html_output = list_products();

        // Assertions
        $expected_html = '<tr><td>1</td><td>Product 1</td><td>1.0</td><td>2022-01-01</td><td><button>Delete</button></td></tr><tr><td>2</td><td>Product 2</td><td>2.0</td><td>2022-02-01</td><td><button>Delete</button></td></tr>';
        $this->assertEquals($expected_html, $html_output);
    }
}