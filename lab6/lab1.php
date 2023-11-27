
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lab6_page2</title>
</head>
<style>
    body {
        font-family: Arial;
        margin: 0;
    }

    .cont_top {
        display: flex;
        flex-direction: row;
    }

    .blok1 {
        display: flex;
        flex-direction: column;
        height: 20%;
        background-color: #9d4edd;
        align-items: center;
    }

    .hed {
        align-self: center;
        color: white;
    }

    .ts1 {
        width: 80%;
        height: auto;
        font-size: 16px;
        text-align: right;
        padding: 1%;
        color: white;
    }

    .blokX {
        background-color: white;
        width: 20%;
        height: auto;
        align-self: center;
        margin-left: 3%;
        padding: 10px;
    }

    .content {
        display: flex;
        flex-direction: row;
    }

    .sidebar {
        width: 20%;
        padding: 20px;
        background-color: #ff5d8f;
    }

    .main {
        display: flex;
        width: 80%;
        flex-direction: column;
    }

    .blok4_blok5 {
        display: flex;
        flex-direction: row;
    }

    .blok3 {
        background-color: #9ef01a;
        align-items: center;
    }

    .ts3 {
        padding: 1%;
        font-size: 16px;
        text-align: right;
    }

    .blok4 {
        background-color: white;
        width: 70%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .ts4 {
        font-size: 18px;
        text-align: left;
        padding: 1%;
    }

    .blok5 {
        display: flex;
        background-color: #ff5d8f;
        justify-content: center;
        align-items: center;
        width: 30%;
        padding-left: 1%;
    }

    .image-size {
        width: 60%;
        height: auto;
    }

    .blok6 {
        display: flex;
        flex-direction: row;
        height: 20%;
        background-color: #9d4edd;
        align-items: center;
    }

    .blokY {
        background-color: white;
        width: 20%;
        height: auto;
        align-self: center;
        margin-right: 3%;
        padding: 10px;
    }

    .ts6 {
        width: 80%;
        height: 90%;
        font-size: 16px;
        text-align: left;
        align-items: center;
        padding: 1%;
        color: white;
    }

    @media screen and (max-width: 900px) {
        .content {
            display: flex;
            flex-direction: column;
        }

        .main {
            width: 100%;
        }

        .sidebar {
            width: calc(100%);
            box-sizing: border-box;
        }
    }

    @media screen and (max-width: 500px) {
        .cont_top {
            flex-direction: column;
        }

        .blokX {
            width: 70%;
        }

        .ts1 {
            width: 100%;
            padding: 0;
            margin-right: 4%;
        }

        .blok4_blok5 {
            display: flex;
            flex-direction: column;
        }

        .blok4 {
            width: 100%;
        }

        .ts4 {
            font-size: 16px;
            text-align: left;
            padding: 1%;
        }

        .blok5 {
            width: 100%;
        }

        .blok6 {
            display: flex;
            flex-direction: column;
        }

        .blokY {
            width: 70%;
            margin-bottom: 3%;
        }
    }

    .carousel {
        display: flex;
        overflow: hidden;
        width: 100%;
        margin: auto;
    }

    .carousel-inner {
        display: flex;
        transition: transform 0.5s ease-in-out;
    }

    .carousel-item {
        min-width: 100%;
    }

        .carousel-item img {
            margin: auto;
            width: 100%;
            height: 100%;
        }

    #prevBtn, #nextBtn {
        background-color: #4CAF50;
        color: white;
        border: 1px solid #4CAF50;
        padding: 10px 20px;
        font-size: 20px;
        cursor: pointer;
    }

        #prevBtn:hover, #nextBtn:hover {
            background-color: white;
            color: #4CAF50;
        }
</style>
<body>
    <div class="blok1">
        <h2 class="hed">PAGE 2</h2>
        <div class="cont_top">
            <div class="blokX">
                <h3>Glory to Ukraine!</h3>
            </div>
            <p class="ts1">
                Something very important. Something very important. Something very important. Something very important. Something very important. Something very important. Something very important. Something very important. Something very important.
            </p>
        </div>
    </div>
    <div class="content">
        <div class="sidebar">
            <h2>Menu</h2>
            <ol>
                <li><a href="index.html">Page 1</a></li>
                <li><a href="lab1.php">Page 2</a></li>
            </ol>
        </div>
        <div class="main">
            <div class="blok3">
                <p class="ts3">
                    Something is written. Something is written. Something is written. Something is written. Something is written. Something is written. Something is written. Something is written. Something is written. Something is written. Something is written. Something is written. Something is written. Something is written. Something is written. Something is written. Something is written. Something is written.
                </p>
            </div>
            <div class="blok4_blok5">
                <div class="blok4">
                    <button id="prevBtn" onclick="prevSlide()"><</button>
                    <div class="carousel" id="myCarousel">
                        <div class="carousel-inner">
                           <?php
$file_path = 'saved_photos.txt';
if (file_exists($file_path)) {
    $photo_links = file($file_path, FILE_IGNORE_NEW_LINES);
    foreach ($photo_links as $link) {
    echo '<div class="carousel-item">
          <img src="' . $link . '" alt="Slide">
          </div>';
    }
    } else {
    echo 'Файл не знайдено';
    }
?>
                        </div>
                    </div>
                    <button id="nextBtn" onclick="nextSlide()">></button>
                    <script>
        let currentIndex = 0;
        function showSlide(index) {
            const carouselInner = document.querySelector('.carousel-inner');
            const totalSlides = document.querySelectorAll('.carousel-item').length;
            if (index < 0) {
                index = totalSlides - 1;
            } else if (index >= totalSlides) {
                index = 0;
            }
            const translateValue = -index * 100 + '%';
            carouselInner.style.transform = 'translateX(' + translateValue + ')';
            currentIndex = index;
        }
        function prevSlide() {
            showSlide(currentIndex - 1);
        }
        function nextSlide() {
            showSlide(currentIndex + 1);
        }
                    </script>
                </div>
                <div class="blok5">
                    <p>
                        Lots of some text. Lots of some text. Lots of some text. Lots of some text. Lots of some text. Lots of some text. Lots of some text.
                        Lots of some text. Lots of some text. Lots of some text. Lots of some text. Lots of some text. Lots of some text. Lots of some text.
                        Lots of some text. Lots of some text. Lots of some text. Lots of some text. Lots of some text. Lots of some text. Lots of some text.
                        Lots of some text. Lots of some text. Lots of some text. Lots of some text. Lots of so
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="blok6">
        <p class="ts6">
            Lots of some text. Lots of some text. Lots of some text. Lots of some text. Lots of some text. Lots of some text. Lots of some text.
            Lots of some text. Lots of some text. Lots of some text. Lots of some text. Lots of some text. Lots of some text. Lots of some text.
            Lots of some text. Lots of some text. Lots of some text. Lots of some text. Lots of some text. Lots of some text. Lots of some text.
            Lots of some text. Lots of some text. Lots of some text. Lots of some text. Lots of some text. Lots of some text. Lots of some text.
            Lots of some text. Lots of some text. Lots of some text. Lots of some text. Lots of some text. Lots of some text. Lots of some text.
            Lots of some text. Lots of some text. Lots of some text. Lots of some text. Lots of some text. Lots of some text. Lots of some text.
        </p>
        <div class="blokY">
            <h3>Glory to heroes!</h3>
        </div>
    </div>
</body>
</html>