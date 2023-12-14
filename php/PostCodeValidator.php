<?php
namespace forms;

class PostCodeValidator {
    private $postcode;

    public function __construct($postcode) {
        if(empty($postcode)){
            $postcode = "";
        }
        $this->setPostCode($postcode);
    }

    public function getPostCode() {
        return $this->postcode;
    }

    public function setPostCode($postcode) {
        // Convert to uppercase for consistency
        $this->postcode = strtoupper($postcode);
    }

    public function validatePostCode() {
        // Regular expression for UK postcode
        $regex = '/^[A-Z]{1,2}[0-9][A-Z0-9]? ?[0-9][A-Z]{2}$/';

        if (preg_match($regex, $this->postcode)) {
            // Postcode is valid
            return [true, "Postcode is valid - Back End"];
        } else {
            // Invalid UK postcode
            return [false, "Invalid UK postcode - Back End"];
        }
    }
}

?>