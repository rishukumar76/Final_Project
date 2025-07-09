<?php
// XAMPP localhost MySQL connection settings
$host = "localhost";        // Default hostname
$user = "root";             // Default user in XAMPP
$pass = "";                 // Default password is blank
$db   = "ticket_booking";   // ✅ Make sure this DB exists in phpMyAdmin

// Create MySQL connection
$conn = mysqli_connect($host, $user, $pass, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
