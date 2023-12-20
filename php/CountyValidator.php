<?php
namespace forms;

class CountyValidator {
    private $county;

    public function __construct($county) {
        if(empty($county)){
            $county = "";
        }
        $this->setCounty($county);
    }

    public function getCounty() {
        return $this->county;
    }

    public function setCounty($county) {
     
        $this->county = strtolower($county); 
    }

    public function validateCounty() {
        $validCounties = ["england", "scotland", "wales", "ni"];
        if (in_array($this->county, $validCounties)) {
            return [true, "Valid Region - Back End"];
        } else {
            return [false, "Invalid Region - Back End"];
        }
    }
}
?>