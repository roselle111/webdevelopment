<?php
session_start();
include_once("../includes/dbutil.php");

$conn = getConnection();

$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * from users where Email = '".$email."' and Password = '".$password."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($row["Email"] == $email && $row["Password"]== $password){ 
    if ($row["Role"] == "admin") {

        header("Location: admin_home.php");

    } else if($row['Role'] == "user") {

        header("Location: users_home.php");

    }

    $_SESSION['userId'] = $row['id'];
    $_SESSION['Role'] = $row['Role'];


} else {
    header("Location: ../main.html");
}

closeConnection();

?>
