<?php
session_start();

if ($_SESSION["Role"] == null) {
    header("Location: main.html");
   } else {
    if ($_SESSION["Role"] == "admin") {
    } else {
     header("Location: index.html");
    }
}
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
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
    </style>
</head>

<body>
    <nav>
        <ul>
            <li><a href="users.php">Users</a></li>
            <li><a href="barpiegraph.php">Graphs</a></li>
            <li><a href="create_announcement.php">Announcement</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <div class="content">
        <h1>Welcome to Admin Home Page</h1>
    </div>

</body>

</html>
