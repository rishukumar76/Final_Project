<?php
include 'db.php'; // database connection

if (isset($_POST['book'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $date = $_POST['date'];
    $destination = mysqli_real_escape_string($conn, $_POST['destination']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO tickets (name, email, phone, date, destination, message)
            VALUES ('$name', '$email', '$phone', '$date', '$destination', '$message')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Ticket booked successfully!'); window.location.href='book_ticket.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Invalid Access.";
}
?>
