<?php
include 'db.php';

$result = mysqli_query($conn, "SELECT * FROM bookings ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>All Bookings - MyTicketHub</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #007BFF;
      color: white;
      padding: 20px;
      text-align: center;
    }

    nav {
      margin-top: 10px;
    }

    nav a {
      color: white;
      margin: 0 15px;
      text-decoration: none;
      font-weight: bold;
    }

    .container {
      max-width: 1000px;
      margin: 30px auto;
      padding: 20px;
      background: white;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      padding: 12px;
      border: 1px solid #ccc;
      text-align: center;
    }

    th {
      background-color: #007BFF;
      color: white;
    }

    @media (max-width: 768px) {
      nav {
        display: flex;
        flex-direction: column;
      }

      nav a {
        margin: 10px 0;
      }

      table, th, td {
        font-size: 14px;
      }
    }
  </style>
</head>
<body>

  <header>
    <h1>All Bookings</h1>
    <nav>
      <a href="index.html">Home</a>
      <a href="about.html">About</a>
      <a href="contact.html">Contact</a>
      <a href="book.php">Book Tickets</a>
    </nav>
  </header>

  <div class="container">
    <h2>Booking Records</h2>

    <?php if (mysqli_num_rows($result) > 0): ?>
      <table>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Event</th>
          <th>Date</th>
          <th>Quantity</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['event']) ?></td>
            <td><?= $row['date'] ?></td>
            <td><?= $row['quantity'] ?></td>
          </tr>
        <?php endwhile; ?>
      </table>
    <?php else: ?>
      <p>No bookings found.</p>
    <?php endif; ?>

  </div>

</body>
</html>
