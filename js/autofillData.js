function fillData(isValid) {
    data = {
        "valid": {
            "dobData": "1990-01-01",
            "countyData": "england",
            "cardData": "4111111111111111",
            "emailData": "test@example.com",
            "nameData": "John Doe",
            "phoneData": "+447305939569",
            "jsonData": '{"key": "value"}',
            "passwordData": "Passw0rd!",
            "postcodeData": "B10 3AG",
        },
        "invalid": {
            "dobData": "3100-01-01",
            "countyData": "invalid",
            "cardData": "4111111111111112",
            "emailData": "invalidemail",
            "nameData": "Jo",
            "phoneData": "++1233234511",
            "jsonData": '{"key": "value}',
            "passwordData": "password",
            "postcodeData": "B10 F5G",
        },
        "reset": {
            "dobData": "",
            "countyData": "",
            "cardData": "",
            "emailData": "",
            "nameData": "",
            "phoneData": "",
            "jsonData": "",
            "passwordData": "",
            "postcodeData": "",
        }
    }

    document.getElementById('jsonInput').value = data[isValid]["jsonData"];
    document.getElementById("postCode").value = data[isValid]["postcodeData"]
    document.getElementById("debitCard").value = data[isValid]["cardData"]
    document.getElementById("password").value = data[isValid]["passwordData"]
    document.getElementById("confirmPassword").value = data[isValid]["passwordData"]

    document.getElementById("name").value = data[isValid]["nameData"]
    document.getElementById("email").value = data[isValid]["emailData"]
    document.getElementById("dob").value = data[isValid]["dobData"]
    document.getElementById("phone").value = data[isValid]["phoneData"]
    document.getElementById("county").value = data[isValid]["countyData"]
}

$(document).ready(function () {
    $('#validButton').on('click', function () {
        fillData("valid")
    })
    $('#invalidButton').on('click', function () {
        fillData("invalid")
    })
    $('#resetButton').on('click', function () {
        fillData("reset")
    })
})