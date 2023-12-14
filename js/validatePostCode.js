function validatePostCode() {
    var postcode = document.getElementById("postCode").value.toUpperCase(); // Convert to uppercase for consistency

    // Regular expression for UK postcode
    var regex = /^[A-Z]{1,2}[0-9][A-Z0-9]? ?[0-9][A-Z]{2}$/;

    if (regex.test(postcode)) {
        //alert("Postcode is valid");
        return [true, "Postcode is valid - Front End"];
    } else {
        //alert("Invalid UK postcode.");
        return [false, "Invalid UK postcode - Front End"];
    }
}