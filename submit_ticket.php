<?php
session_start();
include 'db.php';

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
  echo "<script>alert('Invalid access. Please login first.'); window.location.href='user_login.php';</script>";
  exit();
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $event = $_POST['event'];
  $date = $_POST['date'];
  $quantity = $_POST['quantity'];

  // Validate fields
  if (empty($name) || empty($email) || empty($event) || empty($date) || empty($quantity)) {
    echo "<script>alert('All fields are required.'); window.location.href='book.php';</script>";
    exit();
  }

  // Insert into bookings table
  $stmt = $conn->prepare("INSERT INTO bookings (name, email, event, date, quantity) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssi", $name, $email, $event, $date, $quantity);

  if ($stmt->execute()) {
    echo "<script>alert('Ticket booked successfully!'); window.location.href='user_dashboard.php';</script>";
  } else {
    echo "<script>alert('Booking failed. Please try again.'); window.location.href='book.php';</script>";
  }
} else {
  echo "<script>alert('Invalid access method.'); window.location.href='book.php';</script>";
}
?>
