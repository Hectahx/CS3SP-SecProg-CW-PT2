<?php
namespace forms;

class HouseNumberValidator {
    private $houseNumber;

    public function __construct($houseNumber) {
        $this->setHouseNumber($houseNumber);
    }

    public function getHouseNumber() {
        return $this->houseNumber;
    }

    public function setHouseNumber($houseNumber) {
        $this->houseNumber = $houseNumber;
    }

    public function validateHouseNumber() {
        if (!preg_match('/^[1-9]\d*$/', $this->houseNumber)) {
            return [false, "Invalid House Number - House number cannot start with 0 - Back End"];
        }
        $num = intval($this->houseNumber);
        if ($num < 1 || $num > 10000) {
            return [false, "House Number must be between 1 and 10000 - Back End"];
        }
        if (strlen($this->houseNumber) > 5) {
            return [false, "House Number must not exceed 5 digits - Back End"];
        }
        return [true, "House Number is Valid - Back End"];
    }
}
?>
