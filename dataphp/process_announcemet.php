<?php
function getConnection() {
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'website';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function closeConnection($conn) {
    $conn->close();
}

$conn = getConnection();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted and process the data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["title"]) && isset($_POST["content"]) && !empty($_POST["title"]) && !empty($_POST["content"])) {
        // Collect title and content from the form
        $title = $conn->real_escape_string($_POST["title"]);
        $content = $conn->real_escape_string($_POST["content"]);

        // Perform the database operation, e.g., insert data
        $sql = "INSERT INTO announcements (title, content) VALUES ('$title', '$content')";

        if ($conn->query($sql) === true) {
            header("Location: create_announcement.php");
            exit(); /
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Invalid form data. Please fill in all fields.";
    }
}

closeConnection($conn);
?>
