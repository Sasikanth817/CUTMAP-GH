<?php
include 'adconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if(isset($_POST['loginBtn']))
    {

    $adminname =$_POST['username'];
    $password =$_POST['password'];
    $sql = "SELECT * FROM admins WHERE ad_email = '$adminname'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // echo "Login successful! Welcome, " . $username;
        $row = mysqli_fetch_assoc($result);
        $dbpass = $row['ad_pass'];
        $ad_name = $row['ad_name'];
        $adId = $row['ad_id'];
        $ad_email = $row['ad_email'];
        if(password_verify($password,$dbpass))
        {
            setcookie("adminName",$ad_name,0,"/");
            setcookie("adminemail",$ad_email,0,"/");
            setcookie("adminid",$adId,0,"/");
            header("location:adindex.html");
        }else
        echo "<br>Password not match";
    } else {
        echo "Login failed! Invalid adminname or password.";
        mysqli_error($conn);
    }

    // Free result set
    mysqli_free_result($result);
}
if (isset($_POST['registerBtn'])) {
    $ad_name = $_POST['ad_name']; 
    $email = $_POST['email'];
    $password =  $_POST['password'];
    $confirm_password =  $_POST['confirm_pass'];

    // Validate password confirmation
    if ($password != $confirm_password) {
        echo "Error: Passwords do not match.";
        exit();
    }

       // Check if the email already exists in the database
       $check_sql = "SELECT * FROM admins WHERE ad_email = '$email'";
       $check_result = mysqli_query($conn, $check_sql);
       if (mysqli_num_rows($check_result) > 0) {
           echo "Error: Email already registered.";
           exit();
       }
   
    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO admins (ad_name, ad_email, ad_pass, ad_account_created)
            VALUES ('$ad_name', '$email', '$hashed_password', NOW())";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "Registration successful! Please login.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Welcome</title>
    <link rel= 'icon' href= 'data:,'>
    <link rel="stylesheet" href="adlogin.css">
</head>
<body>
<div class="wrapper">
      <div class="title-text">
        <div class="title login">Login Form</div>
        <div class="title signup">Signup Form</div>
      </div>
      <div class="form-container">
        <div class="slide-controls">
          <input type="radio" name="slide" id="login" checked>
          <input type="radio" name="slide" id="signup">
          <label for="login" class="slide login">Login</label>
          <label for="signup" class="slide signup">Signup</label>
          <div class="slider-tab"></div>
        </div>
        <div class="form-inner">
          <form method="post" class="login">
            <div class="field">
              <input type="text" placeholder="Email Address" name="username" required>
            </div>
            <div class="field">
              <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input   type="submit" name="loginBtn" value="Login">
            </div>
            <div class="signup-link">Not a member? <a href="">Signup now</a></div>
          </form>
          <form method="post" class="signup">
            <div class="field">
              <input type="text" placeholder="Full Name" name="ad_name" required>
            </div>
            <div class="field">
              <input type="text" placeholder="Email Address" name="email" required>
            </div>
            <div class="field">
              <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="field">
              <input type="password" placeholder="Confirm password" name="confirm_pass" required>
            </div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit"name="registerBtn" value="Signup">
            </div>
          </form>
        </div>
      </div>
    </div>
   
</body>
<script src="adminlogin.js"></script>
</html>