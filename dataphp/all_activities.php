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
            <li><a href="logout.php">Logout</a></li>
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
                        <!-- You can remove the "Edit" column for the "All Activities" page -->
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

                // You can remove the "Edit" button for the "All Activities" page

                echo "</tr>";
            }

            echo '</table>';
        }

        // Call the function to display activities
        displayActivities();
        ?>
    </div>
</body>

</html>
