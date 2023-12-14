<?php
use forms\FileValidator;
use PHPUnit\Framework\TestCase;

class FileValidatorTest extends TestCase {
    private $testFilesPath;

    protected function setUp(): void {
        // Define the path to the test files directory
        $this->testFilesPath = __DIR__ . '/testfiles/';
    }

    public function testValidPNGFile() {
        $file = [
            'name' => 'test.png',
            'type' => 'image/png',
            'tmp_name' => $this->testFilesPath . 'bingus.png'
        ];
        $validator = new FileValidator($file);
        $this->assertEquals([true, 'The file is a valid PNG image - Back End'], $validator->validateFile());
    }

    public function testInvalidJPEGFile() {
        $file = [
            'name' => 'test.jpg',
            'type' => 'image/jpeg',
            'tmp_name' => $this->testFilesPath . 'bingus.jpg'
        ];
        $validator = new FileValidator($file);
        $this->assertEquals([false, 'Invalid file. We can only accept PNG images - Back End'], $validator->validateFile());
    }

    public function testEmptyJPEGFile() {
        $file = [];
        $validator = new FileValidator($file);
        $this->assertEquals([false, 'Empty File. We can only accept PNG images - Back End'], $validator->validateFile());
    }
}


