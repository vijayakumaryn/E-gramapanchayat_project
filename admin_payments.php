<!DOCTYPE html>
<html>
<head>
  <title>Admin Payments</title>
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
  <h1>Admin Payments</h1>

  <div class="container">
    <?php
      // Include the database connection file
      require_once 'conn.php';

      // Check if the form is submitted
      if (isset($_POST['update_status'])) {
        $paymentId = $_POST['payment_id'];
        $newStatus = $_POST['status'];

        // Update the payment status in the database
        $stmt = $con->prepare("UPDATE payments SET payment_status = ? WHERE id = ?");
        $stmt->bind_param('si', $newStatus, $paymentId);
        $stmt->execute();

        // Close the statement
        $stmt->close();

        // Close the database connection
        mysqli_close($con);

        // Redirect back to the admin page
        header("Location: admin_payments.php");
        exit();
      }

      // Retrieve payment records from the database
      $stmt = $con->prepare("SELECT * FROM payments");
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows > 0) {
        // Display payment records in a table format
        echo '<table>';
        echo '<tr><th>Payment ID</th><th>Property ID</th><th>Property Owner</th><th>Payment Amount</th><th>Payment Method</th><th>Payment Status</th><th>Payment Date</th><th>Action</th></tr>';

        while ($paymentDetails = $result->fetch_assoc()) {
          echo '<tr>';
          echo '<td>' . $paymentDetails['id'] . '</td>';
          echo '<td>' . $paymentDetails['property_id'] . '</td>';
          echo '<td>' . $paymentDetails['property_owner'] . '</td>';
          echo '<td>' . $paymentDetails['payment_amount'] . '</td>';
          echo '<td>' . $paymentDetails['payment_method'] . '</td>';
          echo '<td>' . $paymentDetails['payment_status'] . '</td>';
          echo '<td>' . $paymentDetails['payment_date'] . '</td>';
          echo '<td>';
          echo '<form action="admin_payments.php" method="post">'; // Modified form action
          echo '<input type="hidden" name="payment_id" value="' . $paymentDetails['id'] . '">';
          echo '<select name="status" required>';
          echo '<option value="Pending">Pending</option>';
          echo '<option value="Paid">Paid</option>';
          echo '<option value="Cancelled">Cancelled</option>';
          echo '</select>';
          echo '<input type="submit" name="update_status" value="Update">';
          echo '</form>';
          echo '</td>';
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
<a class="logout-link" href="adminhome.php">back</a>
  </div>
</body>
</html>
