<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows == 1) {
    $stmt->bind_result($id, $hashed_password);
    $stmt->fetch();
    if (password_verify($password, $hashed_password)) {
      $_SESSION['user_id'] = $id;
      $_SESSION['user_email'] = $email;
      header("Location: user_dashboard.php");
      exit;
    } else {
      echo "<script>alert('Invalid password.');</script>";
    }
  } else {
    echo "<script>alert('User not found.');</script>";
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
<header>
  <h1>User Login - MyTicketHub</h1>
  <nav>
    <a href="index.html">Home</a>
    <a href="user_register.php">Register</a>
  </nav>
</header>

<div class="form-container">
  <form method="post">
    <h2>Login to Your Account</h2>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
  </form>
</div>
</body>
</html>
