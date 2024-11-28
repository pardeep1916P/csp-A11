<?php
session_start();


require 'db.php'; // Include the database connection file

$message = ''; // Variable to store the error message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $_SESSION["email"]=  $email = $_POST['email'];
    $password = $_POST['password'];
    echo"$email";
    if (!empty($email)) {
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($password == $row['password']) {
                // Password is correct, set the 'reg' field in the session
                $_SESSION['user'] = $row;
                header("Location: home.php");
                exit;
            } else {
                $message = "Incorrect Password";
            }
        } else {
            $message = "User not found";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Sign In</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Custom styles */
    body {
      background: black;
    }
    
    .container {
      max-width: 400px;
      margin: 0 auto;
      margin-top: 100px;
      padding: 20px;
      background-color: #fff;
      border-radius: 4px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    .form-group label {
      font-weight: bold;
    }
    
    .btn-google {
      background-color: #fff;
      color: rgba(0, 0, 0, 0.54);
      border: 1px solid rgba(0, 0, 0, 0.54);
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .btn-google:hover {
      background-color: #f1f3f4;
    }
    
    .btn-google img {
      width: 18px;
      height: 18px;
      margin-right: 10px;
    }
    
    @media (max-width: 576px) {
      /* Adjustments for mobile devices */
      .container {
        margin: 5px;
        padding: 20px;
        height:670px;
      }
      
      .btn-google {
        margin-top: 10px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="text-center">Sign In</h1>
    <?php echo $message; ?>
    <form action="#" method="POST">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
      </div>
      <button type="submit" class="btn btn-primary btn-block">Sign In</button>
      <br>
      <center><a href="https://forget.sarathk4.repl.co/">Forgot password?</a></center>
    </form>
    <p class="text-center mt-3">Don't have an account? <a href="signup.php">Sign Up</a></p>
  </div>
  <script>
  </script>
</body>
</html>
