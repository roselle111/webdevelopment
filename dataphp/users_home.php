<?php
include_once('../includes/userSessions.php');
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        /* Basic styling for the navbar */
        .navbar {
            overflow: hidden;
            background-color: #333;
        }

        /* Style for the navbar links */
        .navbar a {
            float: left;
            font-size: 16px;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a.right {
            float: right;
        }

        /* Change color on hover */
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <!-- Links for managing life activities -->
        <a href="../life.html">Add Activity</a>
        <a href="logout.php" class="right">Logout</a>
    </div>
    <div class="content">
        <h1>Welcome to User Home Page</h1>
    </div>
</body>

</html>
