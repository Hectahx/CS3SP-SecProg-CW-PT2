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
        if(empty($area)){
            $this->area = "";
        } else {
            $this->area = trim($area);
        }
    }

    public function validateArea() {
        if ($this->area === "") {
            return [false, "Empty Area - Back End"];
        }
        if (strlen($this->area) > 50) {
            return [false, "Area name must be 50 characters or less - Back End"];
        }
        if (!preg_match('/^[A-Z]/', $this->area)) {
            return [false, "Area must start with a capital letter - Back End"];
        }
        return [true, "Valid Area - Back End"];
    }
}
?>
