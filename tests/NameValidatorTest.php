<?php
use forms\NameValidator;
use PHPUnit\Framework\TestCase;

class NameValidatorTest extends TestCase {
    public function testValidName() {
        $validator = new NameValidator('John Doe');
        $this->assertEquals([true, "Valid Name - Back End"], $validator->validateName());
    }

    public function testInvalidName() {
        $validator = new NameValidator('J');
        $this->assertEquals([false, "Name must be between 2 and 50 characters."], $validator->validateName());
    }

    public function testInvalidCharactersInName() {
        $validator = new NameValidator('John123');
        $this->assertEquals([false, "Name can only contain letters and spaces."], $validator->validateName());
    }

    public function testEmptyName() {
        $validator = new NameValidator('');
        $this->assertEquals([false, "Name must be between 2 and 50 characters."], $validator->validateName());
    }
}
?>