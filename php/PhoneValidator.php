<?php
namespace forms;

class PhoneValidator {
    private $phone;

    public function __construct($phone) {
        if(empty($phone)){
            $phone = "";
        }
        $this->setPhone($phone);
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        // Here you can also add some basic validation or sanitization for the input
        $this->phone = $phone;
    }

    public function validatePhone() {
        $ukPhoneRegex = '/^\+44\d{10}$/';

        if (!preg_match($ukPhoneRegex, $this->phone)) {
            return [false, "Please enter a valid UK phone number with the country code. Format: +447305939569 - Back End"];
        }

        return [true, "Valid Phone Number - Back End"];
    }
}
?>