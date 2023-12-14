<?php
use forms\CountyValidator;
use PHPUnit\Framework\TestCase;

class CountyValidatorTest extends TestCase {
    public function testValidCounty() {
        $validator = new CountyValidator('england');
        $this->assertEquals([true, "Valid Region - Back End"], $validator->validateCounty());
    }

    public function testInvalidCounty() {
        $validator = new CountyValidator('invalid-region');
        $this->assertEquals([false, "Invalid Region - Back End"], $validator->validateCounty());
    }
    public function testEmptyCounty() {
        $validator = new CountyValidator('');
        $this->assertEquals([false, "Invalid Region - Back End"], $validator->validateCounty());
    }
}
?>