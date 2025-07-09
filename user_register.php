<?php
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $name, $email, $password);

  if ($stmt->execute()) {
    echo "<script>alert('Registration successful. Please login.'); window.location.href='user_login.php';</script>";
  } else {
    echo "Error: " . $stmt->error;
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>User Register</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
  <h1>Register - MyTicketHub</h1>
  <nav>
    <a href="index.html">Home</a>
    <a href="user_login.php">Login</a>
  </nav>
</header>

<div class="form-container">
  <form method="post">
    <h2>Create Account</h2>
    <input type="text" name="name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Register</button>
  </form>
</div>
</body>
</html>
