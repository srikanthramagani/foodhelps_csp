<?php
include 'db_connect.php';
$showForm = true;
$foodTakerDetails = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['foodTakerName'];
    $contact = $_POST['contactTaker'];
    $location = $_POST['locationTaker'];
    $hotel_name = $_POST['hotelName'];  
    $submitted_at = date('Y-m-d H:i:s');

   
    $stmt = $conn->prepare("INSERT INTO food_takers (name, contact_number, location, hotel_name, submitted_at) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $contact, $location, $hotel_name, $submitted_at);
    $stmt->execute();
    $stmt->close();

    
    $showForm = false;
}

$result = $conn->query("SELECT * FROM food_takers");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Food Takers</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        function showDetails() {
            alert("🥳 Thank you! Food Taker info has been submitted successfully! 📩");
        }
    </script>
</head>
<body>
    <style>
        .back-button {
            display: block;
            width: 120px;
            margin: 20px auto;
            padding: 10px;
            background-color: greenyellow;
            color: white;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
        }

        .back-button:hover {
            background-color: greenyellow;
        }

        .food-taker-details {
            display: block;
            margin-top: 20px;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
            text-align: left;
        }

        th, td {
            padding: 12px;
        }

        th {
            background-color:greenyellow;
            color: white;
        }

        td {
            background-color: #f2f2f2;
        }

    </style>

    <section id="food-takers">
        <h2 align="center">Food Takers Information</h2>

        <?php if ($showForm): ?>
        <form method="POST" action="">
            <label for="foodTakerName">Charity/Person Name:</label>
            <input type="text" id="foodTakerName" name="foodTakerName" required>
            
            <label for="contactTaker">Contact Number:</label>
            <input type="text" id="contactTaker" name="contactTaker" required>
            
            <label for="locationTaker">Location:</label>
            <input type="text" id="locationTaker" name="locationTaker" required>
            
            <label for="hotelName">Hotel Name (Food Taken From):</label>
            <input type="text" id="hotelName" name="hotelName" required>
            
            <button type="submit" onclick="showDetails()">Submit</button>
        </form>
        <?php else: ?>
        <div class="food-taker-details">
            <h3>All Food Taker Details</h3>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Location</th>
                    <th>Hotel Name</th>
                    <th>Submitted At</th>
                </tr>
                <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['name']}</td>
                                    <td>{$row['contact_number']}</td>
                                    <td>{$row['location']}</td>
                                    <td>{$row['hotel_name']}</td>
                                    <td>{$row['submitted_at']}</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No food takers found.</td></tr>";
                    }
                ?>
            </table>
        </div>
        <?php endif; ?>

        <a href="index.php" class="back-button">Back to Home</a>
    </section>
</body>
</html>
