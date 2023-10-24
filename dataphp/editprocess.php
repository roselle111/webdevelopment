
<?php
include_once("../includes/dbutil.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve data from the edit form
    $editActivityId = $_POST["editActivityId"];
    $editActivityTitle = $_POST["editActivityTitle"];
    $editActivityDate = $_POST["editActivityDate"];
    $editActivityTime = $_POST["editActivityTime"];
    $editActivityLocation = $_POST["editActivityLocation"];
    $editActivityOotd = $_POST["editActivityOotd"];
    $editActivityStatus = $_POST["editActivityStatus"];
    $editActivityRemarks = $_POST["editActivityRemarks"];

    // Update the activity in the database
    $conn = getConnection();

    $sql = "UPDATE activities SET title = ?, date = ?, time = ?, location = ?, ootd = ?, status = ?, remarks = ? WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        die("Statement preparation failed: " . mysqli_error($conn));
    }

    // Bind parameters for the prepared statement
    mysqli_stmt_bind_param($stmt, "sssssssi", $editActivityTitle, $editActivityDate, $editActivityTime, $editActivityLocation, $editActivityOotd, $editActivityStatus, $editActivityRemarks, $editActivityId);

    if (!mysqli_stmt_execute($stmt)) {
        die("Statement execution failed: " . mysqli_error($conn));
    }

    mysqli_stmt_close($stmt);
    closeConnection($conn);

    header("Location:edit_activity.php");
    exit();
}
?>
