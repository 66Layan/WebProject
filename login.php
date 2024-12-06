<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'"; 
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        header('Location: ' . ($user['role'] == 'admin' ? 'admin_dashboard.php' : 'student_dashboard.php'));
        exit;
    } else {
        $error = "Invalid email or password.";
    }
}
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="University of Tabuk Student's Excuse Portal">
  <meta name="author" content="Your Name">
  <title>Login - University of Tabuk</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    body {
      margin: 0;
      font-family: 'Arial', sans-serif;
      background-color: #f5f5f5;
    }
    .container {
      display: flex;
      min-height: 100vh;
    }
    nav {
      background-color: #003366;
      padding: 10px 20px;
      position: sticky;
      top: 0;
      z-index: 1000;
      width: 100%;
    }
    nav ul {
      list-style: none;
      padding: 0;
      margin: 0;
      display: flex;
      justify-content: space-around;
    }
    nav ul li {
      display: inline-block;
    }
    nav ul li a {
      color: white;
      text-decoration: none;
      padding: 10px 20px;
      font-size: 16px;
    }
    nav ul li a:hover {
      background-color: #0055b3;
      border-radius: 5px;
    }
    .login-section {
      width: 40%;
      padding: 40px;
      background-color: #fff;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      margin-top: 20px;
    }
    form {
      width: 100%;
      max-width: 300px;
    }
    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }
    input {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .options {
      margin-bottom: 20px;
    }
    button {
      width: 100%;
      padding: 10px;
      background-color: #003366;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }
    button:hover {
      background-color: #0055b3;
    }
    .welcome-section {
      width: 60%;
      background: url('https://i.pinimg.com/736x/c6/44/fd/c644fd436c784ce74d8bac014f6f3bec.jpg') no-repeat center center/cover;
      color: white;
      display: flex;
      flex-direction: column;
      align-items: center; 
      justify-content: center; 
      text-align: center; 
      padding: 20px;
      position: relative; 
      height: 100vh;
    }
    .welcome-section h3 {
      font-size: 50px;
      font-weight: bold;
      margin: 0;
    }
    footer {
      background-color: #003366;
      color: white;
      text-align: center;
      padding: 12px 20px;
      position: fixed;
      bottom: 0;
      width: 100%;
    }
    footer p {
      font-size: 14px;
      margin: 0;
    }
    @media (max-width: 768px) {
      .container {
        flex-direction: column;
      }
      .login-section, .welcome-section {
        width: 100%;
      }
      nav ul {
        flex-direction: column;
        align-items: center;
      }
    }
  </style>
</head>
<body>
  <nav>
    <ul>
      <li><a href="login.php">Home</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="faq.php">FAQ</a></li>
    </ul>
  </nav>

  <div class="container">
    <div class="login-section">
      <form method="POST">
        <h1>Login</h1>
        <?php if (isset($error)): ?><div class="error" style="color: red;"><?= $error ?></div><?php endif; ?>
        <input type="email" name="email" placeholder="Enter your Email here" required>
        <input type="password" name="password" placeholder="Enter your Password" required>
        <button type="submit">Log in</button>
      </form>
    </div>
    <div class="welcome-section">
      <h3>Welcome to the University of Tabuk Student's Excuse Page</h3>
      <p>Your academic progress, your future!</p>
    </div>
  </div>

  <footer>
    <p>&copy; 2024 University of Tabuk. All rights reserved.</p>
  </footer>
</body>
</html>