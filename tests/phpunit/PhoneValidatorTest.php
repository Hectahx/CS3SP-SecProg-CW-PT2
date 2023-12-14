<?php
use forms\PhoneValidator;
use PHPUnit\Framework\TestCase;

class PhoneValidatorTest extends TestCase {
    public function testValidPhone() {
        $validator = new PhoneValidator('+447305939569');
        $this->assertEquals([true, "Valid Phone Number - Back End"], $validator->validatePhone());
    }

    public function testInvalidPhone() {
        $validator = new PhoneValidator('12345');
        $this->assertEquals([false, "Please enter a valid UK phone number with the country code. Format: +447305939569 - Back End"], $validator->validatePhone());
    }
    public function testEmptyPhone() {
        $validator = new PhoneValidator('');
        $this->assertEquals([false, "Please enter a valid UK phone number with the country code. Format: +447305939569 - Back End"], $validator->validatePhone());
    }
}
?>