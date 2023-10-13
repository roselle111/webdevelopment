<?php
include_once('../includes/db_connection.php');
$conn = getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if 'activityStatus' is set; if set, update existing activity, else add a new activity
    if (isset($_POST['activityStatus'])) {
        // Update existing activity status
        $activityStatus = mysqli_real_escape_string($conn, $_POST['activityStatus']);
        $remarks = mysqli_real_escape_string($conn, $_POST['remarks'] ?? '');

        // Perform validation if needed

        // Update data in the 'activities' table
        $sql = "INSERT INTO activities (title, name, date, time, location, ootd, status, remarks) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        
        $title = mysqli_real_escape_string($conn, $_POST['activityTitle']);
        $name = mysqli_real_escape_string($conn, $_POST['activityName']);
        $date = mysqli_real_escape_string($conn, $_POST['activityDate']);
        $time = mysqli_real_escape_string($conn, $_POST['activityTime']);
        $location = mysqli_real_escape_string($conn, $_POST['activityLocation']);
        $ootd = mysqli_real_escape_string($conn, $_POST['ootd']);

        mysqli_stmt_bind_param($stmt, "ssssssss", $title, $name, $date, $time, $location, $ootd, $activityStatus, $remarks);

        if (mysqli_stmt_execute($stmt)) {
            // Provide user feedback
            header('Location: ../life.html');
        } else {
            // Provide user feedback in case of an error
            echo "Error: " . mysqli_error($conn);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Handle the case for adding a new activity
        $title = mysqli_real_escape_string($conn, $_POST['activityTitle']);
        $name = mysqli_real_escape_string($conn, $_POST['activityName']);
        $date = mysqli_real_escape_string($conn, $_POST['activityDate']);
        $time = mysqli_real_escape_string($conn, $_POST['activityTime']);
        $location = mysqli_real_escape_string($conn, $_POST['activityLocation']);
        $ootd = mysqli_real_escape_string($conn, $_POST['ootd']);
        
        // Perform validation if needed

        // Insert data into the 'activities' table
        $sql = "INSERT INTO activities (title, name, date, time, location, ootd) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssssss", $title, $name, $date, $time, $location, $ootd);

        if (mysqli_stmt_execute($stmt)) {
            // Provide user feedback
            header('Location: ../life.html');
        } else {
            // Provide user feedback in case of an error
            echo "Error: " . mysqli_error($conn);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    }
}

// Close the database connection
mysqli_close($conn);
?>
