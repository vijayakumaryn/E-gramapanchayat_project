<!DOCTYPE html>
<html>
<head>
  <title>Payment Details</title>
    <style>
    body {
      font-family: Arial, sans-serif;
       background-image: url('images/im11.jpg');
      background-size: cover;
      background-position: center;
      color: #333;
    }

    h1 {
      text-align: center;
      color: #555;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      background-color: #ff8100;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ccc;
    }

    th {
      background-color: #f5f5f5;
    }

    form {
      margin-top: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"], select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      margin-bottom: 10px;
    }

    input[type="submit"] {
      background-color: #555;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #333;
    }
  </style>
</head>
<body>
  <h1>Payment Details</h1>

  <div class="container">
    <?php
      // Start the session and check if the user is logged in
      session_start();
      if (!isset($_SESSION['username'])) {
        echo '<p>Please log in to view payment details.</p>';
        exit();
      }

      // Retrieve the logged-in user's username
      $username = $_SESSION['username'];

      // Include the database connection file
      require_once 'conn.php';

      // Prepare the SQL statement
      $stmt = $con->prepare("SELECT * FROM payments WHERE property_owner = ?");

      // Bind parameter
      $stmt->bind_param('s', $username);

      // Execute the statement
      $stmt->execute();

      // Get the result
      $result = $stmt->get_result();

      // Check if the payment records exist
      if ($result->num_rows > 0) {
        // Display the payment details in a table format
        echo '<table>';
        echo '<tr><th>Property ID</th><th>Property Owner</th><th>Payment Amount</th><th>Payment Method</th><th>Payment Status</th><th>Payment Date</th></tr>';

        while ($paymentDetails = $result->fetch_assoc()) {
          echo '<tr>';
        
          echo '<td>' . $paymentDetails['property_id'] . '</td>';
          echo '<td>' . $paymentDetails['property_owner'] . '</td>';
          echo '<td>' . $paymentDetails['payment_amount'] . '</td>';
          echo '<td>' . $paymentDetails['payment_method'] . '</td>';
          echo '<td>' . $paymentDetails['payment_status'] . '</td>';
          echo '<td>' . $paymentDetails['payment_date'] . '</td>';
          echo '</tr>';
        }

        echo '</table>';
      } else {
        echo '<p>No payment records found.</p>';
      }

      // Close the statement
      $stmt->close();

      // Close the database connection
      mysqli_close($con);
    ?>
  </div>
</body>
</html>
