<?php
use forms\AgeValidator;
use PHPUnit\Framework\TestCase;

class AgeValidatorTest extends TestCase {
    public function testValidAge() {
        $validator = new AgeValidator('1990-01-01');
        $this->assertEquals([true, "Valid Date of Birth - Back End"], $validator->validateDOB());
    }

    public function testInvalidAge() {
        $validator = new AgeValidator('2010-01-01');
        $this->assertEquals([false, "You must be 18 years old or older - Back End"], $validator->validateDOB());
    }

    public function testFutureDate() {
        $validator = new AgeValidator('3000-01-01');
        $this->assertEquals([false, "Invalid year, you must be 18 or younger then 123 - Back End"], $validator->validateDOB());
    }

    public function testInvalidDateFormat() {
        $validator = new AgeValidator('invalid-date');
        $this->assertEquals([false, "Date of birth must be exactly 10 characters in format DD-MM-YYYY - Back End"], $validator->validateDOB());
    }
    public function testEmptyDateFormat() {
        $validator = new AgeValidator('');
        $this->assertEquals([false, "Date of birth must be exactly 10 characters in format DD-MM-YYYY - Back End"], $validator->validateDOB());
    }
}
?>