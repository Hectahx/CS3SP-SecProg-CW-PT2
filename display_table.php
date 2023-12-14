<?php
namespace forms;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Database Records</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Database Records - Return to form <a href="index.php">here</a></h1>

    <?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include_once("./php/connection.php");
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
                return  '<img src="data:image/jpeg;base64,'.base64_encode($blob).'" style="width: 100px; height: auto;" />';
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
