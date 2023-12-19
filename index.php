<?php
header("Content-Security-Policy: default-src 'self'; script-src 'self' https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Input Form</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/index.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>

<body>
    <h1>Input Form - See all records <a href="display_table.php">here</a></h1>
    <button id="validButton">Autofill Inputs - Valid</button>
    <button id="invalidButton">Autofill Inputs - Invalid</button>
    <button id="resetButton">Reset Inputs</button>
    <br><br><br>
    <!-- First Name Input -->
    <label for="name">First Name:</label>
    <input type="text" id="name" autocomplete="given-name" placeholder="John">
    <label for="name" class="example-format">Example: John Doe</label>
    <br>
    <label for="name" id="nameLabel" class="hidden"></label>
    <br>
    <label for="name" id="nameLabelBackend" class="hidden"></label>
    <br><br>

    <!-- Last Name Input -->
    <label for="name">Last Name:</label>
    <input type="text" id="name" autocomplete="family-name" placeholder="Doe">
    <label for="name" class="example-format">Example: John Doe</label>
    <br>
    <label for="name" id="nameLabel" class="hidden"></label>
    <br>
    <label for="name" id="nameLabelBackend" class="hidden"></label>
    <br><br>

    <!-- Email Input -->
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" autocomplete="email" placeholder="student@aston.ac.uk">
    <label for="email" class="example-format">Example: student@aston.ac.uk</label>
    <br>
    <label for="email" id="emailLabel" class="hidden"></label>
    <br>
    <label for="email" id="emailLabelBackend" class="hidden"></label>
    <br><br>

    <!-- Date of Birth Input -->
    <label for="dob">Date Of Birth:</label>
    <input type="date" id="dob" name="dob">
    <label for="dob" class="example-format">Example: 01-01-1990</label>
    <br>
    <label for="dob" id="dobLabel" class="hidden"></label>
    <br>
    <label for="dob" id="dobLabelBackend" class="hidden"></label>
    <br><br>

    <!-- Phone Number Input -->
    <label for="phone">Phone Number:</label>
    <input for="dob" type="tel" id="phone" name="phone" autocomplete="tel" placeholder="+447777777777">
    <label for="dob" class="example-format">Example: +447309596318</label>
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
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <label for="password" class="example-format">Password must be at least 8 characters long, contain at least one
        uppercase letter,
        one lowercase letter, one number, and one symbol</label>
    <br>
    <label for="password" id="passwordLabel" class="hidden"></label>
    <br>
    <label for="password" id="passwordLabelBackend" class="hidden"></label>
    <br><br>

    <!-- Confirm Password Input -->
    <label for="confirmPassword">Confirm Password:</label>
    <input type="password" id="confirmPassword" required>
    <label for="confirmPassword" class="example-format">Password must match!</label>
    <br>
    <label for="confirmPassword" id="confirmPasswordLabel" class="hidden"></label>
    <br><br>


    <!-- Debit Card Input -->
    <label for="debitCard">Debit Card:</label>
    <input type="text" id="debitCard" name="debitCard" required placeholder="378282246310005">
    <label for="password" class="example-format">Example: 378282246310005 - please try a valid debit card as this uses
        an algorithm to
        prove whether a debit card is valid</label>
    <br>
    <label for="debitCard" id="debitCardLabel" class="hidden"></label>
    <br>
    <label for="debitCard" id="debitCardLabelBackend" class="hidden"></label>
    <br><br>

    <!-- JSON Input -->
    <label for="jsonInput">JSON:</label>
    <textarea id="jsonInput" name="jsonInput" required placeholder="{ ... }"></textarea>
    <label for="dob" class="example-format">Example: { "key": "value" }</label>
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
    <label for="dob" class="example-format">Example: B4 7ET</label>
    <br>
    <label for="postCode" id="postCodeLabel" class="hidden"></label>
    <br>
    <label for="postCode" id="postCodeLabelBackend" class="hidden"></label>
    <br><br>

    <!--  Full Address Input -->

    <label for="streetName">Street Name:</label>
    <input type="text" id="streetName" name="streetName" placeholder="Stratford Road" required>
    <label for="streetName" class="example-format">Example: Stratford Road </label>
    <br>
    <label for="streetName" id="streetNameLabel" class="hidden"></label>
    <br>
    <label for="streetName" id="streetNameLabelBackend" class="hidden"></label>
    <br><br>

    <label for="houseNumber">House Nmmber:</label>
    <input type="text" id="houseNumber" name="houseNumber" placeholder="50" required>
    <label for="houseNumber" class="example-format">Example: 50 </label>
    <br>
    <label for="houseNumber" id="houseNumberLabel" class="hidden"></label>
    <br>
    <label for="houseNumber" id="houseNumberLabelBackend" class="hidden"></label>
    <br><br>

    <label for="area">Area:</label>
    <input type="text" id="area" name="area" placeholder="Aston" required>
    <label for="area" class="example-format">Example: Aston </label>
    <br>
    <label for="area" id="areaLabel" class="hidden"></label>
    <br>
    <label for="area" id="areaLabelBackend" class="hidden"></label>
    <br><br>

    <label for="city">City:</label>
    <input type="text" id="city" name="city" placeholder="Birmingham" required>
    <label for="city" class="example-format">Example: Birmingham </label>
    <br>
    <label for="city" id="cityLabel" class="hidden"></label>
    <br>
    <label for="city" id="cityLabelBackend" class="hidden"></label>
    <br><br>

    <br>

    <button id="submit">Submit</button>
</body>

<script src="js/autofillData.js"></script>
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

<script src="js/validateArea.js"></script>
<script src="js/validateCity.js"></script>
<script src="js/validateHouseNumber.js"></script>
<script src="js/validateStreetName.js"></script>

<script src="js/validateAll.js"></script>
<script src="js/sendData.js"></script>

</html>