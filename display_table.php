<?php
namespace forms;
include_once("./php/connection.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Content-Security-Policy: default-src 'self'; script-src 'self'; style-src 'self'; img-src 'self' data:;");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/display_table.css">
    <title>Database Records</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
</head>
<body>
    <h1>Database Records - Return to form <a href="index.php">here</a></h1>
    <form action="display_table.php" method="post">
        <button type="submit">Reset table - DEBUG</button>
    </form>
    <br>

    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $sql = 'Truncate table form_data';
        $result = $con->query($sql);
    }



    // SQL query to select all records from a table
    $sql = "SELECT * FROM form_data";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        echo "<table>";

        // Fetch the first row to print the headers
        $firstRow = $result->fetch_assoc();
        echo "<tr>";
        foreach ($firstRow as $key => $value) {
            echo "<th>$key</th>";
        }
        echo "</tr>";

        // Function to display BLOB data
        function displayBlobData($blob) {
            // Check if the blob is not empty
            if (!empty($blob)) {
                // Assuming it's an image
                return  '<img src="data:image/jpeg;base64,'.base64_encode($blob).'"" />';
            } else {
                return 'N/A';
            }
        }

        // Display all rows
        do {
            echo "<tr>";
            foreach ($firstRow as $key => $value) {
                if ($key == 'file') {
                    // Special handling for the BLOB column
                    echo "<td>" . displayBlobData($value) . "</td>";
                } else {
                    echo "<td>$value</td>";
                }
            }
            echo "</tr>";
        } while ($firstRow = $result->fetch_assoc());

        echo "</table>";
    } else {
        echo "No records found";
    }

    // Close connection
    $con->close();
    ?>
</body>
</html>
