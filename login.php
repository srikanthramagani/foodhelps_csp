<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food_waste_management";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password']) && !isset($_POST['hotel-name'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? AND password = ?");
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $_SESSION['loggedin'] = true;
            header("Location: index.php"); 
            exit;
        } else {
            echo "<script>alert('❌ Incorrect user credentials.');</script>";
        }
        $stmt->close();
    } elseif (isset($_POST['hotel_name']) && isset($_POST['hotel_password'])) {
        $hotelUsername = $_POST['hotel_name'];
        $hotelPassword = $_POST['hotel_password'];
        
        $stmt = $conn->prepare("SELECT id FROM hotel_reg WHERE hotel_name = ? AND hotel_password = ?");
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("ss", $hotelUsername, $hotelPassword);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $_SESSION['hotel_loggedin'] = true;
            header("Location: index.php"); 
            exit;
        } else {
           
            echo "<script>alert('❌ Incorrect hotel credentials.');</script>";
        }
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Food Waste Management</title>
    <style>
       
        body {
            font-family: 'Verdana', sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background: linear-gradient(to right, #006400, #32CD32);
            padding: 20px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-content h1 {
            font-size: 2rem;
            font-weight: bold;
            margin: 0;
        }

        /* Buttons */
        .login-buttons {
            display: flex;
            gap: 15px;
        }

        .login-btn {
            padding: 10px 25px;
            background-color: #ffffff;
            color: #006400;
            font-weight: bold;
            border: 2px solid #006400;
            border-radius: 8px;
            font-size: 18px;
            transition: all 0.3s ease;
            text-decoration: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .login-btn:hover {
            background-color: #006400;
            color: #ffffff;
            transform: scale(1.05);
        }

      
        .about-section {
            padding: 40px;
            background-color: #ffffff;
            margin: 20px auto;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            text-align: center;
        }

        .about-section h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .about-section p {
            font-size: 1.2rem;
            line-height: 1.6;
        }

        .login-section {
            padding: 30px;
            background-color: #ffffff;
            margin: 20px auto;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            display: none; 
            text-align: center;
        }

        .login-section form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .login-section label {
            font-weight: bold;
            margin-top: 10px;
        }

        .login-section input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .login-section button {
            background-color: #32CD32;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-weight: bold;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .login-section button:hover {
            background-color: #006400;
        }

        .login-section p {
            margin-top: 15px;
        }

        .login-section a {
            color: #006400;
            text-decoration: none;
        }
        
        .login-section a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<header>
    <div class="header-content">
        <h1 align="center">Welcome to Food Waste Management</h1>
    </div>
    <div class="login-buttons">
        <a href="javascript:void(0)" class="login-btn" onclick="showLoginForm('user')">User Login</a>
        <a href="javascript:void(0)" class="login-btn" onclick="showLoginForm('hotel')">Hotel Login</a>
    </div>
</header>

<section id="about" class="about-section">
    <h2>About Food Waste Management</h2>
    <p>
Food waste management plays a crucial role in addressing global food insecurity, reducing environmental impact, and conserving valuable resources. 
</p>

</section>

<section id="user-login-form" class="login-section">
    <h2>User Login</h2>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="user_registration.php">Register here</a></p>
</section>

<section id="hotel-login-form" class="login-section">
    <h2>Hotel Login</h2>
    <form method="POST" action="">
        <label for="hotel_name">Hotel Name:</label>
        <input type="text" id="hotel_name" name="hotel_name" required>
        <label for="hotel_email">Email:</label>
        <input type="email" id="hotel_email" name="hotel_email" required>
        <label for="hotel_password">Password:</label>
        <input type="password" id="hotel_password" name="hotel_password" required>
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="hotel_registration.php">Register here</a></p>
</section>

<script>
    function showLoginForm(type) {
        document.getElementById('user-login-form').style.display = 'none';
        document.getElementById('hotel-login-form').style.display = 'none';

        if (type === 'user') {
            document.getElementById('user-login-form').style.display = 'block';
        } else if (type === 'hotel') {
            document.getElementById('hotel-login-form').style.display = 'block';
        }
    }
</script>

</body>
</html>
