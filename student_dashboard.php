<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'student') {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM excuses WHERE user_id = $user_id";
$result = mysqli_query($conn, $sql);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            background-color: #f4f7fc;
            color: #333;
        }
        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            text-align: left;
            padding: 10px;
        }
        table thead {
            background-color: #003366;
            color: white;
        }
        table tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }
        table tbody tr:nth-child(even) {
            background-color: #fff;
        }
        .btn {
            font-size: 14px;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none; /* Removes underline */
        }
        .btn-success {
            background-color: #28a745;
            color: white;
            display: inline-block;
            margin-bottom: 20px;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
            text-align: center;
            width: 97.5%; /* Matches the width of the table */
            display: block;
            margin: 20px auto 0;
            padding: 15px;
            text-decoration: none; /* Removes underline */
        }
        .btn-secondary:hover {
            background-color: #5a6268;
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
    <div class="container">
        <h2 class="text-center">Student Dashboard</h2>
        <!-- Button spaced below heading -->
        <a href="submit_excuse.php" class="btn btn-success">Submit New Excuse</a>
        <table class="table table-striped" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Student ID</th>
                    <th>Reason</th>
                    <th>Absence Date</th>
                    <th>Status</th>
                    <th>Attachment</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['student_name']) ?></td>
                        <td><?= htmlspecialchars($row['student_id']) ?></td>
                        <td><?= htmlspecialchars($row['reason']) ?></td>
                        <td><?= htmlspecialchars($row['absence_date']) ?></td>
                        <td>
                            <span class="badge <?= ($row['status'] == 'Approved') ? 'bg-success' : ($row['status'] == 'Rejected' ? 'bg-danger' : 'bg-warning') ?>">
                                <?= htmlspecialchars($row['status']) ?>
                            </span>
                        </td>
                        <td>
                            <?php if (!empty($row['attachment'])): ?>
                                <a href="<?= htmlspecialchars($row['attachment']) ?>" target="_blank">View Attachment</a>
                            <?php else: ?>
                                No Attachment
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="login.php" class="btn btn-secondary">Back to Login</a>
    </div>
    <footer>
        <p>&copy; 2024 University of Tabuk. All rights reserved.</p>
    </footer>
</body>
</html>
