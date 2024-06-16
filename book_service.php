<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cleaning_service";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $service = trim($_POST['service']);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO bookings (name, email, phone, service) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phone, $service);

    if ($stmt->execute()) {
        echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Lux Cleaning Services - Booking Confirmation</title>
                <link rel="stylesheet" href="book.css">
            </head>
            <body>
                <header>
                    <nav>
                        <ul>
                            <li><a href="index.html">HOME</a></li>
                            <li><a href="information.html">INFORMATION</a></li>
                            <li><a href="gallery.html">GALLERY</a></li>
                            <li><a href="about.html">ABOUT US</a></li>
                            <li><a href="book.html">BOOK NOW</a></li>
                        </ul>
                    </nav>
                    <h1 class="center-title">LUX CLEANING SERVICES</h1>
                </header>
                <div class="confirmation-container">
                    <div class="confirmation-box">
                        <div class="confirmation-message">BOOKING RECORDED SUCCESSFULLY!</div>
                        <div>THANK YOU FOR CHOOSING US!</div>
                        <div class="receipt">
                            <div class="receipt-item"><strong>Name:</strong> '.$name.'</div>
                            <div class="receipt-item"><strong>Email:</strong> '.$email.'</div>
                        </div>
                        <div class="receipt">
                            <div class="receipt-item"><strong>Phone Number:</strong> '.$phone.'</div>
                            <div class="receipt-item"><strong>Service:</strong> '.$service.'</div>
                        </div>
                        <a href="book.html" class="book-again-button">BOOK AGAIN</a>
                    </div>
                </div>
            </body>
            </html>
        ';
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
