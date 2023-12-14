function validateCounty() {
    validCounties = ["england", "scotland", "wales", "ni"]
    var county = document.getElementById("county").value;
    if (!validCounties.includes(county) || county === "") {
        //alert("Please select a county.");
        return [false, "Invalid Region - Front End"];
    }
    return [true, "Valid Region - Front End"];
}