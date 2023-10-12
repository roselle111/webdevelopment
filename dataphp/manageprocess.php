<?php
include_once('../includes/db_connection.php');
$conn = getConnection();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure 'activityId' is set
    if (isset($_POST["activityId"])) {
        $activityId = $_POST["activityId"];
        $status = $_POST["activityStatus"];
        $remarks = $_POST["remarks"];

        // Perform validation if needed

        // Insert data into the database
        $sql = "INSERT INTO activities (activity_id, status, remarks) VALUES ('$activityId', '$status', '$remarks')";

        if ($conn->query($sql) === TRUE) {
            header('Location: ../life.html');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: 'activityId' is not set.";
    }
}

// Close the database connection
$conn->close();
?>
