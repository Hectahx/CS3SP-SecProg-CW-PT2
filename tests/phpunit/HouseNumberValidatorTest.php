<?php
use forms\HouseNumberValidator;
use PHPUnit\Framework\TestCase;

class HouseNumberValidatorTest extends TestCase {
    public function testValidHouseNumber() {
        $validator = new HouseNumberValidator('70');
        $this->assertEquals([true, "Valid House Number - Back End"], $validator->validateHouseNumber());
    }

    public function testInvalidHouseNumber() {
        $validator = new HouseNumberValidator('079');
        $this->assertEquals([false, "House number cannot start with 0 - Back End"], $validator->validateHouseNumber());
    }
    public function testInvalidLengthHouseNumber() {
        $validator = new HouseNumberValidator('100000');
        $this->assertEquals([false, "House Number must be between 1 and 10000 - Back End"], $validator->validateHouseNumber());
    }
    public function testInvalidSizeHouseNumber() {
        $validator = new HouseNumberValidator('10001');
        $this->assertEquals([false, "House Number must be between 1 and 10000 - Back End"], $validator->validateHouseNumber());
    }
    public function testEmptyHouseNumber() {
        $validator = new HouseNumberValidator('');
        $this->assertEquals([false, "Empty House Number - Back End"], $validator->validateHouseNumber());
    }
}
?>