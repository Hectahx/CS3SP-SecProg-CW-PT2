<?php
namespace forms;

class PasswordValidator {
    private $password;

    public function __construct($password) {
        if(empty($password)){
            $password = "";
        }
        $this->setPassword($password);
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function validatePassword() {
        $regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';

        if (preg_match($regex, $this->password)) {
            // Password is valid
            return [true, "Password is valid - Back End"];
        } else {
            // Password must meet the specified criteria
            return [false, "Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, one number, and one symbol - Back End"];
        }
    }
}
?>