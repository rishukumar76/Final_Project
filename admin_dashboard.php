<?php
session_start();
include 'db.php';

if (!isset($_SESSION['admin_id'])) {
  header("Location: admin_login.php");
  exit();
}

$result = $conn->query("SELECT * FROM bookings ORDER BY date DESC");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
  <h1>Admin Dashboard - All Bookings</h1>
  <nav>
    <a href="index.html">Home</a>
    <a href="logout.php">Logout</a>
  </nav>
</header>

<div class="container">
  <h2>All Bookings</h2>
  <table>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Event</th>
      <th>Date</th>
      <th>Quantity</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['event']; ?></td>
        <td><?php echo $row['date']; ?></td>
        <td><?php echo $row['quantity']; ?></td>
      </tr>
    <?php } ?>
  </table>
</div>
</body>
</html>
