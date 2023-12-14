<?php
use forms\PostCodeValidator;
use PHPUnit\Framework\TestCase;

class PostCodeValidatorTest extends TestCase {
    public function testValidPostCode() {
        $validator = new PostCodeValidator('W1A 1AA');
        $this->assertEquals([true, "Postcode is valid - Back End"], $validator->validatePostCode());
    }

    public function testInvalidPostCode() {
        $validator = new PostCodeValidator('INVALID');
        $this->assertEquals([false, "Invalid UK postcode - Back End"], $validator->validatePostCode());
    }

    public function testEmptydPostCode() {
        $validator = new PostCodeValidator('');
        $this->assertEquals([false, "Invalid UK postcode - Back End"], $validator->validatePostCode());
    }
}
?>