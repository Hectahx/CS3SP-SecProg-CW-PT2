<?php
function validatePhone($phone) {
    $ukPhoneRegex = '/^\+44\d{10}$/';
    $errors = array();

    if (!preg_match($ukPhoneRegex, $phone)) {
        return [false, "Please enter a valid UK phone number with the country code. Format: +447305939569 - Front End"];
    }

    return [true, "Valid Phone Number - Back End"];
}
?>
