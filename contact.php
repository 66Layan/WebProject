<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Contact University of Tabuk">
  <title>Contact - University of Tabuk</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      background-color: #f4f7fc;
      color: #333;
      display: flex;
      flex-direction: column; 
      height: 100vh;
    }
    nav {
      background-color: #003366;
      padding: 10px 20px;
      position: sticky;
      top: 0;
      width: 100%;
      z-index: 1000;
    }
    nav ul {
      list-style: none;
      margin: 0;
      padding: 0;
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
    }
    nav ul li a:hover {
      background-color: #0055b3;
      border-radius: 5px;
    }
    .container {
      max-width: 600px;
      margin: 160px auto;
      padding:50px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
    }
    .container h1 {
      text-align: center;
      font-size: 36px;
      color: #003366;
      margin-bottom: 30px;
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
    <h1>Contact Us</h1>
    <p>For inquiries, please reach us at:</p>
    <p>Email: <a href="mailto:info@ut.edu.sa">info@ut.edu.sa</a></p>
    <p>Phone: +966 12 123 4567</p>
  </div>

  <footer>
    <p>&copy; 2024 University of Tabuk. All rights reserved.</p>
  </footer>
</body>
</html>