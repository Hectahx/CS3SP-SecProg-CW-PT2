<?php
function validateEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return [false, "invalid Email - Back End"];
    }
    return [true, "Valid Email - Back End"];
}
?>