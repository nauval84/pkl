<?php
include 'connect.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// ... (Handle internship application form submission and store data in the database) ...
?>