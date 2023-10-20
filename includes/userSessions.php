<?php
session_start();
if ($_SESSION["Role"] == null) {
 header("Location: main.html");
} else {
 if ($_SESSION["Role"] == "user") {
 } else {
  header("Location: index.html");
 }
}
?>