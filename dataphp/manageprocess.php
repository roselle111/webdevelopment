<?php
include_once('../includes/db_connection.php');
$conn = getConnection();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $status = $_POST["activityStatus"];
    $remarks = $_POST["remarks"];

    // Perform validation if needed

    // Insert data into the database
    $sql = "INSERT INTO activities (status, remarks) VALUES ('$status', '$remarks')";

    if ($conn->query($sql) === TRUE) {
        header('Location: ../life.html');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
