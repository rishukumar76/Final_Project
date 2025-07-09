<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

  if ($row = mysqli_fetch_assoc($result)) {
    if (password_verify($password, $row['password'])) {
      $_SESSION['user_name'] = $row['name'];
      header("Location: user_dashboard.php");
    } else {
      echo "<script>alert('Invalid password');</script>";
    }
  } else {
    echo "<script>alert('User not found');</script>";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>User Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="form-container">
    <h2>Login</h2>
    <form method="POST">
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="user_register.php">Register here</a></p>
  </div>
</body>
</html>
