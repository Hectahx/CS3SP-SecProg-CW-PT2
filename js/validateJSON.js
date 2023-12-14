function validateJSON() {
    var jsonInput = document.getElementById('jsonInput').value;

    try {
        JSON.parse(jsonInput);
    } catch (e) {
        //alert('Invalid JSON');
        return [false, "Invalid JSON - Front End"];
    }

    //alert('Valid JSON');
    return [true, "Valid JSON - Front End"];;
}

