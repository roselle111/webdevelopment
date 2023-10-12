<?php
session_start(); 
session_destroy();
header("Location: ../main.html"); // Change 'login.php' to your login page URL
?>
