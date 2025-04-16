<?php
session_start();

// Check if the admin session is not active
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.html"); // Redirect to the admin login page
    exit();
}

// Handle file upload
if (isset($_POST['upload'])) {
    $targetDirectory = "uploads/"; // Directory to store the uploaded files
    $fileName = $_FILES['file']['name'];
    $targetFilePath = $targetDirectory . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allow only certain file formats (e.g., PDF, DOCX)
    $allowedFormats = array('pdf', 'docx');

    if (in_array($fileType, $allowedFormats)) {
        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
            $successMessage = "File uploaded successfully.";
        } else {
            $errorMessage = "File upload failed.";
        }
    } else {
        $errorMessage = "Invalid file format. Only PDF and DOCX files are allowed.";
    }
}

// Handle document deletion
if (isset($_GET['delete'])) {
    $documentPath = $_GET['delete'];

    if (file_exists($documentPath)) {
        unlink($documentPath); // Delete the document file
        $successMessage = "Document deleted successfully.";
      
    } else {
        $errorMessage = "Document not found.";
    }

}

$uploadsDirectory = "uploads/"; // Directory where the uploaded documents are stored
$uploadedDocuments = scandir($uploadsDirectory); // Get the list of files in the uploads directory

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Home</title>
    <style>
        body {
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
<body>
    <h1>Welcome, Admin!</h1>
    <h2>Upload Document</h2>

    <div class="upload-form">
        <form method="POST" enctype="multipart/form-data">
            <input type="file" name="file" required>
            <br><br>
            <input type="submit" name="upload" value="Upload">
        </form>

        <?php if (isset($successMessage)) { ?>
            <p class="success-message"><?php echo $successMessage; ?></p>
        <?php } ?>

        <?php if (isset($errorMessage)) { ?>
            <p class="error-message"><?php echo $errorMessage; ?></p>
        <?php } ?>
    </div>

    <h2>Uploaded Documents</h2>

    <?php if (count($uploadedDocuments) > 2) { // Exclude "." and ".." entries from the count ?>
        <table>
            <tr>
                <th>Document Name</th>
                <th>Action</th>
            </tr>
            <?php foreach ($uploadedDocuments as $document) {
                if ($document != "." && $document != "..") {
                    $documentPath = $uploadsDirectory . $document;
                    echo "<tr>
                            <td>$document</td>
                            <td><button class='delete-button' onclick='deleteDocument(\"$documentPath\")'>Delete</button></td>
                          </tr>";
                }
            } ?>
        </table>
    <?php } else {
        echo "<p>No documents available.</p>";
    } ?>

    <script>
        function deleteDocument(documentPath) {
            if (confirm("Are you sure you want to delete this document?")) {
                window.location.href = "uploaddocs.php?delete=" + documentPath;
            }
        }
    </script>

    <a href="adminhome.php">Go back to Home</a> <!-- Link to go back to the admin home page -->
</body>
</html>
