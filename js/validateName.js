function validateName() {
    var name = document.getElementById("name").value;
    if (!/^[A-Za-z\s]{1,50}$/.test(name)) {
        //alert("Name should only contain letters and spaces, up to 50 characters.");
        return [false, "Name should only contain letters and spaces, up to 50 characters - Front End"];
    }
    return [true, "Valid Name - Front End"];
}