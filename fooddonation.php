<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Donation Information</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        /* Header Gradient */
        header {
            background: linear-gradient(135deg, #4CAF50, #2D6A4F);
            padding: 20px 0;
            color: white;
            text-align: center;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding-top: 20px;
        }

        .heading {
            margin-bottom: 40px;
        }

        .donation-info {
            background-color: #fff;
            padding: 30px;
            margin-bottom: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .donation-info h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        .donation-info p {
            font-size: 18px;
            line-height: 1.6;
        }

        .donation-info img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-top: 20px;
        }

        /* Video Containers */
        .embed-section {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 40px;
        }

        .embed-container {
            width: 48%;  /* Makes each video container take 48% of the width */
            margin-bottom: 20px;
            display: flex;
            justify-content: center; /* Centers the iframe horizontally */
        }

        .embed-container iframe {
            width: 100%;
            height: 300px;
            border: none;
            border-radius: 8px;
        }
      
    .back-button {
        display: block;
        width: 150px;
        margin: 20px auto;
        padding: 10px;
        background-color: #007BFF;
        color: white;
        text-align: center;
        border-radius: 5px;
        text-decoration: none;
        font-size: 16px;
        transition: background-color 0.3s, opacity 0.3s; /* Smooth transition */
    }

    .back-button:hover {
        background-color: rgba(34, 193, 195, 0.7); /* Foggy green color */
        opacity: 0.9; /* Slight opacity change on hover */
    }



        .embed-section h3 {
            width: 100%;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Button Styles */
        .back-button {
            display: block;
            width: 150px;
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

    <!-- Header Section with Gradient -->
    <header>
        <h1>Food Donation Information</h1>
    </header>

    <div class="container">
        <!-- Donation Information Section -->
        <div class="donation-info">
            <h3>Total Food Donations</h3>
            <p>Food donations have a massive impact on reducing food waste and helping those in need. Here are some key facts about food donations:</p>
            <ul>
                <li><strong>Over 40% of food in the U.S.</strong> is wasted, while millions of people are hungry.</li>
                <li><strong>Donating food</strong> helps reduce landfill waste and ensures that edible food reaches those in need.</li>
                <li>Organizations like Feeding America and local food banks play a crucial role in distributing donated food to communities.</li>
            </ul>
            <img src="https://th.bing.com/th/id/OIP.mKmucOFgK7q0u58JCwlsfwHaDk?w=339&h=168&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="Food Donation Image">
            <p><strong>Donations Include:</strong> Fresh fruits, vegetables, packaged goods, and prepared meals. Every bit helps feed people and reduce waste!</p>
        </div>

        <!-- First Video Container (4 Videos) -->
        <div class="embed-section">
            <h3>Watch These Videos to Learn More About Food Donations</h3>

            <!-- Video 1 -->
            <div class="embed-container">
                <iframe src="https://www.youtube.com/embed/i2dkZD4Kh5g" title="EN - Food donation is the best destination for the people, for the planet" allowfullscreen></iframe>
            </div>
            <!-- Video 2 -->
            <div class="embed-container">
                <iframe src="https://www.youtube.com/embed/idtvY5lN314" title="We're Giving Away $30 Million in Free Food" allowfullscreen></iframe>
            </div>
            <!-- Video 3 -->
            <div class="embed-container">
                <iframe src="https://www.youtube.com/embed/3wO3Zt5oFT8" title="Nourishing Hope - The Story of a Food Bank" allowfullscreen></iframe>
            </div>
            <!-- Video 4 -->
            <div class="embed-container">
                <iframe src="https://www.youtube.com/embed/i_tSmzUj_NE" title="Starbucks FoodShare food donation program supports hunger relief in communities" allowfullscreen></iframe>
            </div>
        </div>

        <!-- Second Video Container (4 Videos) -->
        <div class="embed-section">
            <!-- Video 5 -->
            <div class="embed-container">
                <iframe src="https://www.youtube.com/embed/dpXqqn6Nf9E" title="Tips on the best way to donate to the Food Bank" allowfullscreen></iframe>
            </div>
            <!-- Video 6 -->
            <div class="embed-container">
                <iframe src="https://www.youtube.com/embed/HyYu4QJHlnM" title="How to Donate to Food Banks (Like a Boss!)" allowfullscreen></iframe>
            </div>
            <!-- Video 7 -->
            <div class="embed-container">
                <iframe src="https://www.youtube.com/embed/_T1IxcCMsag" title="How to get free food from a food pantry (and how to donate) Pt. 2 #shorts" allowfullscreen></iframe>
            </div>
            <!-- Video 8 -->
            <div class="embed-container">
                <iframe src="https://www.youtube.com/embed/yJstN77IGjg" title="i only ate free food at Google for 24 hours *best day ever!!*" allowfullscreen></iframe>
            </div>
        </div>

        <!-- Back to Home Button -->
        <a href="index.php" class="back-button">Back to Home</a>
    </div>

</body>
</html>
