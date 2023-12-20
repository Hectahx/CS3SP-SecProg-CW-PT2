function isValid(validity) {
    return validity ? "green" : 'red'; //This returns green if its true, and red if its false - used to set the colours for the labels
}
function validateAll() {
    var allValid = 0;

    var fileInput = validateFile();
    var jsonInput = validateJSON();
    var postCodeInput = validatePostCode();
    var passwordInput = validatePassword();
    var debitCardInput = validateDebitCard();

    var nameInput = validateName();
    var lastNameInput = validateLastName();
    var emailInput = validateEmail();
    var dobInput = validateDOB();
    var phoneInput = validatePhone();
    var countyInput = validateCounty();
    var biographyInput = validateBiography();

    var streetNameInput = validateStreetName();
    var houseNumberInput = validateHouseNumber();
    var areaInput = validateArea();
    var cityInput = validateCity();

    const fileLabel = document.getElementById("fileLabel");
    fileLabel.classList.remove("hidden");
    fileLabel.style.color = isValid(fileInput[0]);
    fileLabel.innerHTML = fileInput[1];
    allValid+=Number(fileInput[0])

    const jsonLabel = document.getElementById("jsonLabel");
    jsonLabel.classList.remove("hidden");
    jsonLabel.style.color = isValid(jsonInput[0]);
    jsonLabel.innerHTML = jsonInput[1];
    allValid+=Number(jsonInput[0])

    const postCodeLabel = document.getElementById("postCodeLabel");
    postCodeLabel.classList.remove("hidden");
    postCodeLabel.style.color = isValid(postCodeInput[0]);
    postCodeLabel.innerHTML = postCodeInput[1];
    allValid+=Number(postCodeInput[0])

    const passwordLabel = document.getElementById("passwordLabel");
    passwordLabel.classList.remove("hidden");
    passwordLabel.style.color = isValid(passwordInput[0]);
    passwordLabel.innerHTML = passwordInput[1];
    allValid+=Number(passwordInput[0])

    const confirmPasswordLabel = document.getElementById("confirmPasswordLabel");
    confirmPasswordLabel.classList.remove("hidden");
    confirmPasswordLabel.style.color = isValid(passwordInput[0]);
    confirmPasswordLabel.innerHTML = passwordInput[1]

    const debitCardLabel = document.getElementById("debitCardLabel");
    debitCardLabel.classList.remove("hidden");
    debitCardLabel.style.color = isValid(debitCardInput[0]);
    debitCardLabel.innerHTML = debitCardInput[1];
    allValid+=Number(debitCardInput[0])

    const nameLabel = document.getElementById("nameLabel");
    nameLabel.classList.remove("hidden");
    nameLabel.style.color = isValid(nameInput[0]);
    nameLabel.innerHTML = nameInput[1];
    allValid+=Number(nameInput[0])

    const lastNameLabel = document.getElementById("lastNameLabel");
    lastNameLabel.classList.remove("hidden");
    lastNameLabel.style.color = isValid(lastNameInput[0]);
    lastNameLabel.innerHTML = lastNameInput[1];
    allValid+=Number(lastNameInput[0])

    const emailLabel = document.getElementById("emailLabel");
    emailLabel.classList.remove("hidden");
    emailLabel.style.color = isValid(emailInput[0]);
    emailLabel.innerHTML = emailInput[1];
    allValid+=Number(emailInput[0])

    const dobLabel = document.getElementById("dobLabel");
    dobLabel.classList.remove("hidden");
    dobLabel.style.color = isValid(dobInput[0]);
    dobLabel.innerHTML = dobInput[1];
    allValid+=Number(dobInput[0])

    const phoneLabel = document.getElementById("phoneLabel");
    phoneLabel.classList.remove("hidden");
    phoneLabel.style.color = isValid(phoneInput[0]);
    phoneLabel.innerHTML = phoneInput[1];
    allValid+=Number(phoneInput[0])

    const countyLabel = document.getElementById("countyLabel");
    countyLabel.classList.remove("hidden");
    countyLabel.style.color = isValid(countyInput[0]);
    countyLabel.innerHTML = countyInput[1];
    allValid+=Number(countyInput[0])

    const biographyLabel = document.getElementById("biographyLabel");
    biographyLabel.classList.remove("hidden");
    biographyLabel.style.color = isValid(biographyInput[0]);
    biographyLabel.innerHTML = biographyInput[1];
    allValid+=Number(biographyInput[0])

    const streetNameLabel = document.getElementById("streetNameLabel");
    streetNameLabel.classList.remove("hidden");
    streetNameLabel.style.color = isValid(streetNameInput[0]);
    streetNameLabel.innerHTML = streetNameInput[1];
    allValid+=Number(streetNameInput[0])

    const houseNumberLabel = document.getElementById("houseNumberLabel");
    houseNumberLabel.classList.remove("hidden");
    houseNumberLabel.style.color = isValid(houseNumberInput[0]);
    houseNumberLabel.innerHTML = houseNumberInput[1];
    allValid+=Number(houseNumberInput[0])

    const areaLabel = document.getElementById("areaLabel");
    areaLabel.classList.remove("hidden");
    areaLabel.style.color = isValid(areaInput[0]);
    areaLabel.innerHTML = areaInput[1];
    allValid+=Number(areaInput[0])

    const cityLabel = document.getElementById("cityLabel");
    cityLabel.classList.remove("hidden");
    cityLabel.style.color = isValid(cityInput[0]);
    cityLabel.innerHTML = cityInput[1];
    allValid+=Number(cityInput[0])

    return allValid

}