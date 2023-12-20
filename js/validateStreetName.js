function validateStreetName() {
    var roadName = document.getElementById('streetName').value.replace(/\s+/g, '');
    if (!roadName) {
        return [false, "Road Name is required - Front End"];
    }
    if (!/^[a-zA-Z]+$/.test(roadName)) {
        return [false, "Road Name must contain only letters - Front End"];
    }
    if (roadName.length > 150) {
        return [false, "Road Name must be 150 characters or less - Front End"];
    }
    if (!/^[A-Z][a-zA-Z\s]+$/.test(area)) {
        return [false, "Road Name must start with a capital letter, contain only letters and spaces - Front End"];
    }
    if (/([a-zA-Z])\1{2,}/.test(area)) {
        return [false, "Road Name name has too many repetitive characters - Front End"];
    }
    return [true, "Road Name is Valid - Front End"];
}
