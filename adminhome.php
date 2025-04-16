<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.html");
    exit();
} 
?>
<!DOCTYPE html>
<html>
<head>
  <title>Gram Panchayat Admin Home</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      background-image: url('images/im8.jpg');
      background-repeat: no-repeat;
      background-size:100%;
    }
    
    h1 {
      color: yellow;
font-style:italic;
      text-align: left;
      padding: 30px;
      font-size: 36px;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }
    
    .container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px;
    }
    
    .menu {
       color:blue;
      display: flex;
      gap: 20px;
    }
    
    .menu a {
      color:black;
      text-decoration: none;
      padding: 10px;
      border-radius: 5px;
      background-color: orange;
      transition: background-color 0.3s ease-in-out;
    }
    
    .menu a:hover {
      background-color:blue;
    }
    
    .content {
   background-image: url('images/im9.jpg');
      margin-top: 50px;
      padding: 20px;
      background-color: rgba(255, 255, 255, 0.8);
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      max-width: 800px;
      margin-left: auto;
      margin-right: auto;
    }
  </style>
</head>
<body>
  <div class="containe">
    <h1 >Gram Panchayat Admin Home</h1>
    <div class="menu">
      <a href="usersinfo.php">registered users</a>
      <a href="admin.php">complaints check</a>
      <a href="uploaddocs.php">upload docs</a>
      <a href="admin_upload_contacts.php">contacts upload</a>
      <a href="admin_payments.php">payment statuss</a>
      <a href="admin_logout.php">logout</a>
    </div>
  </div>
  <div class="content">
    <h2>Welcome, Admin!</h2>
    <p>On this admin home page, you can access various features and manage the Gram Panchayat effectively.</p>
    <p>Please use the navigation menu above to navigate to different sections:</p>
    <ul>
      <li><strong>registered users:</strong>Manage the members of the Gram Panchayat, including adding new members and updating their information</li>
      <li><strong>complaints:</strong> track and update the progress of various complaints by user undertaken by the Gram Panchayat</li>
      <li><strong>upload docs:</strong> the documents uploaded  by the admin to the user to download . </li>
      <li><strong>Budget:</strong> Monitor and manage the budget allocated for different initiatives and projects.</li>
      <li><strong>Reports:</strong> Generate reports and access important data related to the Gram Panchayat's operations.</li>
    </ul>
  </div>
</body>
</html>
