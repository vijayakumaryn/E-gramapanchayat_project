<?php
require('conn.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete'])) {
        $complaintId = $_POST['delete'];

        // Delete the complaint from the database
        $deleteQuery = "DELETE FROM complaints WHERE id = $complaintId";
        if ($con->query($deleteQuery) === TRUE) {
            echo "<p style='font-family: Arial, sans-serif; color: green;'>Complaint deleted successfully.</p>";
        } else {
            echo "<p style='font-family: Arial, sans-serif; color: red;'>Failed to delete the complaint.</p>";
        }
    } else if (isset($_POST['comp'])) {
        $complaint = $_POST["comp"];
        $username = $_SESSION['username'];

        // Store the complaint in the database with admin_status as 'Pending'
        $insertQuery = "INSERT INTO complaints (username, complaint) VALUES ('$username', '$complaint')";
        if ($con->query($insertQuery) === TRUE) {
            echo "<p style='font-family: Arial, sans-serif; color: green;'>Complaint added successfully.</p>";
        } else {
            echo "<p style='font-family: Arial, sans-serif; color: red;'>Failed to store the complaint.</p>";
        }
    }
}

$username = $_SESSION['username'];

echo "<h2 style='font-family: Arial, sans-serif; color: #d2dadd;'>User: $username</h2>";

// Retrieve the registered complaints for the logged-in user
$complaintQuery = "SELECT id, complaint, admin_status FROM complaints WHERE username='$username'";
$result = $con->query($complaintQuery);

if ($result->num_rows > 0) {
    echo "<table style='border-collapse: collapse; width: 100%;'>";
    echo "<tr>";
    echo "<th style='border: 1px solid black; padding: 10px; font-family: Arial, sans-serif; color: #333; background-color: #f2f2f2;'>Complaint ID</th>";
    echo "<th style='border: 1px solid black; padding: 10px; font-family: Arial, sans-serif; color: #333; background-color: #f2f2f2;'>Registered Complaint</th>";
    echo "<th style='border: 1px solid black; padding: 10px; font-family: Arial, sans-serif; color: #333; background-color: #f2f2f2;'>Complaint Status</th>";
    echo "<th style='border: 1px solid black; padding: 10px; font-family: Arial, sans-serif; color: #333; background-color: #f2f2f2;'>Action</th>";
    echo "</tr>";

    while ($row = $result->fetch_assoc()) {
        $complaintId = $row["id"];
        $registeredComplaint = $row["complaint"];
        $complaintStatus = $row["admin_status"];

        echo "<tr>";
        echo "<td style='border: 1px solid blue; padding: 10px; font-family: Arial, sans-serif; color: white;'>$complaintId</td>";
        echo "<td style='border: 1px solid blue; padding: 10px; font-family: Arial, sans-serif; color: white;'>$registeredComplaint</td>";
        echo "<td style='border: 1px solid blue; padding: 10px; font-family: Arial, sans-serif; color: white;'>$complaintStatus</td>";
        echo "<td style='border: 1px solid black; padding: 10px; font-family: Arial, sans-serif; color: #333;'>
            <form method='POST' action=''>
            <button type='submit' name='delete' value='$complaintId'>Delete</button>
            </form>
            </td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p style='font-family: Arial, sans-serif; color: red;'>No registered complaints found for the user.</p>";
}
?>

<style>
body {
    background-image: url('images/im14.jpg');
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    height: 110vh;
    width: 100vw;
}
</style>
