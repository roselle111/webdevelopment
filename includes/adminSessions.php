<?php
session_start();

if ($_SESSION["Role"] == null) {
 header("Location: main.html");
} else {
 if ($_SESSION["Role"] == "admin") {
 } else {
  header("Location: main.html");
 }
}

?>