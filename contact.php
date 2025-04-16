<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    // Redirect the user to the login page
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>e-Gram Panchayat - Contact</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <header><h1 style =color:yellow align=center font-style="italic">E-Gram Panchayat</h1>
    <h1 align=center>CONTACT</h1>
<nav>
 
   <div class="menu">
     <ul style="font-style:italic; font-size:16px; color:#FF0000;">
      <li style="color:#00ff00;" ><button><a href="index.php">Home</a></button></li>
      <li ><button><a href="history.php">History</a></li>
      <li ><button><a href="services.php">Services</a></button></li>
      <li ><button><a href="documents.php">Documents</a></button></li>
      <li><button><a href="aboutus.html">About us</a></button></li>
      <li ><button><a href="complaintform.html">complaints</a></button></li>
      <li ><button><a href="contact.php">Contact</a></button></li>
     
    </ul>
     </div>

 <div class="button" align="right">
        <?php
   

        if (isset($_SESSION['username'])) {
          // User is logged in, display the username and logout button
          echo "Logged in as: " . $_SESSION['username'];
          echo '<button><a href="logout.php">Logout</a></button>';
        } else {
          // User is not logged in, display the Sign Up and Login buttons
          echo '<button><a href="register.html">Sign Up</a></button>';
          echo '<button><a href="login.html">Login</a></button>';
        }
        ?>
      </div>
</nav>
  </header>

 <style>
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
      background-color: yellow;
      transition: background-color 0.3s ease-in-out;
    }
    
    .menu a:hover {
      background-color:#d2e527;
    }
 .button {
  
        align-items:right;
       color:black;
   
      gap: ;
    }
    
    .button a {
      color:black;
      text-decoration: none;
      padding: 10px;
      border-radius: 5px;
      background-color: yellow;
      transition: background-color 0.3s ease-in-out;
    }
    
    .button a:hover {
      background-color:blue;
    }
    main{
      background-image: url('images/comp1.jpeg');
      background-size: cover;
      background-position: center;
      font-family: Arial, sans-serif;
      color: #fff;
    }
    
    .container {
      max-width:0px;
      margin: 0 auto;
      padding: 0px;
      text-align: center;
    }
    
    h1 {
      font-size: 40px;
      margin-bottom: 20px;
      color: #ff0055;
    }
    
    p {
      font-size: 20px;
      margin-bottom: 20px;
    }
    
   
  

  </style>
  <main>
    <section>
      <p>Use this page to find contact information for reaching out to the e-Gram Panchayat.</p>

      <div class="contact">
        <h3>view contacts</h3>
        <p> <a href="user_contacts.php">staffs contacts</a></p>
      </div>
      
      <div class="contact">
        <h3>Email</h3>
        <p>Email: <a href="mailto:info@egrampanchayat.com">info@egrampanchayat.com</a></p>
      </div>
      
      <div class="contact">
        <h3>Phone</h3>
        <p>Phone: <a href="tel:+1234567890">+1234567890</a></p>
      </div>
      
      <div class="contact">
        <h3>Address</h3>
        <p>Address: 123 Main Street, Village, City</p>
      </div>
    </section>
  </main>

  <footer>
    <p>&copy; 2023 e-Gram Panchayat. All rights reserved.</p>
  </footer>
</body>
</html>
