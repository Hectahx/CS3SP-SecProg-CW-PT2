<?php
function validateAgeAndDate($dateOfBirth) {
    $errors = array();

    // Check if the date of birth is in a valid format
    $dateParts = explode('-', $dateOfBirth);
    if (count($dateParts) !== 3 || !checkdate($dateParts[1], $dateParts[2], $dateParts[0])) {
        return  [false, "Invalid Date Format - Back End"];
    } else {
        // Calculate the user's age based on the provided date of birth
        $birthDate = new DateTime($dateOfBirth);
        $currentDate = new DateTime();
        $age = $currentDate->diff($birthDate)->y;

        // Check if the user is 18 years old or older
        if ($age < 18) {
            return  [false, "You must be 18 years old or older - Back End"];
        }

        // Check if the date is in the future
        if ($birthDate > $currentDate) {
            return [false, "Date of birth cannot be in the future  - Back End"];
        }
    }

    return [true,"Valid Date of Birth - Back End"];
}
?>
