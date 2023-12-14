<?php
use forms\JSONValidator;
use PHPUnit\Framework\TestCase;

class JSONValidatorTest extends TestCase {
    public function testValidJSON() {
        $json = '{"name": "John"}';
        $validator = new JSONValidator($json);
        $this->assertEquals([true, 'The JSON is valid - Back End'], $validator->validateJSON());
    }

    public function testInvalidJSON() {
        $json = '{"name": John}';
        $validator = new JSONValidator($json);
        $this->assertEquals([false, 'The JSON is invalid - Back End'], $validator->validateJSON());
    }
    public function testEmptyJSON() {
        $json = '';
        $validator = new JSONValidator($json);
        $this->assertEquals([false, 'The JSON is invalid - Back End'], $validator->validateJSON());
    }
}
?>