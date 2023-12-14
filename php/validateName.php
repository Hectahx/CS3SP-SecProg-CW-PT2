<?php
function validateName($name) {
    $errors = array();

    // Trim Input
    $name = trim($name);

    // HTML and SQL Injection Prevention
    $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');

    // Basic Length Check
    if (strlen($name) < 2 || strlen($name) > 50) {
        return [false, "Name must be between 2 and 50 characters."];
    }
    
    // Regex Pattern Matching (Only letters and spaces allowed)
    if (!preg_match("/^[A-Za-z\s]+$/", $name)) {
        return [false, "Name can only contain letters and spaces."];
    }

    return [true, "Valid Name - back End"];
}

?>
