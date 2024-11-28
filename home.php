<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Donation</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        .image-container {
            display: flex;
            justify-content: space-between;
            padding-left: 300px;
            padding-right: 300px;
            padding-top: 150px;
        }

        .image-container img {
            max-width: 90%; /* Adjust as needed */
            height: auto;
        }

        .image-text {
            text-align: center;
            margin-top: 10px;
            color: #333;
        }

        .image-text {
            color: red;
            font-size: 20px;
        }

        @media (max-width: 768px) {
            .image-container {
                flex-direction: column;
                align-items: center;
                padding: 20px;
                padding-left:50px;
            }

            .image-container div {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>

    <div class="image-container">
        <div>
            <a href="donate.php"><img src="donate.avif" alt="Image 1"> </a>
            <p class="image-text">Donate Food</p>
        </div>
        <div>
            <a href="require.php"><img src="require.avif" alt="Image 2"></a>
            <p class="image-text">Require Food</p>
        </div>
        <div>
            <a href="profile.php"><img src="pro.avif" alt="Image 3"></a>
            <p class="image-text">Profile</p>
        </div>
    </div>

</body>
</html>
