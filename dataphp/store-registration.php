<?php

session_start();

include_once("../includes/dbutil.php");

$conn = getConnection();

if (isset($_POST['register'])) {
    $name = $_POST["fullname"];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $role = 'user';
    $status = 'active';

    $sql = "INSERT INTO users (Email, Password, Name, Gender, Role, Status)
    VALUES ('" . $email . "','" . $password . "','" . $name . "','" . $gender . "','" . $role . "','" . $status . "')";

    if ($conn->query($sql) === TRUE) {
        if ($role == "admin") { // Use $role instead of $row["Role"]
            $_SESSION["Role"] = "admin";

            header("Location: admin_home.php");
        } else {
            $_SESSION["Role"] = "user";
            header("Location: users_home.php");
        }
    } else {
        header('Location: registration-form.php');
    }

    closeConnection(); 
}
?>
