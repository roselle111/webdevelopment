<?php
session_start();
include_once("../includes/dbutil.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['activityId'])) {
        $conn = getConnection();
        $userId = $_SESSION['userId'];
        $activityId = mysqli_real_escape_string($conn, $_POST['activityId']);

        // Use prepared statements to prevent SQL injection
        $sql = "DELETE FROM activities WHERE id = ? AND userId = ?";

        $stmt = mysqli_prepare($conn, $sql);

        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ii", $activityId, $userId);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Activity deleted successfully
            mysqli_stmt_close($stmt);
            mysqli_close($conn);

            // Redirect back to the same page
            header("Location: users_home.php");
            exit;
        } else {
            echo "Error deleting activity: " . mysqli_stmt_error($stmt);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } else {
        echo "Invalid request.";
    }
} else {
    echo "Invalid request method.";
}
?>
