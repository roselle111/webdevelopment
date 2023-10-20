<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            font-size: 16px;
        }

        nav {
            height: 100%;
            width: 250px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #333;
            overflow-x: hidden;
            padding-top: 20px;
            transition: 0.5s;
        }

        nav ul {
            display: flex;
            flex-direction: column;
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
            padding: 14px 16px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #555;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #333;
            overflow-x: hidden;
            padding-top: 20px;
        }

        .sidebar a {
            padding: 10px 16px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            font-size: 16px;
        }

        .sidebar a:hover {
            background-color: #ddd;
            color: black;
        }

        .content {
            margin-left: 250px;
            padding: 16px;
        }
        
        .announcements {
        background-color: #fff;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        padding: 10px;
        margin-top: 20px;
        max-height: 650px; 
        overflow-y: auto;
        width: 50%;
        max-width: 450px; 
        margin-left: auto;
        margin-right: auto; 
       }

        .announcement-box {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
            background-color: #f9f9f9;
        }

        .announcement-box h3 {
            color: #333;
            font-size: 18px;
        }

        .announcement-box p {
            font-size: 16px;
            margin: 10px 0;
        }

        .announcement-box:nth-child(even) {
        background-color: #E6F7FF; 
        }

       .announcement-box:nth-child(odd) {
       background-color: #FFEBEB; 
       }
    </style>
</head>
<body>

    <nav>
        <ul>
            <li><a href="addactivity.php">Add Activity</a></li>
            <li><a href="edit_activity.php">Edit Activity</a></li>
            <li><a href="all_activities.php">All Activities</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <div class="content">
        <h1>Welcome to User Page</h1>
        <!-- Announcements section -->
        <div class="announcements">
            <h2><center>Announcements</center></h2>
            <?php
            // Connect to the database (you can use your dbutil.php functions)
            $connection = new mysqli('localhost', 'root', '', 'website');

            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            // Retrieve announcements from the database
            $sql = "SELECT * FROM announcements ORDER BY created_at DESC";
            $result = $connection->query($sql);

            // Display announcements
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='announcement-box'>"; // Use 'announcement-box' class
                    echo "<h3>" . $row['title'] . "</h3>";
                    echo "<p>" . $row['content'] . "</p>";
                    echo "<p>Posted on: " . $row['created_at'] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "No announcements found.";
            }

            // Close the database connection
            $connection->close();
            ?>
        </div>
    </div>

</body>
</html>
