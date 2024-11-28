<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Donation Data</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 20px;
            background-color: #f0f0f0;
            color: #333;
        }

        h2 {
            text-align: center;
            color: #007BFF;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .record {
            border: 2px solid #007BFF;
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 10px;
            background-color: #E6F2FF;
        }

        .record p {
            margin: 0;
            color: #333;
        }

        .record hr {
            margin: 10px 0;
            border: 0;
            border-top: 1px solid #007BFF;
        }

        .button-link {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button-link:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Food Donation Data</h2>
        
        <?php
session_start();

if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit;
}

$email = $_SESSION["email"];
require "db.php";

$limit = 4; // Records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$stmt = $conn->prepare("SELECT * FROM food_donations WHERE email = ? LIMIT ? OFFSET ?");
$stmt->bind_param("sii", $email, $limit, $offset);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Donation Data</title>
    <style>
        /* CSS from the provided code */
    </style>
</head>
<body>
    <div class="container">
        
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="record">';
                echo '<p><strong>Datetime:</strong> ' . htmlspecialchars($row["datetime"]) . '</p>';
                echo '<p><strong>Food Type:</strong> ' . htmlspecialchars($row["food_type"]) . '</p>';
                echo '<p><strong>Quantity:</strong> ' . htmlspecialchars($row["quantity"]) . '</p>';
                echo '<p><strong>Location:</strong> ' . htmlspecialchars($row["location"]) . '</p>';
                echo '<p><strong>Mobile Number:</strong> ' . htmlspecialchars($row["mobile_number"]) . '</p>';
                echo '</div>';
            }
        } else {
            echo "<p>No records found</p>";
        }

        $stmt->close();

        $totalRecordsQuery = "SELECT COUNT(*) AS total FROM food_donations WHERE email = '$email'";
        $totalRecordsResult = $conn->query($totalRecordsQuery);
        $totalRecords = $totalRecordsResult->fetch_assoc()["total"];
        $totalPages = ceil($totalRecords / $limit);

        echo '<div class="pagination">';
        for ($i = 1; $i <= $totalPages; $i++) {
            echo '<a class="button-link" href="?page=' . $i . '">' . $i . '</a> ';
        }
        echo '</div>';

        $conn->close();
        ?>
    </div>
</body>
</html>
