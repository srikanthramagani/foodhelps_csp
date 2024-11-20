<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food_waste_management";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Hotel Registration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hotel_name = $_POST['hotel_name'];
    $hotel_email = $_POST['hotel_email'];
    $hotel_username = $_POST['hotel_username'];
    $hotel_password = $_POST['hotel_password'];

    // Check for duplicate email or username
    $checkQuery = "SELECT * FROM hotel_reg WHERE hotel_email = ? OR hotel_username = ?";
    $stmtCheck = $conn->prepare($checkQuery);
    $stmtCheck->bind_param("ss", $hotel_email, $hotel_username);
    $stmtCheck->execute();
    $result = $stmtCheck->get_result();
    
    if ($result->num_rows > 0) {
        // Duplicate found, show error message
        echo "<script>
                alert('❌ Email or Username already exists! ❌');
                window.location.href='hotel_registration.php'; // Stay on the registration page
              </script>";
    } else {
        // No duplicates found, proceed with registration
        $stmt = $conn->prepare("INSERT INTO hotel_reg(hotel_name, hotel_email, hotel_username, hotel_password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $hotel_name, $hotel_email, $hotel_username, $hotel_password);
        
        if ($stmt->execute()) {
            // Success, show message and redirect to login page
            echo "<script>
                    alert('🎉 Hotel registration successful! 🎉');
                    window.location.href = 'login.php'; // Redirect after successful registration
                  </script>";
        } else {
            // Insertion error
            echo "<script>
                    alert('❌ Registration failed! Please try again. ❌');
                    window.location.href='hotel_registration.php'; // Stay on registration page
                  </script>";
        }
        $stmt->close();
    }
    $stmtCheck->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Registration</title>
    <style>
        /* Basic styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(45deg, #4caf50, #81c784);
        }

        .registration-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .registration-container h2 {
            color: #4caf50;
            margin-bottom: 20px;
        }

        .registration-container input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            outline: none;
        }

        .registration-container button {
            background-color: #4caf50;
            color: white;
            padding: 14px;
            width: 100%;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
        }

        .registration-container p {
            margin-top: 20px;
            font-size: 1rem;
            color: #333;
        }

        .registration-container a {
            color: #4caf50;
            text-decoration: none;
        }

        .registration-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="registration-container">
    <h2>Hotel Registration</h2>

    <form method="POST" action="hotel_registration.php">
        <label for="hotel_name">Hotel Name:</label>
        <input type="text" id="hotel_name" name="hotel_name" required>

        <label for="hotel_email">Hotel Email:</label>
        <input type="email" id="hotel_email" name="hotel_email" required>

        <label for="hotel_username">Username:</label>
        <input type="text" id="hotel_username" name="hotel_username" required>

        <label for="hotel_password">Password:</label>
        <input type="password" id="hotel_password" name="hotel_password" required>

        <button type="submit">Register</button>
    </form>

    <p>Already have an account? <a href="login.php">Login here</a></p>
</div>

</body>
</html>
