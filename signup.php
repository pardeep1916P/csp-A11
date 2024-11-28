<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet" type="text/css" />
<style>
/* Global Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
}

.container {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    margin-top:150px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

h1 {
    color: #333;
    text-align: center;
}

/* Form Styles */
.form-group {
    margin-bottom: 15px;
}

.form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
    font-size: 16px;
}

.btn {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    font-size: 18px;
    cursor: pointer;
}

.btn:hover {
    background-color: #0056b3;
}

.text-center {
    text-align: center;
    margin-top: 20px;
    color: #333;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .container {
        width: 90%;
    }
}
@import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500&display=swap');

:root {
  --background-1: #0E1525;
  --background-1-transparent: rgb(14 21 37 / 60%);
  --background-2: #1C2333;
  --background-3: #2B3245;
  --background-4: #3C445C;

  --foreground-1: #f5f9f5;
  --foreground-2: #c2c8cc;

  --accent-1: #0053A6;
  --accent-2: #0079F2;
  --accent-3: #57ABFF;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html {
  height: 100%;
  width: 100%;
}

body {
  background: var(--background-1);
  font-family: 'IBM Plex Sans', sans-serif;
  color: var(--foreground-1);
}

h1 {
  font-size: 48px;
  line-height: 150%;
  font-weight: 500;
}

h2 {
  font-size: 32px;
  line-height: 40px;
  font-weight: 500;
}

h3 {
  font-size: 24px;
  line-height: 32px;
  font-weight: 500;
}

h4 {
  font-size: 20px;
  line-height: 28px;
  color: var(--foreground-2);
  font-weight: 500;
}

p {
  color: var(--foreground-2);
  font-size: 16px;
  line-height: 150%;
}

a {
  color: var(--foreground-1);
  font-weight: medium;
  transition: 120ms ease-out;
  text-decoration: none;
}

a:hover {
  color: var(--accent-3) !important;
}

button {
  font-family: 'IBM Plex Sans', sans-serif;
  padding: 8px 16px;
  font-size: 16px;
  border-radius: 10px;
  background: var(--background-2);
  border: none;
  color: var(--foreground-1);
  cursor: pointer;
  position: relative;
  top: 0;
  transition: box-shadow 120ms ease-out, top 120ms ease-out;
  font-weight: 500;
}

button:hover {
  background: var(--background-3);
  top: -2px;
  box-shadow: 0 8px 16px rgb(2 2 3 / 32%);
}

button:active {
  top: 1px;
  box-shadow: 0 8px 16px rgb(2 2 3 / 16%);
}

button.cta {
  background: var(--accent-1);
}

button.cta:hover {
  background: var(--accent-2);
}

a:focus-visible,
button:focus-visible {
  outline: 2px solid var(--accent-2);
  outline-offset: 2px;
  border-radius: 10px;
}
label{
    color:black;
}
a{
    color:blue;
}
</style>

</head>
<body>
  <div class="container">
    <center>
      <h1 style="color: black;">SignUp</h1>
    </center>
    <?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = $_POST['name'];
      $phno = $_POST['phno'];
     $_SESSION["email"]= $email = $_POST['email'];
      $password = $_POST['password'];
      $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
      $address = $_POST['address'];
      $dob = $_POST['dob'];

      // Validate and process the uploaded image
      if (isset($_FILES['uploadfile']) && $_FILES['uploadfile']['error'] === UPLOAD_ERR_OK) {
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $image = $email . ".jpg"; // Assuming you want to save the image with the email as the filename
        $folder = "./image/" . $image;

        // Check if the file is an image (optional check)
        $imageFileType = strtolower(pathinfo($folder, PATHINFO_EXTENSION));
        $allowedExtensions = array("jpg", "jpeg", "png", "gif");
        if (!in_array($imageFileType, $allowedExtensions)) {
          die("Error: Only JPG, JPEG, PNG, and GIF files are allowed.");
        }

        // Move the uploaded image to the destination folder
        if (!move_uploaded_file($tempname, $folder)) {
          die("Error: Failed to move the uploaded image.");
        }
      } else {
        die("Error: No image uploaded or upload error occurred.");
      }

      // Database connection
      require 'db.php';

      // Hash the password
   //   $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

      // Insert user data into the database, including the image data
      $stmt = $conn->prepare("INSERT INTO users (name, phno, email, password, gender, address, dob, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("ssssssss", $name, $phno, $email, $password, $gender, $address, $dob, $image);
      if ($stmt->execute()) {
        // Redirect to login page after successful registration
        header("Location: signin.php");
        exit;
      } else {
        // Handle the case when the query execution fails
        die("Error: " . $stmt->error);
      }
      $stmt->close();
      $conn->close();
    }
    ?>
    <form action="#" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="name" style="color:black;">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required="">
          </div>
          
          <div class="form-group">
            <label for="phno">Phone number</label>
            <input type="number" class="form-control" id="phno" name="phno" placeholder="Enter your phone number" required="">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required="">
          </div>
          <!-- New fields: gender, address, date of birth -->
          <div class="form-group">
            <label for="gender">Gender</label><br>
            <input type="radio" id="male" name="gender" value="male">
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Female</label>
          </div>
          <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob" required="">
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control" id="address" name="address" placeholder="Enter your address" required=""></textarea>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required="">
          </div>

    
      <div class="form-group">
        <label for="uploadfile" class="button" id="Upload2">Upload Image</label>
        <input type="file" class="form-control-file" id="uploadfile" name="uploadfile" required="">
      </div>
    </div>
      </div>
   <center>   <button type="submit" class="btn btn-primary btn-block">Register</button></center>
    </form>
    <p class="text-center mt-3" style="color:black;">Already have an account? <a href="/signin">Signin</a></p>
  </body>
</html>
