function validateEmail() {
    var email = document.getElementById("email").value;
    if (!/\S+@\S+\.\S+/.test(email)) {
        //alert("Please enter a valid email address.");
        return [false, "Please enter a valid email address."];
    }
    return [true,"Email is Valid  - Front End"];
}