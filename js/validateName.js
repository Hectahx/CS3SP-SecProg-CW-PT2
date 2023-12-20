function validateName() {
    var name = document.getElementById("name").value;
    if (!/^[A-Za-z]{2,50}$/.test(name)) {
        return [false, "First name should only contain letters and be between 2 to 50 characters - Front End"];
    }
    return [true, "Valid Name - Front End"];
}
function validateLastName(){
    var name = document.getElementById("lastName").value;
    if (!/^[A-Za-z]{2,50}$/.test(name)) {
        return [false, "Last name should only contain letters and be between 2 to 50 characters - Front End"];
    }
    return [true, "Valid Name - Front End"];
}