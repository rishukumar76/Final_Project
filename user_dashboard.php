<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: user_login.php");
  exit();
}

$user_email = $_SESSION['user_email'];
$stmt = $conn->prepare("SELECT * FROM bookings WHERE email = ?");
$stmt->bind_param("s", $user_email);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
  <title>User Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
  <h1>Welcome to Your Dashboard</h1>
  <nav>
    <a href="index.html">Home</a>
    <a href="book.php">Book Ticket</a>
    <a href="logout.php">Logout</a>
  </nav>
</header>

<div class="container">
  <h2>Your Bookings</h2>
  <table>
    <tr>
      <th>Event</th>
      <th>Date</th>
      <th>Quantity</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?php echo $row['event']; ?></td>
        <td><?php echo $row['date']; ?></td>
        <td><?php echo $row['quantity']; ?></td>
      </tr>
    <?php } ?>
  </table>
</div>
</body>
</html>
