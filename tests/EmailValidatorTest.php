<?php
use forms\EmailValidator;
use PHPUnit\Framework\TestCase;

class EmailValidatorTest extends TestCase {
    public function testValidEmail() {
        $validator = new EmailValidator('test@example.com');
        $this->assertEquals([true, "Valid Email - Back End"], $validator->validateEmail());
    }

    public function testInvalidEmail() {
        $validator = new EmailValidator('invalid-email');
        $this->assertEquals([false, "Invalid Email - Back End"], $validator->validateEmail());
    }
    public function testEmptyEmail() {
        $validator = new EmailValidator('');
        $this->assertEquals([false, "Invalid Email - Back End"], $validator->validateEmail());
    }
}
?>