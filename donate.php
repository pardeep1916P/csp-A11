<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Donation Form</title>
    <style>
        /* Center the form */
        body {
            background-image:url("photo.jpg");
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(to right, #ffcc00, #ff6699);
        }

        /* Style the form container */
        .form-container {
            text-align: center;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            background: white;
        }

        /* Style form labels */
        label {
            display: block;
            margin-top: 10px;
            text-align: left;
        }

        /* Style form inputs */
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Style submit button */
        input[type="submit"] {
            background-color: #007bff; /* Blue color */
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2 style="color: #333;">Food Donation Form</h2>

        <?php
        session_start();
       // $email=$_SESSION["email"];
       // echo $email;  
        // Check if the form is submitted
           require "db.php";
           $emailString = '';
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        // Check if any rows were returned
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                $emailString .= $row["email"] . '-';
            }
        } else {
           // echo "<p>No records found</p>";
        }
      //  echo  $emailString;
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $datetime = htmlspecialchars($_POST['datetime']);
        $food_type = htmlspecialchars($_POST['food_type']);
        $quantity = htmlspecialchars($_POST['quantity']);
        $location = htmlspecialchars($_POST['location']);
        $mobile_number = htmlspecialchars($_POST['mobile_number']);
        $email = $_SESSION["email"];
    
        if (filter_var($mobile_number, FILTER_SANITIZE_NUMBER_INT) && !empty($email)) {
            $stmt = $conn->prepare("INSERT INTO food_donations (datetime, food_type, quantity, location, mobile_number, email) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $datetime, $food_type, $quantity, $location, $mobile_number, $email);
            if ($stmt->execute()) {
                header("Location: home.php");
                exit;
            } else {
                echo "<p>Error saving data. Please try again.</p>";
            }
            $stmt->close();
        } else {
            echo "<p>Invalid input detected.</p>";
        }
    }
    $conn->close();
    ?>

        <form action="#" method="post">
            <label for="datetime">Date and Time:</label>
            <input type="datetime-local" id="datetime" name="datetime" required>

            <label for="food_type">Type of Food:</label>
            <input type="text" id="food_type" name="food_type" required>

            <label for="quantity">Quantity:</label>
            <input type="text" id="quantity" name="quantity" required>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" required>

            <label for="mobile_number">Mobile Number:</label>
            <input type="tel" id="mobile_number" name="mobile_number" required>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
