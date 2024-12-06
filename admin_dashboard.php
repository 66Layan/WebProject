<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit;
}

$search_id = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['search'])) {
        $search_id = (int)$_POST['search_id'];
    } else {
        $id = (int)$_POST['id'];
        if (isset($_POST['approve'])) {
            $sql = "UPDATE excuses SET status = 'Approved' WHERE id = $id";
        } elseif (isset($_POST['reject'])) {
            $sql = "UPDATE excuses SET status = 'Rejected' WHERE id = $id";
        } elseif (isset($_POST['delete'])) {
            $sql = "DELETE FROM excuses WHERE id = $id";
        }
        mysqli_query($conn, $sql);
    }
}

$sql = "SELECT * FROM excuses";
if ($search_id !== '') {
    $sql .= " WHERE student_id = $search_id";
}
$sql .= " ORDER BY id DESC";

$result = mysqli_query($conn, $sql);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none; /* Remove underline */
            display: inline-block;
            text-align: center;
        }
        .btn-sm {
            font-size: 12px;
        }
        .btn-success {
            background-color: #28a745;
            color: white;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .btn-warning {
            background-color: #ffc107;
            color: white;
        }
        .btn-warning:hover {
            background-color: #e0a800;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
            width: 100%; /* Matches the table width */
            margin-top: 20px;
            padding: 10px 0;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        .search-container {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
        }
        .search-container input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 350px;
        }
        .search-container button {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            background-color: #003366;
            color: white;
            cursor: pointer;
        }
        .search-container button:hover {
            background-color: #002244;
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
        <h2 class="text-center">Admin Dashboard</h2>
        <div class="search-container">
            <form method="POST">
                <input type="text" name="search_id" placeholder="Enter Student ID" value="<?= htmlspecialchars($search_id) ?>">
                <button type="submit" name="search">Search</button>
            </form>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Student ID</th>
                    <th>Reason</th>
                    <th>Absence Date</th>
                    <th>Status</th>
                    <th>Attachment</th>
                    <th>Actions</th>
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
                        <td>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <?php if ($row['status'] == 'Pending'): ?>
                                    <button type="submit" name="approve" class="btn btn-success btn-sm">Approve</button>
                                    <button type="submit" name="reject" class="btn btn-danger btn-sm">Reject</button>
                                <?php endif; ?>
                                <button type="submit" name="delete" class="btn btn-warning btn-sm">Delete</button>
                            </form>
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
