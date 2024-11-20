<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Food Waste Management</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* General Styling */
       /* General Styling */
body {
    font-family: 'Verdana', sans-serif;
    background-color: #f9f9f9;
    color: #333;
    margin: 0;
    padding: 0;
}

/* Header Section */
header {
    background: linear-gradient(to right, #006400, #32CD32); /* Green gradient */
    color: white;
    padding: 20px 0;
    text-align: center;
}

header h1 {
    font-size: 3rem;
    margin-bottom: 10px;
}

header p {
    font-size: 1.2rem;
    margin-top: 10px;
}

/* Navigation Bar Styling */
nav {
    background: linear-gradient(to right, #000000, #434343); /* Black gradient */
    padding: 10px 0;
    margin: 0;
}

nav ul {
    list-style-type: none;
    text-align: center;
    margin: 0;
    padding: 0;
}

nav ul li {
    display: inline-block;
    margin-right: 20px;
}

nav ul li a {
    color: white;
    font-size: 1.2rem;
    text-decoration: none;
    padding: 12px 20px;
    border-radius: 4px;
    transition: background-color 0.3s;
}

nav ul li a:hover {
    background-color: #45a049;
}

/* Main Content Section */
.main-content {
    padding: 20px;
    text-align: center;
}

.main-content h2 {
    font-size: 2rem;
    margin-bottom: 20px;
}

.main-content p {
    font-size: 1.2rem;
    line-height: 1.8;
    margin-bottom: 20px;
}

/* Food Waste Management Introduction */
.intro {
    padding: 20px;
    background-color: #e2f5e2;
    margin-top: 20px;
    text-align: center;
    font-size: 1.2rem;
    border-radius: 8px;
}

/* Food Waste Management Techniques Section */
.techniques {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    gap: 20px;
    padding: 30px;
    text-align: center;
}

.technique-card {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease, opacity 0.5s ease;
    position: relative;
    overflow: hidden;
}

/* Flash effect on hover */
.technique-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    opacity: 0.9;
}

.technique-card h3 {
    font-size: 1.5rem;
    color: #4CAF50;
    margin-bottom: 10px;
}

.technique-card p {
    font-size: 1rem;
    line-height: 1.6;
    color: #555;
}

/* Technique card images */
.technique-card img {
    width: 100%;
    height: auto;
    border-radius: 8px;
    margin-bottom: 15px;
}

/* Specific technique cards background colors */
.technique-card.composting {
    background-color: #f0f8f0;
}

.technique-card.donation {
    background-color: #eaf6fc;
}

.technique-card.recovery {
    background-color: #fff5e5;
}

.technique-card.reduction {
    background-color: #f9f0ff;
}

/* Video Section */
.video-section {
    text-align: center;
    margin-top: 40px;
    padding: 20px;
}

video {
    width: 100%;
    max-width: 800px;
    border: 2px solid #4CAF50;
    border-radius: 8px;
}

/* Footer Section */
footer {
    text-align: center;
    padding: 20px;
    background-color: #4CAF50;
    color: white;
}

footer p {
    font-size: 1rem;
}
</style>
</head>
<body>

<!-- Header Section -->
<header>
    <div class="header-content">
        <h1>Welcome to Food Waste Management</h1>
        <p>We aim to reduce food waste through sustainable practices and solutions.</p>
    </div>
</header>

<!-- Navigation Bar -->
<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="hotel.php">Hotel</a></li>
        <li><a href="available-food.php">Available Food</a></li>
        <li><a href="food-takers.php">Food Takers</a></li>
        <li><a href="fooddonation.php">Food Donation Info</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</nav>

<!-- Main Content -->
<div class="intro">
    <h2>Welcome back, <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?>!</h2>
    <p>We are glad to have you here. Let's work together to reduce food waste and promote sustainability.</p>
</div>

<!-- Food Waste Management Introduction -->
<div class="intro">
    <h3>What is Food Waste Management?</h3>
    <p>Food waste management involves reducing the amount of food thrown away through strategies such as composting, donation, recovery, and reduction.</p>
</div>

<!-- Food Waste Management Techniques -->
<div class="techniques">
    <div class="technique-card composting">
        <img src="https://www.bing.com/th?id=OIP.oaLM6fuTSUgsCfyIhyDbwwHaE7&w=150&h=100&c=8&rs=1&qlt=90&o=6&dpr=1.3&pid=3.1&rm=2" alt="Composting">
        <h3>Composting</h3>
        <p>Composting is the process of recycling organic waste, such as food scraps, into nutrient-rich compost that can be used to fertilize plants and soil.</p>
    </div>

    <div class="technique-card donation">
        <img src="https://georgetownbreadbasket.ca/wp-content/uploads/2022/08/donate-food-1024x795.jpg" alt="Donation">
        <h3>Donation</h3>
        <p>Excess food that is still safe for consumption can be donated to local shelters, food banks, or other organizations to help those in need.</p>
    </div>

    <div class="technique-card recovery">
        <img src="https://th.bing.com/th/id/OIP.iew4Pl-RKEahVy6fgCWVAAHaE8?w=257&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="Recovery">
        <h3>Recovery</h3>
        <p>Food recovery refers to the process of retrieving surplus food from restaurants, food producers, or supermarkets and redistributing it to reduce food waste.</p>
    </div>

    <div class="technique-card reduction">
        <img src="https://th.bing.com/th/id/OIP.vLlbwxa0U8JhuRh8t9J5PgHaG5?w=186&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="Reduction">
        <h3>Reduction</h3>
        <p>Reducing food waste through conscious buying, cooking smaller portions, and managing food storage helps to prevent waste from occurring in the first place.</p>
    </div>
</div>



    
    <div class="video-section">
    <h3 style="color: white;">Learn More About Food Waste Management</h3>


    <!-- Centered YouTube Video -->
    <div style="display: flex; justify-content: center; align-items: center; margin-top: 20px;">
        <iframe width="678" height="391" src="https://www.youtube.com/embed/we58BImYLVc" 
                title="Why does food waste matter?" frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
</div>


<!-- Footer -->
<footer>
    <p>&copy; 2024 Food Waste Management. All rights reserved.</p>
</footer>

</body>
</html>
