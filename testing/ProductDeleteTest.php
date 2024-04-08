<?php
include("")
use PHPUnit\Framework\TestCase;
    class ProductDeleteTest extends TestCase {
        public function testProductDelete($productCode) {
            $dbStub = $this->createStub(PDO::class);
            $dbStub->prepare("")

        }
    }


//preferably use stubs because mocks are more advanced and verify behavior with dependancy in the reaal worl.