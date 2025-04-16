<?php
session_start();

// Check if the user session is not active
if (!isset($_SESSION['username'])) {
    header("Location: login.html"); // Redirect to the user login page
    exit();
}

$uploadsDirectory = "uploads/"; // Directory where the uploaded documents are stored

$uploadedDocuments = scandir($uploadsDirectory); // Get the list of files in the uploads directory

?>

<!DOCTYPE html>
<html>
<head>
    <title>User Home</title>
    <style>
        body {
background-color:#ef6c00;
            background-image: url('images/slid.jpg');
            background-repeat: no-repeat;
            background-size: 100% 100%;
            background-position: center center;
            font-family: Arial, sans-serif;
            color: white;
        }

        h1, h2 {
            text-align: center;
            margin: 20px 0;
            color: cyan;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px auto;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid white;
        }

        th {
            background-color: #333;
            color: white;
        }

        .download-link {
            color: cyan;
            text-decoration: none;
        }

        .download-link:hover {
            text-decoration: underline;
        }

        .no-documents {
            text-align: center;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Welcome, User!</h1>
    <h2>Download Documents</h2>

    <?php
    if (count($uploadedDocuments) > 2) { // Exclude "." and ".." entries from the count
        echo "<table>
                <tr>
                    <th>Document Name</th>
                </tr>";
        foreach ($uploadedDocuments as $document) {
            if ($document != "." && $document != "..") {
                $documentPath = $uploadsDirectory . $document;
                echo "<tr>
                        <td><a href='$documentPath' class='download-link'>$document</a></td>
                      </tr>";
            }
        }
        echo "</table>";
    } else {
        echo "<p class='no-documents'>No documents available for download.</p>";
    }
    ?>

    <a href="documents.php">back</a> <!-- Link to the user logout page -->
</body>
</html>
