<?php 
    session_start();
    date_default_timezone_set('Asia/Bangkok');
    require("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="cssAll/Home_style.css">
    <link rel="stylesheet" href="cssAll/Style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <?php require("alert.php"); ?>
    <?php require("navbar.php"); ?>
    <?php require("contact.php"); ?>

    <div class="slideshow-container">
        <div class="gradiant">
            <div class="HeadBanner">
                <h1>ZEDERE แบรนด์ฟอริเจอร์ระดับ World Class</h1>
                <h3>ผลิตโดยฝีมือช่างไทย ที่ช่วยยกระดับการพักผ่อนของคุณถึงขีดสุด</h3>
            </div>
        </div>
        <div class=" mySlides slideFromRight">
            <img src="PicZedere\7a3343ff8b2e81ef48192863065f08e5.jpg" style="width:100%">
        </div>
        <div class=" mySlides slideFromRight">
            <img src="PicZedere\2dd01926842f06fc498e6fd5b2e9ff72.jpg" style="width:100%">
        </div>
        <div class=" mySlides slideFromRight">
            <img src="PicZedere\23a094422a35ce56f37b0dc19e9df97c.jpg" style="width:100%">
        </div>
        <div class=" mySlides slideFromRight">
            <img src="PicZedere\296cedf3bd1507cb2ac700e4a6ba998d.jpg" style="width:100%">
        </div>
        <div class=" mySlides slideFromRight">
            <img src="PicZedere\d0fdcb88dd3e177a18facffa7336a356.jpg" style="width:100%">
        </div>
        <div class=" mySlides slideFromRight">
            <img src="PicZedere\d4ff3ef48d31fd03bbf88dfad1862d79.jpg" style="width:100%">
        </div>
        <div class=" mySlides slideFromRight">
            <img src="PicZedere\eb68d883cee368f7264830c556c7f5ee.jpg" style="width:100%">
        </div>
        <div class=" mySlides slideFromRight">
            <img src="PicZedere\f5a72255b7a2a5f413a96b4f1f7624f8.jpg" style="width:100%">
        </div>
        <div class=" mySlides slideFromRight">
            <img src="PicZedere\f2248f110459fc669b0b417e7bb2f090.jpg" style="width:100%">
        </div>
        <div class=" mySlides slideFromRight">
            <img src="PicZedere\fe882a230ce71554e66cb451cd7c064c.jpg" style="width:100%">
        </div>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <div class="Chair-Product">
        <div class="info_chair">
            <h1 class="fade-in ">Lorem ipsum dolor sit amet consectetur.</h1>
            <p class="fade-in ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, dolor excepturi repellendus laborum obcaecati rem vitae, perferendis vero impedit </p>
            <h3 class="fade-in ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid sequi quo consectetur. Ex, voluptatum tempore.</h3>
            <p class="fade-in ">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci non, omnis repudiandae aut laboriosam placeat iste itaque odio dolor facere consectetur.</p>
            <a class="fade-in " href="#">Learn more</a>
        </div>
        <div class="pic_chair">
            <img src="PicZedere\9522fbfcb4deaed9f0c1c40ad34b83b3.png" alt="" style="max-width: 100%;">
        </div>
    </div>
    <div class="Sofa-Product">

    </div>
    <div class="Bed-Product">

    </div>
    
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="JavasciptAll/Contact_list.js"></script>
    <script src="JavasciptAll/Modal_Collection.js"></script>
    <script src="JavasciptAll/home_JS.js"></script>
    <script src="JavasciptAll/Index.js"></script>
</body>
</html>
