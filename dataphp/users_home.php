<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        .navbar a.right {
            float: right;
        }

        .navbar a:hover {
            background-color: #555;
            color: #fff;
        }

        .content {
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s;
        }

        .content:hover {
            transform: scale(1.02);
        }

        h1 {
            color: #333;
            transition: color 0.3s;
        }

        .content:hover h1 {
            color: #007bff;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <a href="../life.html">Add Activity</a>
        <a href="edit_activity.php">Edit Activity</a>
        <a href="logout.php" class="right">Logout</a>
    </div>

    <div class="content">
        <h1>Welcome to User Home Page</h1>
    </div>

</body>
</html>
