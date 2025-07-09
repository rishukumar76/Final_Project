<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: user_login.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Book Ticket</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
  <h1>Book Your Ticket</h1>
  <nav>
    <a href="user_dashboard.php">Dashboard</a>
    <a href="logout.php">Logout</a>
  </nav>
</header>

<div class="form-container">
  <form method="post" action="submit_ticket.php">
    <h2>Event Booking Form</h2>
    <input type="text" name="name" placeholder="Your Name" required value="<?php echo $_SESSION['user_email']; ?>">
    <input type="email" name="email" placeholder="Email" required value="<?php echo $_SESSION['user_email']; ?>">
    <input type="text" name="event" placeholder="Event Name" required>
    <input type="date" name="date" required>
    <input type="number" name="quantity" placeholder="No. of Tickets" required min="1">
    <button type="submit">Book Now</button>
  </form>
</div>
</body>
</html>
