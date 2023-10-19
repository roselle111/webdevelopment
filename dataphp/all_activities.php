<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Activities</title>
    <link rel="stylesheet" href="../css/all_activities.css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="users_home.php">Home</a></li>
        </ul>
    </nav>

    <div class="main">
        <h1>All Activities</h1>

        <?php
        session_start();
        include_once("../includes/dbutil.php");

        function displayActivities()
        {
            $conn = getConnection();
            $userId = $_SESSION['userId'];
            $sql = "SELECT * FROM activities where userId = $userId";
            $result = mysqli_query($conn, $sql);

            if (!$result) {
                die("Query failed: " . mysqli_error($conn));
            }

            echo '<table class="activity-table" id="activityTable">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Location</th>
                        <th>Outfit of the Day</th>
                        <th>Status</th>
                        <th>Remarks</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>';

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                echo "<td>" . htmlspecialchars($row['time']) . "</td>";
                echo "<td>" . htmlspecialchars($row['location']) . "</td>";
                echo "<td>" . htmlspecialchars($row['ootd']) . "</td>";
                echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                echo "<td>" . htmlspecialchars($row['remarks']) . "</td>";
                echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";

                // Add the delete button with a confirmation prompt
                echo '<td>
                        <form id="deleteForm' . $row['id'] . '" action="delete.activity.php" method="post">
                            <input type="hidden" name="activityId" value="' . htmlspecialchars($row['id']) . '">
                            <button type="button" onclick="confirmDelete(' . $row['id'] . ')">Delete</button>
                        </form>
                    </td>';

                echo "</tr>";
            }

            echo '</table>';
        }

        // Call the function to display activities
        displayActivities();
        ?>

        <script>
            function confirmDelete(activityId) {
                var result = confirm("Are you sure you want to delete this activity?");
                if (result) {
                    // If the user clicks "OK," submit the form
                    document.getElementById("deleteForm" + activityId).submit();
                }
            }
        </script>
    </div>
</body>
</html>
