<?php
function getConnection(){
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'website';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error){
        die("Connection failed: " .$conn->connect_error);
    }

    return $conn;
}

function closeConnection($conn){
    $conn->close();
}

// Open the connection
$conn = getConnection();

// Perform some database operations

// Close the connection
closeConnection($conn);
?>
