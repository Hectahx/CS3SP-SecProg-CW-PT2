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
    return [true, "Road Name is Valid - Front End"];
}
