$(document).ready(function () {
    // when the user clicks on submit comment
    $('#submit').on('click', function () {
        hideAll()
        //console.log("Clicked")
        allValid = validateAll();

        if (allValid != 10){
            alert("Make sure all inputs are valid - Not sending backend");
            return;
        }

        var passwordData = document.getElementById("password").value;
        var confirmPasswordData = document.getElementById("confirmPassword").value;


        var fileData = document.getElementById("fileUpload").files[0];
        var jsonData = document.getElementById('jsonInput').value;
        var postcodeData = document.getElementById("postCode").value;
        var cardData = document.getElementById("debitCard").value;

        var nameData = document.getElementById("name").value;
        var emailData = document.getElementById("email").value;
        var dobData = document.getElementById("dob").value;
        var phoneData = document.getElementById("phone").value;
        var countyData = document.getElementById("county").value;

        var formData = new FormData();
        formData.append('fileData', fileData);
        formData.append('jsonData', jsonData);
        formData.append('passwordData', passwordData);
        formData.append('postcodeData', postcodeData);
        formData.append('cardData', cardData);
        formData.append('nameData', nameData);
        formData.append('emailData', emailData);
        formData.append('dobData', dobData);
        formData.append('phoneData', phoneData);
        formData.append('countyData', countyData);


        //console.log(fileData)

        // This uses ajax to make a post request which sends the comment to the database

        $.ajax({
            url: 'php/processValidation.php',
            type: 'POST',
            data: formData,
            processData: false, // Prevent jQuery from processing the data
            contentType: false, // Set content type to false to let the server handle it as FormData
            // if the post request is successful it refreshes the comments
            success: function (response) {
                console.log(response)
                var validatedData = JSON.parse(response);
                console.log(validatedData);

                const fileLabel = document.getElementById("fileLabelBackend");
                fileLabel.classList.remove("hidden");
                fileLabel.style.color = isValid(validatedData.file[0]);
                fileLabel.innerHTML = validatedData.file[1];

                const jsonLabel = document.getElementById("jsonLabelBackend");
                jsonLabel.classList.remove("hidden");
                jsonLabel.style.color = isValid(validatedData.json[0]);
                jsonLabel.innerHTML = validatedData.json[1];

                const postCodeLabel = document.getElementById("postCodeLabelBackend");
                postCodeLabel.classList.remove("hidden");
                postCodeLabel.style.color = isValid(validatedData.postcode[0]);
                postCodeLabel.innerHTML = validatedData.postcode[1];

                const passwordLabel = document.getElementById("passwordLabelBackend");
                passwordLabel.classList.remove("hidden");
                passwordLabel.style.color = isValid(validatedData.password[0]);
                passwordLabel.innerHTML = validatedData.password[1];

                const debitCardLabel = document.getElementById("debitCardLabelBackend");
                debitCardLabel.classList.remove("hidden");
                debitCardLabel.style.color = isValid(validatedData.card[0]);
                debitCardLabel.innerHTML = validatedData.card[1];

                const nameLabel = document.getElementById("nameLabelBackend");
                nameLabel.classList.remove("hidden");
                nameLabel.style.color = isValid(validatedData.name[0]);
                nameLabel.innerHTML = validatedData.name[1];

                const emailLabel = document.getElementById("emailLabelBackend");
                emailLabel.classList.remove("hidden");
                emailLabel.style.color = isValid(validatedData.email[0]);
                emailLabel.innerHTML = validatedData.email[1];

                const dobLabel = document.getElementById("dobLabelBackend");
                dobLabel.classList.remove("hidden");
                dobLabel.style.color = isValid(validatedData.dob[0]);
                dobLabel.innerHTML = validatedData.dob[1];

                const phoneLabel = document.getElementById("phoneLabelBackend");
                phoneLabel.classList.remove("hidden");
                phoneLabel.style.color = isValid(validatedData.phone[0]);
                phoneLabel.innerHTML = validatedData.phone[1];

                const countyLabel = document.getElementById("countyLabelBackend");
                countyLabel.classList.remove("hidden");
                countyLabel.style.color = isValid(validatedData.county[0]);
                countyLabel.innerHTML = validatedData.county[1];

                $('#submit').prop('disabled', true);
                setTimeout(() => {
                    $('#submit').prop('disabled', false);
                }, 3000);


            },
            // if there is an error it logs the error to the console
            error: (xhr, status, err) => {
                alert("There has been an error check console");
                console.log(err);
            }
        });


    });
});

function hideAll(){
    const fileLabel = document.getElementById("fileLabel");
    const fileLabelBackend = document.getElementById("fileLabelBackend");
    fileLabel.classList.add("hidden");
    fileLabelBackend.classList.add("hidden");

    const jsonLabel = document.getElementById("jsonLabel");
    const jsonLabelBackend = document.getElementById("jsonLabelBackend");
    jsonLabel.classList.add("hidden");
    jsonLabelBackend.classList.add("hidden");

    const postCodeLabel = document.getElementById("postCodeLabel");
    const postCodeLabelBackend = document.getElementById("postCodeLabelBackend");
    postCodeLabel.classList.add("hidden");
    postCodeLabelBackend.classList.add("hidden");

    const passwordLabel = document.getElementById("passwordLabel");
    const passwordLabelBackend = document.getElementById("passwordLabelBackend");
    passwordLabel.classList.add("hidden");
    passwordLabelBackend.classList.add("hidden");

    const confirmPasswordLabel = document.getElementById("confirmPasswordLabel");
    confirmPasswordLabel.classList.add("hidden");

    const debitCardLabel = document.getElementById("debitCardLabel");
    const debitCardLabelBackend = document.getElementById("debitCardLabelBackend");
    debitCardLabel.classList.add("hidden");
    debitCardLabelBackend.classList.add("hidden");

    const nameLabel = document.getElementById("nameLabel");
    const nameLabelBackend = document.getElementById("nameLabelBackend");
    nameLabel.classList.add("hidden");
    nameLabelBackend.classList.add("hidden");

    const emailLabel = document.getElementById("emailLabel");
    const emailLabelBackend = document.getElementById("emailLabelBackend");
    emailLabel.classList.add("hidden");
    emailLabelBackend.classList.add("hidden");

    const dobLabel = document.getElementById("dobLabel");
    const dobLabelBackend = document.getElementById("dobLabelBackend");
    dobLabel.classList.add("hidden");
    dobLabelBackend.classList.add("hidden");

    const phoneLabel = document.getElementById("phoneLabel");
    const phoneLabelBackend = document.getElementById("phoneLabelBackend");
    phoneLabel.classList.add("hidden");
    phoneLabelBackend.classList.add("hidden");

    const countyLabel = document.getElementById("countyLabel");
    const countyLabelBackend = document.getElementById("countyLabelBackend");
    countyLabel.classList.add("hidden");
    countyLabelBackend.classList.add("hidden");

}