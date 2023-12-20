<?php
use forms\AreaValidator;
use PHPUnit\Framework\TestCase;

class AreaValidatorTest extends TestCase {
    public function testValidArea() {
        $validator = new AreaValidator('Small Heath');
        $this->assertEquals([true, "Valid Area - Back End"], $validator->validateArea());
    }

    public function testInvalidArea() {
        $validator = new AreaValidator('invalid-area');
        $this->assertEquals([false, "Area must start with a capital letter, contain only letters and spaces - Back End"], $validator->validateArea());
    }
    public function testInvalidLengthArea() {
        $validator = new AreaValidator('AreaaAreaaAreaaAreaaAreaaAreaaAreaaAreaaAreaaAreaaAreaaAreaa');
        $this->assertEquals([false, "Area name must be 50 characters or less - Back End"], $validator->validateArea());
    }
    public function testEmptyArea() {
        $validator = new AreaValidator('');
        $this->assertEquals([false, "Empty Area - Back End"], $validator->validateArea());
    }
}
?>