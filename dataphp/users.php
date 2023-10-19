<?php
include_once("../includes/adminSessions.php");
include_once("../includes/dbutil.php");

function displayUsers() {
    $conn = getConnection();

    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    echo '<table class="user-table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Password</th>
                <th>Role</th>
                <th>Status</th>
                <th>Gender</th>
            </tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Password']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Role']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Status']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Gender']) . "</td>";
        echo "</tr>";
    }

    echo '</table>';

    closeConnection($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
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

        .main {
            margin-left: 250px;
            padding: 16px;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-top: 70px;
        }

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
            background-color: #333;
            color: white;
        }
    </style>
</head>

<body>

    <nav>
        <ul>
            <li><a href="admin_home.php">Home</a></li>
        </ul>
    </nav>

    <div class="main">
        <h1>User List</h1>

        <?php
        // Call the function to display users
        displayUsers();
        ?>

        <br>
    </div>

</body>

</html>
