<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT id, password FROM admins WHERE username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows == 1) {
    $stmt->bind_result($id, $hashed_password);
    $stmt->fetch();
    if (password_verify($password, $hashed_password)) {
      $_SESSION['admin_id'] = $id;
      $_SESSION['admin_username'] = $username;
      header("Location: admin_dashboard.php");
      exit;
    } else {
      echo "<script>alert('Invalid password.');</script>";
    }
  } else {
    echo "<script>alert('Admin not found.');</script>";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
  <h1>Admin Login - MyTicketHub</h1>
  <nav>
    <a href="index.html">Home</a>
  </nav>
</header>

<div class="form-container">
  <form method="post">
    <h2>Admin Access</h2>
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
  </form>
</div>
</body>
</html>
