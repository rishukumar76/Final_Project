-- Create Users Table
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
);

-- Create Bookings Table
CREATE TABLE bookings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  event VARCHAR(100) NOT NULL,
  date DATE NOT NULL,
  quantity INT NOT NULL
);

-- Optional: Create Admins Table
CREATE TABLE admins (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
);

-- Optional: Insert Default Admin (replace hashed password)
INSERT INTO admins (username, password)
VALUES ('admin', '$2y$10$ReplaceWithHashedPassword');

-- Optional: Insert Demo User (replace hashed password)
INSERT INTO users (name, email, password)
VALUES ('Test User', 'test@example.com', '$2y$10$ReplaceWithHashedPassword');

-- Optional: Sample Booking
INSERT INTO bookings (name, email, event, date, quantity)
VALUES ('Test User', 'test@example.com', 'Music Concert', '2025-08-01', 2);
