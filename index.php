<!DOCTYPE html>
<html>

<head>
    <title>Input Form</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        .hidden {
            visibility: hidden;
        }
    </style>
    <script src="js/autofillData.js"></script>
</head>

<body>
    <h1>Input Form - See all records <a href="display_table.php">here</a></h1>
    <button onclick="fillData('valid')">Autofill Inputs - Valid</button>
    <button onclick="fillData('invalid')">Autofill Inputs - Invalid</button>
    <button onclick="fillData('reset')">Reset Inputs</button>
    <br><br><br>
    <!-- Name Input -->
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" placeholder="John Doe">
    <label class="example-format">Example: John Doe</label>
    <br>
    <label for="name" id="nameLabel" class="hidden"></label>
    <br>
    <label for="name" id="nameLabelBackend" class="hidden"></label>
    <br><br>

    <!-- Email Input -->
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" placeholder="student@aston.ac.uk">
    <label class="example-format">Example: student@aston.ac.uk</label>
    <br>
    <label for="email" id="emailLabel" class="hidden"></label>
    <br>
    <label for="email" id="emailLabelBackend" class="hidden"></label>
    <br><br>

    <!-- Date of Birth Input -->
    <label for="dob">Date Of Birth:</label>
    <input type="date" id="dob" name="dob">
    <label class="example-format">Example: 01-01-1990</label>
    <br>
    <label for="dob" id="dobLabel" class="hidden"></label>
    <br>
    <label for="dob" id="dobLabelBackend" class="hidden"></label>
    <br><br>

    <!-- Phone Number Input -->
    <label for="phone">Phone Number:</label>
    <input type="tel" id="phone" name="phone" placeholder="+447777777777">
    <label class="example-format">Example: +447309596318</label>
    <br>
    <label for="phone" id="phoneLabel" class="hidden"></label>
    <br>
    <label for="phone" id="phoneLabelBackend" class="hidden"></label>
    <br><br>

    <!-- Region/County Select -->
    <label for="county">Region:</label>
    <select id="county" name="county" required>
        <option disabled selected value="">Select a Region</option>
        <option value="england">England</option>
        <option value="scotland">Scotland</option>
        <option value="wales">Wales</option>
        <option value="ni">Northern Island</option>
    </select>
    <br>
    <label for="county" id="countyLabel" class="hidden"></label>
    <br>
    <label for="county" id="countyLabelBackend" class="hidden"></label>
    <br><br>

    <!-- Password Input -->
    <!-- Password Input -->
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <label class="example-format">Password must be at least 8 characters long, contain at least one uppercase letter,
        one lowercase letter, one number, and one symbol</label>
    <br>
    <label for="password" id="passwordLabel" class="hidden"></label>
    <br>
    <label for="password" id="passwordLabelBackend" class="hidden"></label>
    <br><br>

    <!-- Confirm Password Input -->
    <label for="confirmPassword">Confirm Password:</label>
    <input type="password" id="confirmPassword" required>
    <br>
    <label for="confirmPassword" id="confirmPasswordLabel" class="hidden"></label>
    <br><br>


    <!-- Debit Card Input -->
    <label for="debitCard">Debit Card:</label>
    <input type="text" id="debitCard" name="debitCard" required placeholder="378282246310005">
    <label class="example-format">Example: 378282246310005 - please try a valid debit card as this uses an algorithm to
        prove whether a debit card is valid</label>
    <br>
    <label for="debitCard" id="debitCardLabel" class="hidden"></label>
    <br>
    <label for="debitCard" id="debitCardLabelBackend" class="hidden"></label>
    <br><br>

    <!-- JSON Input -->
    <label for="jsonInput">JSON:</label>
    <textarea id="jsonInput" name="jsonInput" required placeholder="{ ... }"></textarea>
    <label class="example-format">Example: { "key": "value" }</label>
    <br>
    <label for="jsonInput" id="jsonLabel" class="hidden"></label>
    <br>
    <label for="jsonInput" id="jsonLabelBackend" class="hidden"></label>
    <br><br>

    <!-- File Upload Input -->
    <label for="fileUpload">File Upload:</label>
    <input type="file" id="fileUpload" name="fileUpload" accept="image/png" required>
    <br>
    <label for="fileUpload" id="fileLabel" class="hidden"></label>
    <br>
    <label for="fileUpload" id="fileLabelBackend" class="hidden"></label>
    <br><br>

    <!-- Post Code Input -->
    <label for="postCode">Post Code:</label>
    <input type="text" id="postCode" name="postCode" placeholder="B4 7ET" required>
    <label class="example-format">Example: B4 7ET</label>
    <br>
    <label for="postCode" id="postCodeLabel" class="hidden"></label>
    <br>
    <label for="postCode" id="postCodeLabelBackend" class="hidden"></label>
    <br><br>


    <br>

    <button id="submit">Submit</button>
</body>
<script src="js/validateFile.js"></script>
<script src="js/validateJSON.js"></script>
<script src="js/validatePostCode.js"></script>
<script src="js/validatePassword.js"></script>
<script src="js/validateDebitCard.js"></script>

<script src="js/validateCounty.js"></script>
<script src="js/validateName.js"></script>
<script src="js/validateDOB.js"></script>
<script src="js/validateEmail.js"></script>
<script src="js/validatePhone.js"></script>

<script>
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
        var emailInput = validateEmail();
        var dobInput = validateDOB();
        var phoneInput = validatePhone();
        var countyInput = validateCounty();

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

        return allValid

    }
</script>

<script>
    $(document).ready(function () {
        // when the user clicks on submit comment
        $('#submit').on('click', function () {
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
</script>

</html>