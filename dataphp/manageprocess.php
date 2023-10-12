<?php
include_once('../includes/db_connection.php');
$conn = getConnection();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $status = $_POST["activityStatus"];
    $remarks = $_POST["remarks"];

    // Perform validation if needed

    // Insert data into the database
    $sql = "INSERT INTO manage (status, remarks) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $status, $remarks);

    if ($stmt->execute()) {
        header('Location: ../life.html');
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();







