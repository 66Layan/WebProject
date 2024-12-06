<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="About University of Tabuk">
  <title>About - University of Tabuk</title>
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
      margin: 85px auto;
      padding: 40px;
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
    <h1>About the University of Tabuk Student's Excuse Portal</h1>
    <p>
      Our platform is designed to assist University of Tabuk students in requesting valid excuses for absences. Whether it's due to illness, personal reasons, or any other valid cause, this portal helps students submit requests for their absence excuses and ensures that they are processed efficiently by the university administration.
    </p>
    <p>
      We understand the importance of keeping track of your attendance, and with this system, students can easily apply for excuses online and track their submission status.
    </p>
    <h2>How It Works:</h2>
    <ul>
      <li>Students can log in to the portal using their student credentials.</li>
      <li>After logging in, students can submit requests for absence excuses.</li>
      <li>The requests are reviewed and processed by university staff.</li>
      <li>Students can view the status of their request at any time.</li>
    </ul>
  </div>

  <footer>
    <p>&copy; 2024 University of Tabuk. All rights reserved.</p>
  </footer>
</body>
</html>