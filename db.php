<?php
$conn = new mysqli("localhost:3306","root","","if0_35576750_food");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>