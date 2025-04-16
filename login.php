<?php
require('conn.php');
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Perform your authentication logic here
    // ...

    $username = stripslashes($username);
    $username = mysqli_real_escape_string($con,$username);
    $password = stripslashes($password);
    $password = mysqli_real_escape_string($con,$password);
    $query = "SELECT * FROM user_table WHERE uname='$username' OR mobile='$username'
AND passwd='$password'";
    $result = mysqli_query($con,$query);
    $d = mysqli_fetch_array($result);
    if(!$d)
    {
        header("Location:  login.html");
        exit();
    }
    elseif($d['uname']==$username || $d['mobile'] ==$username && $d['passwd']==$password)
    {
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();
    }
}
?>
