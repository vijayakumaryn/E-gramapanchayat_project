<?php
require('conn.php');
session_start();

// Retrieve contacts from the table
$contactsQuery = "SELECT * FROM contacts";
$contactsResult = mysqli_query($con, $contactsQuery);
$contacts = [];
while ($row = mysqli_fetch_assoc($contactsResult)) {
    $contacts[] = $row;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Contacts</title>
    <style>
        body {
background-image: url('images/im15.jpg');
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1, h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 3px solid black;
        }

        th {
            background-color: blue;
            color: #fff;
        }
    </style>
</head>
<body>
    <h1>User Contacts</h1>

    <!-- Contact List -->
    <h2>Contact List</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Designation</th>
            <th>Phone Number</th>
            <th>Address</th>
        </tr>
        <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?php echo $contact['id']; ?></td>
                <td><?php echo $contact['name']; ?></td>
                <td><?php echo $contact['designation']; ?></td>
                <td><?php echo $contact['phone_number']; ?></td>
                <td><?php echo $contact['address']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<a href="contact.php">back</a>
</body>
</html>
