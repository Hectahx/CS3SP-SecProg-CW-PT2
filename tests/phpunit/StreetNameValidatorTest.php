<?php
use forms\StreetNameValidator;
use PHPUnit\Framework\TestCase;

class StreetNameValidatorTest extends TestCase {
    public function testValidStreetName() {
        $validator = new StreetNameValidator('Leominister Road');
        $this->assertEquals([true, "Valid Street Name - Back End"], $validator->validateStreetName());
    }

    public function testInvalidNumberStreetName() {
        $validator = new StreetNameValidator('79 Aston Road');
        $this->assertEquals([false, "Street Name must contain only letters - Back End"], $validator->validateStreetName());
    }
    public function testInvalidSizeStreetName() {
        $validator = new StreetNameValidator('AstonAstonAstonAstonAstonAstonAstonAstonAstonAstonAstonAstonAstonAstonAstonAstonAstonAstonAstonAstonAstonAstonAstonAstonAstonAstonAstonAstonAstonAstonAstonAston');
        $this->assertEquals([false, "Street Name must be 150 characters or less - Back End"], $validator->validateStreetName());
    }
    public function testEmptyStreetName() {
        $validator = new StreetNameValidator('');
        $this->assertEquals([false, "Empty Street Name - Back End"], $validator->validateStreetName());
    }
}
?>