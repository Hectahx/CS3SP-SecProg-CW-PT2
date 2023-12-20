function fillData(isValid) {
    data = {
        "valid": {
            "dobData": "1990-01-01",
            "countyData": "england",
            "cardData": "4111111111111111",
            "emailData": "test@example.com",
            "nameData": "John",
            "lastNameData": "Doe",
            "phoneData": "+447305939569",
            "jsonData": '{"key": "value"}',
            "passwordData": "Passw0rd!",
            "postcodeData": "B4 7ET",
            "biographyData": "Hello, my name is john. I am 22 years old. I like to play football.",
            "postcodeData": "B10 3AG",
            "postcodeData": "B10 3AG",
            "streetNameData": "Leominster Road",
            "houseNumberData": "70",
            "areaData": "Small heath ",
            "cityData": "Birmingham",
        },
        "invalid": {
            "dobData": "3100-01-01",
            "countyData": "invalid",
            "cardData": "4111111111111112",
            "emailData": "invalidemail",
            "nameData": "J234",
            "lastNameData": "D012sw",
            "phoneData": "++1233234511",
            "jsonData": '{"key": "value}',
            "passwordData": "password",
            "postcodeData": "B10 F5G",
            "biographyData": "Invalid-biography",
            "postcodeData": "B10 3AG",
            "streetNameData": "?",
            "houseNumberData": "?",
            "areaData": "5mallheath ",
            "cityData": "3ru5",
        },
        "reset": {
            "dobData": "",
            "countyData": "",
            "cardData": "",
            "emailData": "",
            "nameData": "",
            "lastNameData": "",
            "phoneData": "",
            "jsonData": "",
            "passwordData": "",
            "postcodeData": "",
            "biographyData": "",
            "streetNameData": "",
            "houseNumberData": "",
            "areaData": "",
            "cityData": "",
        }
    }

    document.getElementById('jsonInput').value = data[isValid]["jsonData"];
    document.getElementById("postCode").value = data[isValid]["postcodeData"]
    document.getElementById("debitCard").value = data[isValid]["cardData"]
    document.getElementById("password").value = data[isValid]["passwordData"]
    document.getElementById("confirmPassword").value = data[isValid]["passwordData"]

    document.getElementById("name").value = data[isValid]["nameData"]
    document.getElementById("lastName").value = data[isValid]["lastNameData"]
    document.getElementById("email").value = data[isValid]["emailData"]
    document.getElementById("dob").value = data[isValid]["dobData"]
    document.getElementById("phone").value = data[isValid]["phoneData"]
    
    document.getElementById("county").value = data[isValid]["countyData"]
    document.getElementById("biography").value = data[isValid]["biographyData"]
    document.getElementById("streetName").value = data[isValid]["streetNameData"]
    document.getElementById("houseNumber").value = data[isValid]["houseNumberData"]
    document.getElementById("area").value = data[isValid]["areaData"]
    document.getElementById("city").value = data[isValid]["cityData"]
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