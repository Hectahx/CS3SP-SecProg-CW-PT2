<?php
namespace forms;

class EmailValidator {
    private $email;

    public function __construct($email) {
        if(empty($email)){
            $email = "";
        }
        $this->setEmail($email);
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        // Here you can also add some basic validation for the input
        $this->email = $email;
    }

    public function validateEmail() {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return [false, "Invalid Email - Back End"];
        }
        return [true, "Valid Email - Back End"];
    }
}
?>