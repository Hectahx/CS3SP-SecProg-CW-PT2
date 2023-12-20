<?php
namespace forms;

class CityValidator {
    private $city;

    public function __construct($city) {
        $this->setCity($city);
    }

    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = empty($city) ? "" : trim($city);
    }

    public function validateCity() {
        if ($this->city === "") {
            return [false, "Empty City - Back End"];
        }
        if (strlen($this->city) > 50) {
            return [false, "City name must be 50 characters or less - Back End"];
        }
        if (!preg_match('/^[A-Z]/', $this->city)) {
            return [false, "City must start with a capital letter - Back End"];
        }
        return [true, "Valid City - Back End"];
    }
}
?>
