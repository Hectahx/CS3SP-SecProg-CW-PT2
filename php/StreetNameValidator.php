<?php
namespace forms;

class StreetNameValidator {
    private $streetName;

    public function __construct($streetName) {
        $this->setStreetName($streetName);
    }

    public function getStreetName() {
        return $this->streetName;
    }

    public function setStreetName($streetName) {
        $this->streetName = empty($streetName) ? "" : preg_replace('/\s+/', '', $streetName);
    }

    public function validateStreetName() {
        if ($this->streetName === "") {
            return [false, "Empty Street Name - Back End"];
        }
        if (!preg_match('/^[a-zA-Z]+$/', $this->streetName)) {
            return [false, "Street Name must contain only letters - Back End"];
        }
        if (strlen($this->streetName) > 150) {
            return [false, "Street Name must be 150 characters or less - Back End"];
        }
        if (!preg_match('/^[A-Z][a-zA-Z\s]+$/', $this->streetName)) {
            return [false, "Street Name must start with a capital letter, contain only letters and spaces - Back End"];
        }
        if (preg_match('/([a-zA-Z])\\1{2,}/', $this->streetName)) {
            return [false, "Street Name has too many repetitive characters - Back End"];
        }
        return [true, "Valid Street Name - Back End"];
    }
}
?>
