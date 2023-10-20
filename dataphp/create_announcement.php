<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Announcement</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            font-size: 16px;

        }

        .container {
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            padding: 20px;
            width: 400px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        textarea {
            width: 93%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="text"]:focus,
        textarea:focus {
            border: 2px solid #555;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            display: block;
            margin: 20px auto;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }

        textarea {
            resize: vertical;
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
            <li><a href="admin_home.php">Home</a></li>
        </ul>
    </nav>
    </nav>
    <div class="container">
        <h1>Create Announcement</h1>
        <form action="process_announcemet.php" method="post">
            <label for="title">Title:</label>
            <input type="text" name="title" required>
            <label for="content">Content:</label>
            <textarea name="content" rows="4" required></textarea>
            <input type="submit" value="Submit Announcement">
        </form>
    </div>
</body>
</html>
