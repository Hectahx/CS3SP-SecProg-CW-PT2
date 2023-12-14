<?php
use forms\DebitCardValidator;
use PHPUnit\Framework\TestCase;

class DebitCardValidatorTest extends TestCase {
    public function testValidCard() {
        $validator = new DebitCardValidator('4111111111111111'); // A common test card number
        $this->assertEquals([true, "Valid card number - Back End"], $validator->validateDebitCard());
    }

    public function testInvalidCard() {
        $validator = new DebitCardValidator('1234');
        $this->assertEquals([false, "Card number must be between 13 and 19 digits - Back End"], $validator->validateDebitCard());
    }

    public function testInvalidCardFormat() {
        $validator = new DebitCardValidator('abcd1234efgh5678');
        $this->assertEquals([false, "Card number must contain only numbers - Back End"], $validator->validateDebitCard());
    }
    public function testEmptyCard() {
        $validator = new DebitCardValidator('');
        $this->assertEquals([false, "Card number must contain only numbers - Back End"], $validator->validateDebitCard());
    }
}
