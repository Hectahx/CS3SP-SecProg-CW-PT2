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

        if (strlen($this->dateOfBirth) !== 10) {
            return [false, "Date of birth must be exactly 10 characters in format DD-MM-YYYY - Back End"];
        }


        if (strtotime($this->dateOfBirth) === false){
            return [false, "Invalid Date Format - Back End"];
        }

        try {
            $birthDate = new DateTime($this->dateOfBirth);
            $currentDate = new DateTime();


            $day = (int) $birthDate->format('d');
            $month = (int) $birthDate->format('m');
            $year = (int) $birthDate->format('Y');

      
            if ($day < 1 || $day > 31 || $month < 1 || $month > 12) {
                return [false, "Invalid day or month - Back End"];
            }


            if ($year < 1900 || $year > (int) $currentDate->format('Y')) {
                return [false, "Invalid year, you must be 18 or younger then 123 - Back End"];
            }


            if ($birthDate > $currentDate) {
                return [false, "Date of birth cannot be in the future - Back End"];
            }
    

            $age = $currentDate->diff($birthDate)->y;
    

            if ($age < 18) {
                return [false, "You must be 18 years old or older - Back End"];
            }
        } catch (\Exception $e) {

            return [false, "Invalid Date Format - Back End"];
        }
    
        return [true, "Valid Date of Birth - Back End"];
    }
}
?>
