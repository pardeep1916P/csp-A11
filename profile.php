<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
    a{
        color: #fff;
        text-decoration:none;
    }
    button{
        background:red;
        padding:10px 20px;
        border:none;
        color:#fff;
    }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .profile-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 20px;
        }
        .profile-image {
            
            max-width: 50%;
            height: 50%;
            border-radius: 10%;
        }
        p {
            margin-bottom: 10px;
        }

        @media only screen and (max-width: 600px) {
            .profile-container {
                max-width: 100%;
                padding: 10px;
            }
        }
    </style>
</head>
<body>

<?php
session_start();

// Database connection
require 'db.php';
$email = $_SESSION["email"];
// Select data from the users table
$sql = "SELECT id, name, phno, email, gender, dob, address, image FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>User Profile</title>
           
        </head>
        <body>
        <center>
        <div class="profile-container">
            <h2>User Profile</h2>
            <img class="profile-image" src="./image/<?php echo $row["image"]; ?>" alt="Profile Image">
            <p><strong>Name:</strong> <?php echo $row["name"]; ?></p>
            <p><strong>Phone Number:</strong> <?php echo $row["phno"]; ?></p>
            <p><strong>Email:</strong> <?php echo $row["email"]; ?></p>
            <p><strong>Gender:</strong> <?php echo $row["gender"]; ?></p>
            <p><strong>Date of Birth:</strong> <?php echo $row["dob"]; ?></p>
            <p><strong>Address:</strong> <?php echo $row["address"]; ?></p>
            <a href="logout.php"> <button>Logout</button></a>
        </div></center>
        </body>
        </html>
        <?php
    }
} else {
    echo "0 results";
}

// Close the database connection
$conn->close();
?>


</body>
</html>
