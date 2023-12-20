<?php
namespace forms;

class NameValidator {
    private $name;

    public function __construct($name) {
        if(empty($name)){
            $name = "";
        }
        $this->setName($name);
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        // Trim and sanitize the input
        $trimmedName = trim($name);
        $this->name = htmlspecialchars($trimmedName, ENT_QUOTES, 'UTF-8');
    }

    public function validateName() {
        // Basic Length Check
        if (strlen($this->name) < 2 || strlen($this->name) > 50) {
            return [false, "Name must be between 2 and 50 characters - Back End"];
        }

        // Regex Pattern Matching (Only letters and spaces allowed)
        if (!preg_match("/^[A-Za-z]+$/", $this->name)) {
            return [false, "Name can only contain letters - Back End"];
        }

        return [true, "Valid Name - Back End"];
    }
}
?>