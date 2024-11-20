<?php
include 'db_connect.php';

// Check for successful connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Query to get available food from hotels table
$sql = "SELECT hotel_name, food_item, amount, location, submitted_at FROM hotels 
        WHERE hotel_name IS NOT NULL AND food_item IS NOT NULL 
        AND amount IS NOT NULL AND location IS NOT NULL 
        AND submitted_at IS NOT NULL 
        ORDER BY submitted_at DESC";
$result = $conn->query($sql);

// Check if the query executed successfully
if ($result === false) {
    echo "Error with the query: " . $conn->error;
    exit;
}

// Get current local time
date_default_timezone_set('Asia/Kolkata'); // Set timezone to local timezone
$local_time = date("Y-m-d H:i:s"); // Format the time
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Available Food</title>
    <style>
        /* Basic styling for the page */
        body {
            font-family: Arial, sans-serif;
            background-color: #add8e6; /* Light blue background */
            margin: 0;
            padding: 0;
        }
        #available-food {
            width: 80%;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .hotel-info {
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 15px;
            background-color: #f9f9f9;
            transition: box-shadow 0.3s;
        }
        .hotel-info:hover {
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .hotel-info p {
            margin: 8px 0;
            color: #333;
        }
        .hotel-info a {
            color: #007BFF;
            text-decoration: none;
        }
        .hotel-info a:hover {
            text-decoration: underline;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        #local-time {
            text-align: center;
            font-size: 16px;
            color: #888;
            margin-bottom: 20px;
        }

        /* Fix for displaying content */
        .hotel-info {
            display: block;
        }

        /* Additional styling */
        header {
            background-color: #4CAF50;
            padding: 20px;
            text-align: center;
            color: white;
        }

        h1 {
            font-size: 2rem;
        }

        /* Back Button Styling */
        .back-button {
            display: block;
            width: 120px;
            margin: 20px auto;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
        }

        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <header>
        <h1>Available Food In Hotels</h1>
    </header>

    <section id="available-food">
        <h2>Food Details</h2>


        

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='hotel-info'>";
                echo "<p><strong>Hotel:</strong> " . htmlspecialchars($row['hotel_name']) . "</p>";
                echo "<p><strong>Food Item:</strong> " . htmlspecialchars($row['food_item']) . "</p>";
                echo "<p><strong>Amount:</strong> " . htmlspecialchars($row['amount']) . " plates</p>";

                if (!empty($row['location'])) {
                    $location = urlencode($row['location']);
                    $google_maps_link = "https://www.google.com/maps/search/?api=1&query=$location";
                    echo "<p><strong>Location:</strong> <a href='$google_maps_link' target='_blank'>" . htmlspecialchars($row['location']) . "</a></p>";
                } else {
                    echo "<p><strong>Location:</strong> Not available</p>";
                }

                echo "<p><strong>Posted on:</strong> " . htmlspecialchars($row['submitted_at']) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No available food data found.</p>";
        }

        $conn->close();
        ?>
        
        <!-- Back Button -->
        <a href="index.php" class="back-button">Back to Home</a>
    </section>
</body>
</html>
