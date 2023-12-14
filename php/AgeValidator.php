<?php
namespace forms;
use DateTime;

class AgeValidator {
    private $dateOfBirth;

    public function __construct($dateOfBirth) {
        if(empty($dateOfBirth)){
            $dateOfBirth = "";
        }
        $this->setDateOfBirth($dateOfBirth);
        
    }

    public function getDateOfBirth() {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth($dateOfBirth) {
        $this->dateOfBirth = $dateOfBirth;
    }

    public function validateDOB() {
        if (strtotime($this->dateOfBirth) === false){
            return [false, "Invalid Date Format - Back End"];
        }

        try {
            $birthDate = new DateTime($this->dateOfBirth);
            $currentDate = new DateTime();
    
            // Check if the date is in the future
            if ($birthDate > $currentDate) {
                return [false, "Date of birth cannot be in the future - Back End"];
            }
    
            // Calculate the user's age based on the provided date of birth
            $age = $currentDate->diff($birthDate)->y;
    
            // Check if the user is 18 years old or older
            if ($age < 18) {
                return [false, "You must be 18 years old or older - Back End"];
            }
        } catch (Exception $e) {
            // Handle exception for invalid DateTime format
            return [false, "Invalid Date Format - Back End"];
        }
    
        return [true, "Valid Date of Birth - Back End"];
    }
    
}
?>
