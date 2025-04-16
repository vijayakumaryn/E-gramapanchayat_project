<!DOCTYPE html>
<html>
<head>
  <title>e-Gram Panchayat</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <header>
    <h1 style="color: yellow;" align="center" font-style="italic">Welcome to E-Gram Panchayat</h1>
 <h1 align=center> HOME PAGE</h1>
    <nav>
  <div class="menu">
     <ul >
      <li ><button><a href="index.php">Home</a></button></li>
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
        session_start();

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
    main {
      background-image: url('images/im10.jpg');
      background-size: cover;
      background-position: center;
      font-family: Arial, sans-serif;
      color: #fff;
    }
   
    .container {
      max-width: 0px;
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
<h6><p style=color:#000000 align="center">Welcome to the online platform for our Gram Panchayat. Access various services and information conveniently.</p></h6>

      <marquee direction="left" scrollamount="10">
        <h2 style="color: blue;" align="center">
          <p>Stay updated with the latest announcements and developments in our village.</p>
        </h2>
      </marquee>
    </section>
    <div class="service">
      <h3>
        <a href="https://swachhamevajayate.org/" target="_blank">ಗ್ರಾಮೀಣ ಕುಡಿಯುವ ನೀರು ಮತ್ತು ನೈರ್ಮಲ್ಯ ಇಲಾಖೆ</a>
      </h3>
    </div>
    <div class="service">
      <h3><a href="schemes.html">Schemes</a></h3>
    </div>
    <div class="service">
      <h3><a href="https://rdpr.karnataka.gov.in/info-2/Rural+Connectivity/Rural+Development/kn">ಗ್ರಾಮೀಣ ಅಭಿವೃದ್ಧಿ</a></h3>
    </div>
    <div class="service">
      <h3><a href="https://rdpr.karnataka.gov.in/info-2/Swachh+Bharat+Mission+(Rural)/kn">ಸ್ವಚ್ಛ ಭಾರತ ಮಿಷನ್‌ (ಗ್ರಾಮೀಣ)</a></h3>
    </div>
    <div class="service">
      <h3><a href="https://rdpr.karnataka.gov.in/info-1/About+Us/kn">ನಮ್ಮ ಬಗ್ಗೆ</a></h3>
    </div>
  </main>

  <footer>
    <p>&copy; 2023 e-Gram Panchayat. All rights reserved.</p>
  </footer>
</body>
</html>
