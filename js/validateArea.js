function validateArea() {
    var area = document.getElementById('area').value;
    if (!area.trim()) {
        return [false, "Area is required - Front End"];
    }
    if (area.length > 50) {
        return [false, "Area name must be 50 characters or less - Front End"];
    }
    if (!/^[A-Z]/.test(area)) {
        return [false, "Area must start with a capital letter - Front End"];
    }
    return [true, "Area is Valid - Front End"];
}
