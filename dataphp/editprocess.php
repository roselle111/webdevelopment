<?php
include_once("../includes/dbutil.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve data from the edit form
    $editActivityId = $_POST["editActivityId"];
    $editActivityTitle = $_POST["editActivityTitle"];
    $editActivityName = $_POST["editActivityName"];
    $editActivityDate = $_POST["editActivityDate"];
    $editActivityTime = $_POST["editActivityTime"];
    $editActivityLocation = $_POST["editActivityLocation"];
    $editActivityOotd = $_POST["editActivityOotd"];
    $editActivityStatus = $_POST["editActivityStatus"];
    $editActivityRemarks = $_POST["editActivityRemarks"];

    // Update the activity in the database
    $conn = getConnection();

    // Example: Replace placeholders with actual column names
    $sql = "UPDATE activities SET title = ?, name = ?, date = ?, time = ?, location = ?, ootd = ?, status = ?, remarks = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        die("Statement preparation failed: " . mysqli_error($conn));
    }

    // Bind parameters for the prepared statement
    mysqli_stmt_bind_param($stmt, "ssssssssi", $editActivityTitle, $editActivityName, $editActivityDate, $editActivityTime, $editActivityLocation, $editActivityOotd, $editActivityStatus, $editActivityRemarks, $editActivityId);

    if (!mysqli_stmt_execute($stmt)) {
        die("Statement execution failed: " . mysqli_error($conn));
    }

    mysqli_stmt_close($stmt);
    closeConnection($conn);

    // Redirect back to the activity list page after editing
    // echo $editActivityId;
    header("Location:edit_activity.php");
    exit();
}
?>
