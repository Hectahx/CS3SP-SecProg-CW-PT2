function validatePassword() {
    var password = document.getElementById("password").value;
    var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    if (regex.test(password)) {
        //alert("Password is valid");
        return [true, "Password is valid - Front End"];
    } else {
        //alert("Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, one number, and one symbol.");
        return [false, "Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, one number, and one symbol  - Front End"];
    }
}