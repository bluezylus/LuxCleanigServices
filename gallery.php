<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lux Cleaning Services</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #76885B;
            color: white;
            padding: 1em 0;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        nav ul li {
            display: inline;
            margin: 0 1em;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
        }

        .center-title {
            text-align: center;
            margin: 2em 0;
        }

        .gallery-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2em 0;
        }

        .gallery {
            display: flex;
            align-items: center;
        }

        .image-container {
            text-align: center;
        }

        .image-container img {
            max-width: 600px;
            width: 100%;
            height: auto;
            max-height: 80vh; /* Ensure images do not exceed 80% of the viewport height */
        }

        .image-title {
            margin-top: 10px;
            font-size: 1.2em;
        }

        .arrow {
            background-color: transparent;
            border: none;
            font-size: 2em;
            cursor: pointer;
            padding: 0 20px;
            color: #76885B;
        }

        .arrow:disabled {
            color: #ccc;
            cursor: not-allowed;
        }
    </style>
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

    <div class="gallery-container">
        <div class="gallery">
            <button class="arrow left-arrow" onclick="previousImage()">&#9664;</button>
            <div class="image-container">
                <img id="gallery-image" src="images/pic7.jpg" alt="Gallery Image 1">
                <div class="image-title" id="image-title">Image Title 1</div>
            </div>
            <button class="arrow right-arrow" onclick="nextImage()">&#9654;</button>
        </div>
    </div>

    <script>
        let currentImageIndex = 0;
        const images = [
            { src: 'pic7.jpg', title: 'Deep Cleaning' },
            { src: 'pic8.jpg', title: 'Window Cleaning' },
            { src: 'pic9.jpg', title: 'Carpet Cleaning' },
            { src: 'pic10.jpg', title: 'Apartment Cleaning' },
            { src: 'pic11.jpg', title: 'Villa Cleaning' },
            { src: 'pic12.jpg', title: 'Commercial Cleaning' }
        ];

        function updateGallery() {
            const imageElement = document.getElementById('gallery-image');
            const titleElement = document.getElementById('image-title');
            imageElement.src = images[currentImageIndex].src;
            titleElement.textContent = images[currentImageIndex].title;

            document.querySelector('.left-arrow').disabled = currentImageIndex === 0;
            document.querySelector('.right-arrow').disabled = currentImageIndex === images.length - 1;
        }

        function nextImage() {
            if (currentImageIndex < images.length - 1) {
                currentImageIndex++;
                updateGallery();
            }
        }

        function previousImage() {
            if (currentImageIndex > 0) {
                currentImageIndex--;
                updateGallery();
            }
        }

        document.addEventListener('DOMContentLoaded', updateGallery);
    </script>
</body>
</html>
