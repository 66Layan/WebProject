<?php
session_start();
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="FAQ - University of Tabuk">
  <title>FAQ - University of Tabuk</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      background-color: #f4f7fc;
      color: #333;
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
      max-width: 900px;
      margin: 40px auto;
      padding: 20px;
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
    .faq-section {
      margin-bottom: 20px;
    }
    .faq-section p {
      font-size: 18px;
      line-height: 1.6;
      margin: 10px 0;
      padding-left: 20px;
      position: relative;
    }
    .faq-section p::before {
      content: "•";
      position: absolute;
      left: 0;
      top: 50%;
      transform: translateY(-50%);
      font-size: 24px;
      color: #003366;
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
    <h1>Frequently Asked Questions (FAQ)</h1>
    
    <div class="faq-section">
      <p><strong>Q: How can I request an excuse for my absence?</strong></p>
      <p>A: To request an excuse, you need to log in first. Once you're logged in, you can access the "Request Excuse" page where you can submit your absence request.</p>
    </div>

    <div class="faq-section">
      <p><strong>Q: What do I need to do before submitting an excuse request?</strong></p>
      <p>A: Make sure to have a valid reason for your absence. You will need to provide this information along with the date of your absence after logging in.</p>
    </div>

    <div class="faq-section">
      <p><strong>Q: Do I need to submit a request every time I miss class?</strong></p>
      <p>A: Yes, you need to submit a request for each absence that you want to be excused. Requests will be reviewed by university staff.</p>
    </div>

    <div class="faq-section">
      <p><strong>Q: Can I request an excuse without logging in?</strong></p>
      <p>A: No, you need to log in with your student credentials to access the request form for submitting an excuse.</p>
    </div>

    <div class="faq-section">
      <p><strong>Q: How can I check the status of my request?</strong></p>
      <p>A: After submitting your request, you can log in to your account and check the status of your absence excuse request.</p>
    </div>
  </div>

  <footer>
    <p>&copy; 2024 University of Tabuk. All rights reserved.</p>
  </footer>
</body>
</html>