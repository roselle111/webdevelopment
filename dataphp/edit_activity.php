<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Activity</title>
    <link rel="stylesheet" href="../css/edit.css">
</head>

<style>
    nav ul {
        display: flex;
        flex-direction: column;
    }

    nav a {
        text-align: left;
    }
</style>

<body>
    <nav>
        <ul>
            <li><a href="users_home.php">Home</a></li>
        </ul>
    </nav>

    <div class="main">
        <h1>Activity List</h1>

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
                        <th>Edit</th>
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

                // Add an Edit button for each row
                echo "<td><button onclick='editActivity(" . $row['id'] . ", \"" . $row['title'] . "\", \"" . $row['date'] . "\", \"" . $row['time'] . "\", \"" . $row['location'] . "\", \"" . $row['ootd'] . "\", \"" . $row['status'] . "\", \"" . $row['remarks'] . "\", \"" . $row['created_at'] . "\")'>Edit</button></td>";

                echo "</tr>";
            }

            echo '</table>';
        }

        // Call the function to display activities
        displayActivities();
        ?>
               
               <!--DISPLAY EDIT-->
        <!-- Add this where you want to display the edit form -->
        <div id="editFormContainer" style="display: none;">
            <form id="editForm" action="editprocess.php" method="post">
                <input type="hidden" id="editActivityId" name="editActivityId" value="">

                <!-- Include other input fields for editing other details -->
                <label for="editActivityTitle">Title:</label>
                <input type="text" id="editActivityTitle" name="editActivityTitle" required>
                <label for="editActivityDate">Date:</label>
                <input type="date" id="editActivityDate" name="editActivityDate" required>
                <label for="editActivityTime">Time:</label>
                <input type="time" id="editActivityTime" name="editActivityTime" required>
                <label for="editActivityLocation">Location:</label>
                <input type="text" id="editActivityLocation" name="editActivityLocation" required>
                <label for="editActivityOotd">Outfit of the Day:</label>
                <input type="text" id="editActivityOotd" name="editActivityOotd" required>
                <label for="editActivityStatus">Status:</label>
                <select id="editActivityStatus" name="editActivityStatus" onchange="handleStatusChange()">
                    <option value="Cancel">Cancel</option>
                    <option value="Done">Done</option>
                    <option value="Remarks">Remarks</option>
                </select>
                <div id="editRemarksSection" style="display: none;">
                    <label for="editActivityRemarks">Remarks:</label>
                    <textarea id="editActivityRemarks" name="editActivityRemarks"></textarea>
                </div>
                <input type="hidden" id="editActivityCreatedAt" name="editActivityCreatedAt" value="">

                <button type="submit">Save Changes</button>
                <button type="button" onclick="closeEditForm()">Close</button>
            </form>
        </div>
    </div>

    <script>
        function editActivity(activityId, title, date, time, location, ootd, status, remarks, created_at) {
            
            // edit form with activity details
            document.getElementById("editActivityId").value = activityId;
            document.getElementById("editActivityTitle").value = title;
            document.getElementById("editActivityDate").value = date;
            document.getElementById("editActivityTime").value = time;
            document.getElementById("editActivityLocation").value = location;
            document.getElementById("editActivityOotd").value = ootd;
            document.getElementById("editActivityStatus").value = status;
            document.getElementById("editActivityRemarks").value = remarks;
            document.getElementById("editActivityCreatedAt").value = created_at;

            // Show the edit form and hide the table
            document.getElementById("editFormContainer").style.display = "block";
            document.getElementById("activityTable").style.display = "none";

            // Handle initial status change for Remarks
            handleStatusChange();
        }

        function handleStatusChange() {
            var selectedStatus = document.getElementById("editActivityStatus").value;
            var editRemarksSection = document.getElementById("editRemarksSection");

            if (selectedStatus === "Remarks") {
                editRemarksSection.style.display = "block";
            } else {
                editRemarksSection.style.display = "none";
            }
        }

        function closeEditForm() {
            // Hide the edit form and show the table
            document.getElementById("editFormContainer").style.display = "none";
            document.getElementById("activityTable").style.display = "block";
        }
    </script>
</body>

</html>
