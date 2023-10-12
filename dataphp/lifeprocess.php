<?php
include_once('../includes/db_connection.php');
$conn = getConnection();

// Retrieve form data
$title = mysqli_real_escape_string($conn, $_POST['activityTitle']);
$name = mysqli_real_escape_string($conn, $_POST['activityName']);
$date = mysqli_real_escape_string($conn, $_POST['activityDate']);
$time = mysqli_real_escape_string($conn, $_POST['activityTime']);
$location = mysqli_real_escape_string($conn, $_POST['activityLocation']);

// Validate and sanitize input data here

// Insert data into the database using prepared statement
$sql = "INSERT INTO life (title, name, date, time, location) VALUES (?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "sssss", $title, $name, $date, $time, $location);

if (mysqli_stmt_execute($stmt)) {
    // Provide user feedback
    header('Location: ../life.html');
} else {
    // Provide user feedback in case of an error
    echo "Error: " . mysqli_error($conn);
}

// Close the statement
mysqli_stmt_close($stmt);

// Close the database connection
mysqli_close($conn);
?>
