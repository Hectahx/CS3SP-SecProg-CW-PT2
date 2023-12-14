function validateDOB() {
    var dob = document.getElementById("dob").value;
    var today = new Date();
    var birthDate = new Date(dob);

    // Check if the entered DOB is in the future
    if (birthDate > today) {
        //alert("You are from the future!");
        return [false, "You are from the future! - Front End"];
    }

    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
   
    if (age < 18) {
        //alert("You must be 18 years or older.");
        return [false, "You must be 18 years or older - Front End"];
    } else if (isNaN(age)) {
        return [false, "Invalid Date Format - Front End"];
    }
    return [true, "Valid Date of Birth - Front End"];
}


