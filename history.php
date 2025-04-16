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
  <title>e-Gram Panchayat - History</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
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
      background-image: url('images/slide2.jpg');
      background-size: cover;
      background-position: center;
      font-family: Arial, sans-serif;
      color: #fff;
    }
    </style>
<body>
  <header><h1 style =color:yellow align=center font-style="italic">E-Gram Panchayat</h1>
    <h1 align=center> History</h1>
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
    main{
      background-image: url('images/bg5.jpg');
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
      color:black;
    }
    
   
  

  </style>



  <main>
    <section>

      <p>The e-Panchayat initiative revolutionized the functioning of Panchayati Raj Institutions (PRIs) by leveraging technology to streamline processes and improve governance at the grassroots level.</p>

      <p>e-Panchayat was introduced in [year] with the aim of digitizing and automating various administrative and decision-making tasks of Gram Panchayats. It aimed to enhance transparency, efficiency, and accessibility in the delivery of public services and welfare schemes.</p>

      <p>Over the years, e-Panchayat has facilitated the computerization of critical processes such as:</p>

      <ul>
        <li>Issuance of various certificates like birth certificate, death certificate, caste certificate, etc.</li>
        <li>Recording and management of land and property-related documents</li>
        <li>Financial management and accounting of Panchayats</li>
        <li>Management of rural development schemes and programs</li>
        <li>Public grievance redressal and citizen engagement</li>
      </ul>

      <p>The implementation of e-Panchayat has significantly improved the accessibility and quality of services for rural citizens. It has empowered local communities by enabling them to actively participate in decision-making processes and monitor the progress of development initiatives.</p>
    </section>
  </main>

  <footer>
    <p>&copy; 2023 e-Gram Panchayat. All rights reserved.</p>
  </footer>
</body>
</html>
