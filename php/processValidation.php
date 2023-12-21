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


    //Assigning all the post variables into actual variables
    $fileData = $_FILES["fileData"];
    $jsonData = $_POST["jsonData"];
    $postcodeData = $_POST["postcodeData"];
    $passwordData = $_POST["passwordData"];
    $cardData = $_POST["cardData"];

    $nameData = $_POST["nameData"];
    $lastNameData = $_POST["lastNameData"];
    $emailData = $_POST["emailData"];
    $dobData = $_POST["dobData"];
    $phoneData = $_POST["phoneData"];

    $countyData = $_POST["countyData"];
    $biographyData = $_POST["biographyData"];

    $streetNameData = $_POST["streetNameData"];
    $houseNumberData = $_POST["houseNumberData"];
    $areaData = $_POST["areaData"];
    $cityData = $_POST["cityData"];


    //Assigning all the variables into their respective validator classes
    try {
        $fileValidator = new FileValidator($fileData);
        $jsonValidator = new JSONValidator($jsonData);
        $postCodeValidator = new PostCodeValidator($postcodeData);
        $passwordValidator = new PasswordValidator($passwordData);
        $cardValidator = new DebitCardValidator($cardData);

        $nameValidator = new NameValidator($nameData);
        $lastNameValidator = new NameValidator($lastNameData);
        $emailValidator = new EmailValidator($emailData);
        $ageValidator = new AgeValidator($dobData);
        $phoneValidator = new PhoneValidator($phoneData);

        $biographyValidator = new BiographyValidator($biographyData);
        
        $streetNameValidator = new StreetNameValidator($streetNameData);
        $countyValidator = new CountyValidator($countyData);
        $houseNumberValidator = new HouseNumberValidator($houseNumberData);
        $areaValidator = new AreaValidator($areaData);
        $cityValidator = new CityValidator($cityData);

    } catch (\Exception $e) {
        echo $e;
    }



    try {
        $validatedData["file"] = $fileValidator->validateFile();
        $validatedData["json"] = $jsonValidator->validateJSON();
        $validatedData["postcode"] = $postCodeValidator->validatePostCode();
        $validatedData["password"] = $passwordValidator->validatePassword();
        $validatedData["card"] = $cardValidator->validateDebitCard();

        $validatedData["name"] = $nameValidator->validateName();
        $validatedData["lastname"] = $lastNameValidator->validateName();
        $validatedData["email"] = $emailValidator->validateEmail();
        $validatedData["dob"] = $ageValidator->validateDOB();
        $validatedData["phone"] = $phoneValidator->validatePhone();

        $validatedData["county"] = $countyValidator->validateCounty();
        $validatedData["biography"] = $biographyValidator->validateBiography();

        $validatedData["streetName"] = $streetNameValidator->validateStreetName();
        $validatedData["houseNumber"] =  $houseNumberValidator->validateHouseNumber();
        $validatedData["area"] = $areaValidator->validateArea();
        $validatedData["city"] = $cityValidator->validateCity();



        $count = 0;

        foreach ($validatedData as $key => $value) {
            if ($value[0] === true) {
                $count++;
            }
        }
    } catch (\Exception $e) {
        echo "Error during validation: " . $e->getMessage();
    }

    if ($count == 16) {
        $validatedData["allValid"] = true;

        $fileData = $fileValidator->getCleanedFile();//Retrieving a cleaned version of the file
        $jsonData = htmlspecialchars($jsonValidator->getJSON());
        $cardData = htmlspecialchars($cardValidator->getCardNumber()); 
        $nameData = htmlspecialchars($nameValidator->getName()); 
        $lastNameData = htmlspecialchars($lastNameValidator->getName()); 
        $passwordData = htmlspecialchars($passwordValidator->getPassword());
        
        $emailData = htmlspecialchars($emailValidator->getEmail()); 
        $dobData = htmlspecialchars($ageValidator->getDateOfBirth()); 
        $phoneData = htmlspecialchars($phoneValidator->getPhone()); 
        $countyData = htmlspecialchars($countyValidator->getCounty()); 
        $biographyData = htmlspecialchars($biographyValidator->getBiography());
        
        $streetNameData = htmlspecialchars($streetNameValidator->getStreetName()); 
        $houseNumberData = htmlspecialchars($houseNumberValidator->getHouseNumber()); 
        $areaData = htmlspecialchars($areaValidator->getArea()); 
        $postcodeData = htmlspecialchars($postCodeValidator->getPostCode()); 
        $cityData = htmlspecialchars($cityValidator->getCity()); 


        try {
            $query = $con->prepare("INSERT INTO form_data (name, lastname, email, password, biography, postcode, county, number, card, json, file, dob, streetname, housenumber, area, city) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            // Bind the parameters
            $query->bind_param(
                "ssssssssssbsssss", // Data types of the parameters: s = string, b = blob
                $nameData, $lastNameData, $emailData, $passwordData, $biographyData, $postcodeData, $countyData,
                $phoneData, $cardData, $jsonData, $fileData, $dobData ,$streetNameData ,$houseNumberData , $areaData, $cityData
            );

            // Assuming $fileData is a blob, you might need to send it in packets
            if (!empty($fileData)) {
                $query->send_long_data(10, $fileData); // Number is position in database starting from 0
            }

            // Execute the query
            $query->execute();
        } catch (\Exception $e) {
            echo "Database error: " . $e->getMessage();
        }


    } else {
        $validatedData["allValid"] = false;
    }


    try {
        echo json_encode($validatedData) ;
    } catch (\Exception $e) {
        echo "Error encoding JSON: " . $e->getMessage();
    }
}
?>