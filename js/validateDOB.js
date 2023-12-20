function validateDOB() {
    var dob = document.getElementById("dob").value;
    if (!dob) {
        return [false, "Date of birth is not provided - Front End"];
    }

    if (dob.length !== 10) {
        return [false, "Date of birth must be exactly 10 characters in format YYYY-MM-DD - Front End"];
    }

    var birthDate = new Date(dob);
    var today = new Date();

    // Check if the date format is valid
    if (isNaN(birthDate.getTime())) {
        return [false, "Invalid Date Format - Front End"];
    }

    // Extract day, month, and year from the date
    var day = birthDate.getDate();
    var month = birthDate.getMonth() + 1; // getMonth() returns 0-11
    var year = birthDate.getFullYear();

    // Check if the day and month are within the valid range
    if (day < 1 || day > 31 || month < 1 || month > 12) {
        return [false, "Invalid day or month - Front End"];
    }

    // Check if the year is within the valid range (1900 to current year)
    var currentYear = today.getFullYear();
    if (year < 1900 || year > currentYear) {
        return [false, "Invalid year - Front End"];
    }

    // Check if the entered DOB is in the future
    if (birthDate > today) {
        return [false, "You are from the future! - Front End"];
    }

    var age = currentYear - year;
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }

    if (age < 18 || age >= 100) {
        return [false, "You must be 18 years or older, or you are too old for this application - Front End"];
    }
    return [true, "Valid Date of Birth - Front End"];
}
