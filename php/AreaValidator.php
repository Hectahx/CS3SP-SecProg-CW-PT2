<?php
namespace forms;

class AreaValidator {
    private $area;

    public function __construct($area) {
        $this->setArea($area);
    }

    public function getArea() {
        return $this->area;
    }

    public function setArea($area) {
        $this->area = empty($area) ? "" : trim($area);
    }

    public function validateArea() {
        if ($this->area === "") {
            return [false, "Empty Area - Back End"];
        }
        if (strlen($this->area) > 50) {
            return [false, "Area name must be 50 characters or less - Back End"];
        }
        if (!preg_match('/^[A-Z][a-zA-Z\s]+$/', $this->area)) {
            return [false, "Area must start with a capital letter, contain only letters and spaces - Back End"];
        }
        if (preg_match('/([a-zA-Z])\\1{2,}/', $this->area)) {
            return [false, "Area name has too many repetitive characters - Back End"];
        }
        return [true, "Valid Area - Back End"];
    }
}
?>
