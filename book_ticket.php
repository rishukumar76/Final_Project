<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Book Ticket</title>
  <style>
    body {
      font-family: Arial;
      background-color: #f9f9f9;
    }
    .form-container {
      max-width: 500px;
      margin: 50px auto;
      background: white;
      padding: 25px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      border-radius: 8px;
    }
    input, textarea, select {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    button {
      background: #007BFF;
      color: white;
      border: none;
      padding: 10px 15px;
      cursor: pointer;
      border-radius: 5px;
    }
    button:hover {
      background: #0056b3;
    }
    h2 {
      text-align: center;
      color: #333;
    }
  </style>
</head>
<body>

<div class="form-container">
  <h2>Book Your Ticket</h2>
  <form action="submit_ticket.php" method="POST">
    <input type="text" name="name" placeholder="Your Name" required>
    <input type="email" name="email" placeholder="Your Email" required>
    <input type="text" name="phone" placeholder="Phone Number" required>
    <input type="date" name="date" required>
    <select name="destination" required>
      <option value="">Select Destination</option>
      <option value="Delhi">Delhi</option>
      <option value="Mumbai">Mumbai</option>
      <option value="Kolkata">Kolkata</option>
      <option value="Bangalore">Bangalore</option>
    </select>
    <textarea name="message" placeholder="Message (optional)"></textarea>
    <button type="submit" name="book">Book Ticket</button>
  </form>
</div>

</body>
</html>
