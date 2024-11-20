<?php
include 'db_connect.php';

$submission_successful = false; // Flag to track submission status

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hotel_name = $_POST['hotelName'];
    $amount = $_POST['amount'];
    $contact_number = $_POST['contact'];
    $location = $_POST['location'];
    $food_item = $_POST['foodItem'];
    $submitted_at = date('Y-m-d H:i:s');

    $stmt = $conn->prepare("INSERT INTO hotels (hotel_name, amount, contact_number, location, food_item, submitted_at) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sdssss", $hotel_name, $amount, $contact_number, $location, $food_item, $submitted_at);

    // Execute and check if successful
    if ($stmt->execute()) {
        $submission_successful = true; // Set the flag to true if submission is successful
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submit Hotel Information</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        // JavaScript function to show success message
        function showAlert() {
            alert("🎉 Success! Your food item has been posted successfully! 🍲");
        }
    </script>
</head>
<body>
    <style>.back-button {
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
        }</style>
  

    <?php
    // If submission is successful, trigger the alert message using JavaScript
    if ($submission_successful) {
        echo "<script>showAlert();</script>";
    }
    ?>

    <section id="submit-info">
        <h2 align="center">Submit Hotel Information</h2>
        <form method="POST" action="">
            <label for="hotelName">Hotel Name:</label>
            <input type="text" id="hotelName" name="hotelName" required>

            <label for="amount">Amount of Food Leftover (in plates):</label>
            <input type="number" id="amount" name="amount" required>

            <label for="foodItem">Food Item:</label>
            <select id="foodItem" name="foodItem" required>
                <option value="" disabled selected>Select Food Item</option>
                <option value="Biryani">Biryani</option>
                <option value="Pulihora">Pulihora</option>
                <option value="Dosa">Dosa</option>
               

    <option value="Chicken Biryani">Chicken Biryani</option>
    <option value="Mutton Biryani">Mutton Biryani</option>
    <option value="Paneer Butter Masala">Paneer Butter Masala</option>
    <option value="Gutti Vankaya Curry">Gutti Vankaya Curry</option>
    <option value="Pesarattu">Pesarattu</option>
    <option value="Pulihora (Tamarind Rice)">Pulihora (Tamarind Rice)</option>
    <option value="Sambar">Sambar</option>
    <option value="Rasam">Rasam</option>
    <option value="Gongura Pachadi">Gongura Pachadi</option>
    <option value="Andhra Fish Curry">Andhra Fish Curry</option>
    <option value="Chicken Fry">Chicken Fry</option>
    <option value="Kadai Paneer">Kadai Paneer</option>
    <option value="Masala Dosa">Masala Dosa</option>
    <option value="Idli">Idli</option>
    <option value="Vada">Vada</option>
    <option value="Aloo Gobi">Aloo Gobi</option>
    <option value="Veg Biryani">Veg Biryani</option>
    <option value="Dal Tadka">Dal Tadka</option>
    <option value="Egg Curry">Egg Curry</option>
    <option value="Prawn Fry">Prawn Fry</option>
    <option value="Natu Kodi Pulusu (Country Chicken Curry)">Natu Kodi Pulusu</option>
    <option value="Chepala Pulusu (Fish Stew)">Chepala Pulusu</option>
    <option value="Chapati">Chapati</option>
    <option value="Poori">Poori</option>
    <option value="Upma">Upma</option>
    <option value="Bagara Baingan">Bagara Baingan</option>
    <option value="Mirchi Bajji">Mirchi Bajji</option>
    <option value="Dondakaya Fry (Ivy Gourd Fry)">Dondakaya Fry</option>
    <option value="Chole Bhature">Chole Bhature</option>
    <option value="Mysore Pak">Mysore Pak</option>
    <option value="Ariselu">Ariselu</option>
    <option value="Ghee Pongal">Ghee Pongal</option>
    <option value="Cabbage Fry">Cabbage Fry</option>
    <option value="Pappu (Lentil Curry)">Pappu</option>
    <option value="Tomato Pappu">Tomato Pappu</option>
    <option value="Bhindi Fry (Okra Fry)">Bhindi Fry</option>
    <option value="Potato Fry">Potato Fry</option>
    <option value="Kheema Curry (Minced Meat Curry)">Kheema Curry</option>
    <option value="Gobi 65">Gobi 65</option>
    <option value="Rava Dosa">Rava Dosa</option>
    <option value="Curd Rice">Curd Rice</option>
    <option value="Majjiga Pulusu (Buttermilk Stew)">Majjiga Pulusu</option>
    <option value="Shahi Paneer">Shahi Paneer</option>
    <option value="Lemon Rice">Lemon Rice</option>
    <option value="Kaju Paneer">Kaju Paneer</option>
    <option value="Dal Makhani">Dal Makhani</option>
    <option value="Tomato Bath">Tomato Bath</option>
    <option value="Gongura Mutton">Gongura Mutton</option>
    <option value="Paneer Tikka">Paneer Tikka</option>
    <option value="Chicken 65">Chicken 65</option>
    <option value="Paneer 65">Paneer 65</option>
    <option value="Puri Masala">Puri Masala</option>
    <option value="Aloo Bajji">Aloo Bajji</option>
    <option value="Bonda Soup">Bonda Soup</option>
    <option value="Pulusu (Tamarind Stew)">Pulusu</option>
    <option value="Masala Vada">Masala Vada</option>
    <option value="Sweet Pongal">Sweet Pongal</option>
    <option value="Bhakshalu / Bobbatlu">Bhakshalu / Bobbatlu</option>
    <option value="Chakara Pongal (Sweet Pongal)">Chakara Pongal</option>
    <option value="Madatha Kaja">Madatha Kaja</option>
    <option value="Sunnundalu">Sunnundalu</option>
    <option value="Poornalu">Poornalu</option>
    <option value="Boondi Laddu">Boondi Laddu</option>
    <option value="Pulihora">Pulihora</option>
    <option value="Chintakaya Pachadi (Tamarind Chutney)">Chintakaya Pachadi</option>
    <option value="Chilli Chicken">Chilli Chicken</option>
    <option value="Paneer Butter Masala">Paneer Butter Masala</option>
    <option value="Palak Paneer">Palak Paneer</option>
    <option value="Rajma">Rajma</option>
    <option value="Kadala Curry">Kadala Curry</option>
    <option value="Malai Kofta">Malai Kofta</option>
    <option value="Chicken Curry">Chicken Curry</option>
    <option value="Butter Chicken">Butter Chicken</option>
    <option value="Vegetable Kurma">Vegetable Kurma</option>
    <option value="Aloo Kurma">Aloo Kurma</option>
    <option value="Bhindi Masala">Bhindi Masala</option>
    <option value="Methi Chicken">Methi Chicken</option>
    <option value="Onion Pakoda">Onion Pakoda</option>
    <option value="Chicken Pakoda">Chicken Pakoda</option>
    <option value="Jeera Rice">Jeera Rice</option>
    <option value="Bagara Rice">Bagara Rice</option>
    <option value="Pudina Rice">Pudina Rice</option>
    <option value="Capsicum Rice">Capsicum Rice</option>
    <option value="Carrot Halwa">Carrot Halwa</option>
    <option value="Gulab Jamun">Gulab Jamun</option>
    <option value="Kesar Kheer">Kesar Kheer</option>
    <option value="Double Ka Meetha">Double Ka Meetha</option>
    <option value="Ravva Kesari">Ravva Kesari</option>
    <option value="Annam Payasam">Annam Payasam</option>
    <option value="Fruit Salad with Custard">Fruit Salad with Custard</option>
    <option value="Falooda">Falooda</option>
    <option value="Badam Milk">Badam Milk</option>
    <option value="Milk Mysore Pak">Milk Mysore Pak</option>
</select>

                <!-- Add more items as needed -->
            </select>

            <label for="contact">Contact Number:</label>
            <input type="text" id="contact" name="contact" required>

            <label for="location">Location (address):</label>
            <input type="text" id="location" name="location" required>

            <button type="submit">Post</button>
        </form>
        <a href="index.php" class="back-button">Back to Home</a>
        
    </section>
</body>
</html>
