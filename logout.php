<?php
session_start();
session_unset();  // Unset session variables
session_destroy();  // Destroy the session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Visiting</title>
    <style>
        /* Ensure the video is full-screen and covers the entire page */
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        /* Full-screen background video */
        .video-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        /* Center the "Thank you" message */
        .thank-you-message {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 2rem;
            font-family: Arial, sans-serif;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
            text-align: center;
        }

        /* Optional: Add some additional styling for the message */
        .thank-you-message h1 {
            margin: 0;
            padding: 0;
        }

        .thank-you-message p {
            font-size: 1.2rem;
        }
    </style>
</head>
<body>

    <!-- Full-screen background video -->
    <video autoplay muted loop class="video-background">
        <source src="https://media.istockphoto.com/id/952366926/video/green-grass-with-sunlight.mp4?s=mp4-640x640-is&k=20&c=AFRCDd6nO1Pf3beB9cpzGrlHxHCsXMyaTA7lpS4mhH0=" type="video/mp4">
        <!-- You can add other formats like WebM if needed -->
        Your browser does not support the video tag.
    </video>

    <!-- Thank you message -->
    <div class="thank-you-message">
        <h1>Thank you for visiting!</h1>
        <p>We hope to see you again soon.</p>
    </div>

    <!-- Redirect after a few seconds -->
    <script>
        // Redirect to login page after 5 seconds
        setTimeout(function() {
            window.location.href = "login.php"; // Redirect to login page
        }, 5000); // 5000 milliseconds = 5 seconds
    </script>

</body>
</html>
