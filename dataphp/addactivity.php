<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Activities</title>
    <link rel="stylesheet" href="../css/addactivity.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="users_home.php">Home</a></li>
        </ul>
    </nav>

    <div class="main">
        <!-- Life Activities Manager Form -->
    <form id="activityForm" action="addprocess_act.php" method="post">
        <label for="activityTitle">Title:</label>
        <input type="text" id="activityTitle" name="activityTitle" required>

        <label for="activityDate">Date:</label>
        <input type="date" id="activityDate" name="activityDate" required>

        <label for="activityTime">Time:</label>
        <input type="time" id="activityTime" name="activityTime" required>

        <label for="activityLocation">Location:</label>
        <input type="text" id="activityLocation" name="activityLocation" required>

        <label for="ootd">Outfit of the Day:</label>
        <input type="text" id="ootd" name="ootd" required>

        <label for="activityStatus">Set Activity Status:</label>
        <select id="activityStatus" name="activityStatus" onchange="handleStatusChange()">
            <option value="Cancel">Cancel</option>
            <option value="Done">Done</option>
            <option value="Remarks">Remarks</option>
        </select>

        <div id="remarksSection" style="display: none;">
            <label for="remarks">Remarks:</label>
            <textarea id="remarks" name="remarks"></textarea>
        </div>

        <button type="submit">Save</button>
    </form>

    <script>
        function handleStatusChange() {
            var selectedStatus = document.getElementById("activityStatus").value;
            var remarksSection = document.getElementById("remarksSection");

            if (selectedStatus === "Remarks") {
                remarksSection.style.display = "block";
            } else {
                remarksSection.style.display = "none";
            }
        }
    </script>

        
    </div>
</body>

</html>
