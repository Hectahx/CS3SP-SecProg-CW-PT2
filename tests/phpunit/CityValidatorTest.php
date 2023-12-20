<?php
use forms\CityValidator;
use PHPUnit\Framework\TestCase;

class CityValidatorTest extends TestCase {
    public function testValidCity() {
        $validator = new CityValidator('Birmingham');
        $this->assertEquals([true, "Valid City - Back End"], $validator->validateCity());
    }

    public function testInvalidCity() {
        $validator = new CityValidator('invalid-City');
        $this->assertEquals([false, "City must start with a capital letter - Back End"], $validator->validateCity());
    }
    public function testInvalidLengthCity() {
        $validator = new CityValidator('CityaCityaCityaCityaCityaCityaCityaCityaCityaCityaCityaCitya');
        $this->assertEquals([false, "City name must be 50 characters or less - Back End"], $validator->validateCity());
    }
    public function testEmptyCity() {
        $validator = new CityValidator('');
        $this->assertEquals([false, "Empty City - Back End"], $validator->validateCity());
    }
}
?>