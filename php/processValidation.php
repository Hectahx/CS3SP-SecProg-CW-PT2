<?php
namespace forms;

/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/


try {
    $phpFiles = glob('*.php');
    // Loop through each file and include it
    foreach ($phpFiles as $phpFile) {
        include_once($phpFile);
    }
} catch (\Exception $e) {
    echo "Error including files: " . $e->getMessage();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $validatedData; // This is where the data being sent back to the client is stored
    
    //Assigning all the post variables into actual variables
    $fileData = $_FILES["fileData"];
    $jsonData = $_POST["jsonData"];
    $postcodeData = $_POST["postcodeData"];
    $passwordData = $_POST["passwordData"];
    $cardData = $_POST["cardData"];

    $nameData = $_POST["nameData"];
    $emailData = $_POST["emailData"];
    $dobData = $_POST["dobData"];
    $phoneData = $_POST["phoneData"];
    $countyData = $_POST["countyData"];

    //Assigning all the variables into their respective validator classes
    try{
        $fileValidator = new FileValidator($fileData); 
        $jsonValidator = new JSONValidator($jsonData); 
        $postCodeValidator = new PostCodeValidator($postcodeData); 
        $passwordValidator = new PasswordValidator($passwordData); 
        $cardValidator = new DebitCardValidator($cardData); 
    
        $nameValidator = new NameValidator($nameData); 
        $emailValidator = new EmailValidator($emailData); 
        $ageValidator = new AgeValidator($dobData); 
        $phoneValidator = new PhoneValidator($phoneData); 
        $countyValidator = new CountyValidator($countyData); 
    } catch (\Exception $e){
        echo $e;
    }

    

    try {
    $validatedData["file"] = $fileValidator->validateFile();
    $validatedData["json"] = $jsonValidator->validateJSON();
    $validatedData["postcode"] = $postCodeValidator->validatePostCode();
    $validatedData["password"] = $passwordValidator->validatePassword();
    $validatedData["card"] = $cardValidator->validateDebitCard();

    $validatedData["name"] = $nameValidator->validateName();
    $validatedData["email"] = $emailValidator->validateEmail();
    $validatedData["dob"] = $ageValidator->validateDOB();
    $validatedData["phone"] = $phoneValidator->validatePhone();
    $validatedData["county"] = $countyValidator->validateCounty();

    $count = 0;

    foreach ($validatedData as $key => $value) {
        if($value[0] === true){
            $count++;
        }
    }
    } catch (\Exception $e) {
        echo "Error during validation: " . $e->getMessage();
    }

    if($count == 10){
        $validatedData["allValid"] = true;
        
        $fileData = file_get_contents($_FILES['fileData']['tmp_name']);
        $jsonData = htmlspecialchars($jsonData);
        $postcodeData = htmlspecialchars($postcodeData);
        $cardData = htmlspecialchars($cardData);

        $nameData = htmlspecialchars($nameData);
        $emailData = htmlspecialchars($emailData);
        $dobData = htmlspecialchars($dobData);
        $phoneData = htmlspecialchars($phoneData);
        $countyData = htmlspecialchars($countyData);

        try {

        $query = $con->prepare("INSERT INTO form_data (name, email, password, postcode, county, number, card, json, file, dob) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Bind the parameters
        $query->bind_param(
            "ssssssssbs", // Data types of the parameters: s = string, b = blob
            $nameData, $emailData, $passwordData, $postcodeData, $countyData,
            $phoneData, $cardData, $jsonData, $fileData, $dobData
        );
        
        // Assuming $fileData is a blob, you might need to send it in packets
        if (!empty($fileData)) {
            $query->send_long_data(8, $fileData);
        }
        
        // Execute the query
        $query->execute();
        } catch (\Exception $e) {
            echo "Database error: " . $e->getMessage();
        }
        

    }
    else{
        $validatedData["allValid"] = false;
    }


    try {
        echo json_encode($validatedData);
    } catch (\Exception $e) {
        echo "Error encoding JSON: " . $e->getMessage();
    }
}
?>