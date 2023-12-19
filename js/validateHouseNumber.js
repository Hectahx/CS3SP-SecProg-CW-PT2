function validateHouseNumber() {
    var houseNumber = document.getElementById('houseNumber').value;
    if (!/^[1-9]\d*$/.test(houseNumber)) {
        return [false, "Invalid House Number - Front End"];
    }
    var num = parseInt(houseNumber, 10);
    if (num < 1 || num > 10000) {
        return [false, "House Number must be between 1 and 10000 - Front End"];
    }
    if (houseNumber.length > 5) {
        return [false, "House Number must not exceed 5 digits - Front End"];
    }
    return [true, "House Number is Valid - Front End"];
}
