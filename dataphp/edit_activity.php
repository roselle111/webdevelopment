<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activities</title>
<style>
body,
h1,
h2,
h3,
p,
ul,
li,
form {
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f8f8;
    color: #333;
    line-height: 1.6;
}

/* Navigation styles */
nav {
    height: 100%;
    width: 220px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #292b2c;
    overflow-x: hidden;
    padding-top: 20px;
    transition: 0.5s;
}

nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
}

nav li {
    float: left;
}

nav a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    transition: background-color 0.3s;
}

nav a:hover {
    background-color: #555;
}

/* Main content styles */
.main {
    margin-left: 220px;
    padding: 20px;
}

h1 {
    color: #333;
    text-align: center;
    margin-top: 40px;
}

/* Table styles */
table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
    text-align: left;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

th,
td {
    padding: 15px;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #343a40;
    color: white;
}

table tr:hover {
    background-color: #f0f0f0;
}

/* Form styles */
form {
    max-width: 400px;
    margin: 0 auto;
}

label {
    display: block;
    margin-bottom: 8px;
}

input,
select,
textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 12px;
    box-sizing: border-box;
}

/* Button styles */
button {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    cursor: pointer;
    border: none;
    border-radius: 4px;
    color: #fff;
    background-color: #5bc0de;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #31b0d5;
}

/* Edit form container */
#editFormContainer {
    display: none;
}

/* Additional styles for responsiveness */
@media screen and (max-width: 768px) {
    nav {
        width: 100%;
        height: auto;
        position: relative;
    }

    nav ul {
        display: flex;
        flex-direction: column;
    }

    nav li {
        width: 100%;
        float: none;
    }
}

    </style>

</head>

<body>
    <nav>
        <ul>
            <li><a href="users_home.php">Home</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <div class="main">
        <h1>Activity List</h1>

        <?php
        include_once("../includes/dbutil.php");

        function displayActivities() {
            $conn = getConnection();

            $sql = "SELECT * FROM activities";
            $result = mysqli_query($conn, $sql);

            if (!$result) {
                die("Query failed: " . mysqli_error($conn));
            }

            echo '<table class="activity-table" id="activityTable">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Name</th>
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
                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                echo "<td>" . htmlspecialchars($row['time']) . "</td>";
                echo "<td>" . htmlspecialchars($row['location']) . "</td>";
                echo "<td>" . htmlspecialchars($row['ootd']) . "</td>";
                echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                echo "<td>" . htmlspecialchars($row['remarks']) . "</td>";
                echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";

                // Add an Edit button for each row
                echo "<td><button onclick='editActivity(" . $row['id'] . ", \"" . $row['title'] . "\", \"" . $row['name'] . "\", \"" . $row['date'] . "\", \"" . $row['time'] . "\", \"" . $row['location'] . "\", \"" . $row['ootd'] . "\", \"" . $row['status'] . "\", \"" . $row['remarks'] . "\", \"" . $row['created_at'] . "\")'>Edit</button></td>";

                echo "</tr>";
            }

            echo '</table>';

            closeConnection($conn);
        }

        // Call the function to display activities
        displayActivities();
        ?>

        <!-- Add this where you want to display the edit form -->
        <div id="editFormContainer" style="display: none;">
            <form id="editForm" action="editprocess.php" method="post">
                <input type="hidden" id="editActivityId" name="editActivityId" value="">

                <!-- Include other input fields for editing other details -->
                <label for="editActivityTitle">Title:</label>
                <input type="text" id="editActivityTitle" name="editActivityTitle" required>
                <label for="editActivityName">Name:</label>
                <input type="text" id="editActivityName" name="editActivityName" required>
                <label for="editActivityDate">Date:</label>
                <input type="date" id="editActivityDate" name="editActivityDate" required>
                <label for="editActivityTime">Time:</label>
                <input type="time" id="editActivityTime" name="editActivityTime" required>
                <label for="editActivityLocation">Location:</label>
                <input type="text" id="editActivityLocation" name="editActivityLocation" required>
                <label for="editActivityOotd">Outfit of the Day:</label>
                <input type="text" id="editActivityOotd" name="editActivityOotd" required>
                <label for="editActivityStatus">Status:</label>
                <select id="editActivityStatus" name="editActivityStatus">
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
            </form>
        </div>

        <br>
    </div>
<script>
    function editActivity(activityId, title, name, date, time, location, ootd, status, remarks, created_at) {
            // Populate the edit form with activity details
            document.getElementById("editActivityId").value = activityId;
            document.getElementById("editActivityTitle").value = title;
            document.getElementById("editActivityName").value = name;
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
        }
</script>
</body>

</html>
