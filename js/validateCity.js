function validateCity() {
    var city = document.getElementById('city').value;
    if (!city.trim()) {
        return [false, "City is required - Front End"];
    }
    if (city.length > 50) {
        return [false, "City name must be 50 characters or less - Front End"];
    }
    if (!/^[A-Z][a-zA-Z]+$/.test(city)) {
        return [false, "City must start with a capital letter and contain only letters - Front End"];
    }
    if (/([a-zA-Z])\1{2,}/.test(city)) {
        return [false, "City name has too many repetitive characters - Front End"];
    }
    return [true, "City is Valid - Front End"];
}
