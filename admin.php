<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.html");
    exit();
}

// Handle form submission for updating complaint status
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $complaintId = $_POST['complaint_id'];
    $newStatus = $_POST['new_status'];

    // Perform database update to set the new complaint status
    require('conn.php');
    $updateQuery = "UPDATE complaints SET admin_status = '$newStatus' WHERE id = $complaintId";
    if ($con->query($updateQuery) === TRUE) {
        echo "<p style='font-family: Arial, sans-serif; color: green;'>Complaint status updated successfully.</p>";
    } else {
        echo "<p style='font-family: Arial, sans-serif; color: red;'>Failed to update the complaint status.</p>";
    }
}

// Display all complaints with the option to update status
require('conn.php');
$complaintQuery = "SELECT id, username, complaint, admin_status FROM complaints";
$result = $con->query($complaintQuery);

if ($result->num_rows > 0) {
    echo "<table style='border-collapse: collapse; width: 100%;'>";
    echo "<tr>";
    echo "<th style='border: 1px solid black; padding: 10px; font-family: Arial, sans-serif; color: #333; background-color: #f2f2f2;'>Complaint ID</th>";
    echo "<th style='border: 1px solid black; padding: 10px; font-family: Arial, sans-serif; color: #333; background-color: #f2f2f2;'>Username</th>";
    echo "<th style='border: 1px solid black; padding: 10px; font-family: Arial, sans-serif; color: #333; background-color: #f2f2f2;'>Complaint</th>";
    echo "<th style='border: 1px solid black; padding: 10px; font-family: Arial, sans-serif; color: #333; background-color: #f2f2f2;'>Complaint Status</th>";
    echo "<th style='border: 1px solid black; padding: 10px; font-family: Arial, sans-serif; color: #333; background-color: #f2f2f2;'>Action</th>";
    echo "</tr>";

    while ($row = $result->fetch_assoc()) {
        $complaintId = $row["id"];
        $username = $row["username"];
        $complaint = $row["complaint"];
        $complaintStatus = $row["admin_status"];

        echo "<tr>";
        echo "<td style='border: 1px solid blue; padding: 10px; font-family: Arial, sans-serif; color: #00abf9;'>$complaintId</td>";
        echo "<td style='border: 1px solid blue; padding: 10px; font-family: Arial, sans-serif; color: #00abf9;'>$username</td>";
        echo "<td style='border: 1px solid blue; padding: 10px; font-family: Arial, sans-serif; color: #00abf9;'>$complaint</td>";
        echo "<td style='border: 1px solid blue; padding: 10px; font-family: Arial, sans-serif; color: #00abf9;'>$complaintStatus</td>";
        echo "<td style='border: 1px solid black; padding: 10px; font-family: Arial, sans-serif; color: #333;'>
            <form method='POST' action=''>
            <input type='hidden' name='complaint_id' value='$complaintId'>
            <select name='new_status'>
                <option value='Pending' " . ($complaintStatus == 'Pending' ? 'selected' : '') . ">Pending</option>
                <option value='In Progress' " . ($complaintStatus == 'In Progress' ? 'selected' : '') . ">In Progress</option>
                <option value='Resolved' " . ($complaintStatus == 'Resolved' ? 'selected' : '') . ">Resolved</option>
            </select>
            <button type='submit' name='update'>Update</button>
            </form>
            </td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p style='font-family: Arial, sans-serif; color: red;'>No complaints found.</p>";
}
?>

<a href="adminhome.php">back</a>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Home</title>
    <style>
        body {
            background-image: url('images/im14.jpg');
            background-color:#43073c;
            font-family: Arial, sans-serif;
            color: #0642ff;
        }

        h1, h2 {
            text-align: center;
            margin: 20px 0;
            color: #FFC107;
        }

        .upload-form {
            text-align: center;
            margin-top: 20px;
        }

        .success-message {
            color: green;
        }

        .error-message {
            color: red;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f9f9f9;
        }

        .delete-button {
            background-color: red;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
</html>
