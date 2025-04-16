<?php
session_start();

// Check if the admin session is not active
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.html"); // Redirect to the admin login page
    exit();
}

// Retrieve the registered users' information from the database
require('conn.php'); // Include the database connection file

// Check if the delete action is triggered
if (isset($_GET['delete'])) {
    $userId = $_GET['delete'];

    // Delete the user from the database using prepared statement
    $deleteQuery = "DELETE FROM user_table WHERE id = ?";
    $stmt = $con->prepare($deleteQuery);
    $stmt->bind_param("i", $userId);
    if ($stmt->execute()) {
        header("Location: usersinfo.php"); // Redirect to the admin home page
        exit();
    } else {
        // Delete failed, display an error message or log the error
        echo "Error deleting user: " . $stmt->error;
    }
}

// Select all users from the database
$selectQuery = "SELECT * FROM user_table";
$result = $con->query($selectQuery);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Home</title>
    <style>
 body {
            background-image: url('images/im9.jpg');
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: blue;
        }

        h1, h2 {
            text-align: center;
            margin: 20px 0;
            color: #b71aa3;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f9f9f9;
        }

        tr {
            background-color: #f9f9f9;
        }

        .logout-link {
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        .delete-button {
            background-color: red;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }

        /* Your CSS styles here... */
    </style>
</head>
<body>
    <h1>Welcome, Admin!</h1>
    <h2>Registered Users</h2>

    <table>
        <tr>
            <th>Name</th>
            <th>Mobile</th>
            <th>Aadhar</th>
            <th>State</th>
            <th>Town</th>
            <th>Village</th>
            <th>Action</th>
        </tr>
        <?php
        // Check if there are registered users
        if ($result->num_rows > 0) {
            // Loop through each user and display their information in a table row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['uname'] . "</td>";
                echo "<td>" . $row['mobile'] . "</td>";
                echo "<td>" . $row['aadhar'] . "</td>";
                echo "<td>" . $row['state'] . "</td>";
                echo "<td>" . $row['town'] . "</td>";
                echo "<td>" . $row['village'] . "</td>";
                echo "<td><button onclick='deleteUser(" . $row['id'] . ")'>Delete</button></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No registered users found.</td></tr>";
        }
        ?>
    </table>

    <a href="adminhome.php">Back</a> <!-- Link to the admin logout page -->

    <script>
        function deleteUser(userId) {
            if (confirm("Are you sure you want to delete this user?")) {
                window.location.href = "usersinfo.php?delete=" + userId;
            }
        }
    </script>
</body>
</html>
