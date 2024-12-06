<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'student') {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$user_name = '';  
$sql = "SELECT name FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $sql);
if ($row = mysqli_fetch_assoc($result)) {
    $user_name = $row['name'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $reason = mysqli_real_escape_string($conn, $_POST['reason']);
    if ($reason === 'Other') {
        $reason = mysqli_real_escape_string($conn, $_POST['other_reason']);
    }
    $absence_date = mysqli_real_escape_string($conn, $_POST['absence_date']);
    $attachment = '';

    if (!empty($_FILES['attachment']['name'])) {
        $attachment = 'uploads/' . basename($_FILES['attachment']['name']);
        move_uploaded_file($_FILES['attachment']['tmp_name'], $attachment);
    }

    $sql = "INSERT INTO excuses (user_id, reason, absence_date, attachment, student_name, student_id) 
            VALUES ($user_id, '$reason', '$absence_date', '$attachment', '$name', '$student_id')";
    if (mysqli_query($conn, $sql)) {
        header('Location: student_dashboard.php'); 
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Excuse</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            background-color: #f4f7fc;
            color: #333;
        }
        .container {
            max-width: 830px;
            margin: 90px auto;
            padding: 40px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            display: flex;
            flex-direction: row;
            align-items: center;
            margin-bottom: 15px;
        }
        .form-label {
            font-size: 17px;
            font-weight: bold;
            width: 150px;
            margin-right: -20px;
        }
        .form-control {
            padding: 12px;
            border-radius: 4px;
            border: 1px solid #ccc;
            width: 265px;
        }
        .btn {
            font-size: 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: block;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
            padding: 8px 16px;
            width: auto;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
            padding: 8px 20px;
            text-decoration: none;
            text-align: center;
            display: inline-block;
            width: 95.5%;
            margin-top: 27px;
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
        small {
            margin-top: 6px;
            margin-left: 10px;
            font-size: 13px;
            color: #6c757d;
        }
        h2 {
            font-size: 28px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Submit Excuse</h2>
        <form method="POST" enctype="multipart/form-data" onsubmit="return confirmSubmission();">
            <div class="form-group">
                <label for="name" class="form-label">Student Name</label>
                <input type="text" id="name" name="name" class="form-control" value="<?= htmlspecialchars($user_name) ?>" required>
            </div>
            <div class="form-group">
                <label for="student_id" class="form-label">Student ID</label>
                <input type="text" id="student_id" name="student_id" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="reason" class="form-label">Reason</label>
                <select name="reason" id="reason" class="form-control" required onchange="toggleOtherReason(this)">
                    <option value="" disabled selected>Select a reason</option>
                    <option value="Sick">Sick</option>
                    <option value="Family Emergency">Family Emergency</option>
                    <option value="Travel">Travel</option>
                    <option value="Other">Other</option>
                </select>
                <input type="text" name="other_reason" id="other_reason" class="form-control mt-2" placeholder="Specify your reason" style="display: none;">
            </div>
            <div class="form-group">
                <label for="absence_date" class="form-label">Absence Date</label>
                <input type="date" name="absence_date" id="absence_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="attachment" class="form-label">Attachment</label>
                <input type="file" name="attachment" id="attachment" class="form-control" accept="application/pdf,image/*">
                <small class="text-muted">Upload a PDF file or an image</small>
            </div>
            <button type="submit" class="btn btn-primary w-25">Submit</button>
        </form>
        <a href="student_dashboard.php" class="btn btn-secondary w-50 mt-3">Back to Dashboard</a>
    </div>

    <footer>
        <p>&copy; 2024 University of Tabuk. All rights reserved.</p>
    </footer>

    <script>
        function confirmSubmission() {
            return confirm('Are you sure you want to submit this excuse?');
        }

        function toggleOtherReason(selectElement) {
            const otherReasonInput = document.getElementById('other_reason');
            if (selectElement.value === 'Other') {
                otherReasonInput.style.display = 'block';
                otherReasonInput.required = true;
            } else {
                otherReasonInput.style.display = 'none';
                otherReasonInput.required = false;
            }
        }
    </script>
</body>
</html>
