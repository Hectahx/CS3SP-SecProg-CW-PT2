<?php
use forms\PasswordValidator;
use PHPUnit\Framework\TestCase;

class PasswordValidatorTest extends TestCase {
    public function testValidPassword() {
        $validator = new PasswordValidator('Valid123!');
        $this->assertEquals([true, "Password is valid - Back End"], $validator->validatePassword());
    }

    public function testInvalidPassword() {
        $validator = new PasswordValidator('short');
        $this->assertEquals([false, "Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, one number, and one symbol - Back End"], $validator->validatePassword());
    }
    public function testEmptyPassword() {
        $validator = new PasswordValidator('');
        $this->assertEquals([false, "Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, one number, and one symbol - Back End"], $validator->validatePassword());
    }
}
?>