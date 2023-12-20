<?php
use forms\BiographyValidator;
use PHPUnit\Framework\TestCase;

class BiographyValidatorTest extends TestCase {
    public function testValidBiography() {
        $validator = new BiographyValidator('Hello, my name is John. I am 22 years old. I like to play football.');
        $this->assertEquals([true, "Valid Biography - Back End"], $validator->validateBiography());
    }

    public function testInvalidSentenceBiography() {
        $validator = new BiographyValidator('invalid-biography');
        $this->assertEquals([false, "The biography should contain at least 3 sentences - Back End"], $validator->validateBiography());
    }
    public function testInvalidLengthBiography() {
        $validator = new BiographyValidator('hi. hi. hi');
        $this->assertEquals([false, "Each sentence should be at least 10 characters long - Back End"], $validator->validateBiography());
    }
    public function testEmptyBiography() {
        $validator = new BiographyValidator('');
        $this->assertEquals([false, "Empty Biography - Back End"], $validator->validateBiography());
    }
}
?>