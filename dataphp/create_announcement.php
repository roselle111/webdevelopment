<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Announcement</title>
    <link rel="stylesheet" href="../css/create.css">
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
