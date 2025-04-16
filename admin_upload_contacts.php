<?php
require('conn.php');
session_start();

// Handle contact upload
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $name = $_POST["name"];
    $designation = $_POST["designation"];
    $phone_number = $_POST["phone_number"];
    $address = $_POST["address"];

    // Insert the new contact into the table
    $insertQuery = "INSERT INTO contacts (name, designation, phone_number, address)
                    VALUES ('$name', '$designation', '$phone_number', '$address')";
    if (mysqli_query($con, $insertQuery)) {
        header("Location: admin_upload_contacts.php");
        exit();
    } else {
        echo "Error: " . $insertQuery . "<br>" . mysqli_error($con);
        // Handle the error case as per your requirements
    }
}

// Handle contact deletion
if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];
    $deleteQuery = "DELETE FROM contacts WHERE id = $deleteId";
    if (mysqli_query($con, $deleteQuery)) {
        header("Location: admin_upload_contacts.php");
        exit();
    } else {
        echo "Error: " . $deleteQuery . "<br>" . mysqli_error($con);
        // Handle the error case as per your requirements
    }
}

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
    <title>Admin - Upload Contacts</title>
    <style>
        body {
            background-image: url('images/im15.jpg');
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1, h2 {
            text-align: center;
        }

        form {
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        label {
            display: inline-block;
            width: 100px;
        }

        input[type="text"] {
            width: 300px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: #fff;
        }

        .delete-btn {
            background-color: #f44336;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Upload Contacts</h1>

    <!-- Contact Upload Form -->
    <form action="admin_upload_contacts.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" pattern="[A-Za-z]+" required><br><br>

        <label for="designation">Designation:</label>
        <input type="text" name="designation" id="designation" pattern="[A-Za-z]+" required><br><br>

        <label for="phone_number">Phone Number:</label>
        <input type="tel" name="phone_number" id="phone_number" pattern="[0-9]{10}" maxlength="10" required><br><br>

        <label for="address">Address:</label>
        <input type="text" name="address" id="address" required><br><br>

        <input type="submit" value="Upload Contact">
    </form>

    <!-- Contact List -->
    <h2>Contact List</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Designation</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
        <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?php echo $contact['id']; ?></td>
                <td><?php echo $contact['name']; ?></td>
                <td><?php echo $contact['designation']; ?></td>
                <td><?php echo $contact['phone_number']; ?></td>
                <td><?php echo $contact['address']; ?></td>
                <td>
                    <form method="get" action="admin_upload_contacts.php" onsubmit="return confirm('Are you sure you want to delete this contact?');">
                        <input type="hidden" name="delete_id" value="<?php echo $contact['id']; ?>">
                        <button type="submit" class="delete-btn">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
