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
            return [false, "Street Name is required - Back End"];
        }
        if (!preg_match('/^[a-zA-Z]+$/', $this->streetName)) {
            return [false, "Street Name must contain only letters - Back End"];
        }
        if (strlen($this->streetName) > 150) {
            return [false, "Street Name must be 150 characters or less - Back End"];
        }
        return [true, "Street Name is Valid - Back End"];
    }
}
?>
