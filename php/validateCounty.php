<?php
function validateCounty($county) {
    $validCounties = array("england", "scotland", "wales", "ni");
    // Assuming $county is the value passed from the form
    if(in_array($county, $validCounties)){
        return [true, "Valid Region - Back End"];
    } else {
        return [false, "Invalid Region - Back End"];
    }
}
?>