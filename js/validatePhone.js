function validatePhone() {
    var phone = document.getElementById("phone").value;
    // Regular expression for UK phone number with country code in brackets and a space
    var ukPhoneRegex = /^\+44\d{10}$/;

    if (!ukPhoneRegex.test(phone)) {
        //alert("Please enter a valid UK phone number with the country code. Format: +447305939569");
        return [false, "Please enter a valid UK phone number with the country code. Format: +447305939569 - Front End"];
    }
    return [true, "Valid Phone Number - Front End"];
}

