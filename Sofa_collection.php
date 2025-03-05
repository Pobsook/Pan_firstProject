<?php 
    session_start();
    date_default_timezone_set('Asia/Bangkok');
    require("connect.php");

    $callback_model = $connect -> prepare("SELECT * FROM model WHERE product_type = 'recliner_chair'");
    $callback_model -> execute();
    $callback_model_result = $callback_model -> get_result();
?>

<!DOCTYPE html>
<html lang="en,th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chair_collection</title>
    <link rel="stylesheet" href="cssAll/Sofa_collection_style.css">
    <link rel="stylesheet" href="cssAll/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <?php require("alert.php"); ?>
    <?php require("navbar.php"); ?>
    <?php require("contact.php"); ?>

    <div class="container_select_sofa_collection">
        <div class="text_header"><h1>เลือกประเภทสินค้าที่คุณต้องการ</h1></div>
        <div class="container_select_sofa" id="select_recliner_sofa">
            <img src="PicZedere\recliner_sofa.jpg">
            <h2 class="text_select_sofa">Recliner Sofa</h2>
        </div>
        <div class="container_select_sofa" id="select_sofa_fix">
            <img src="PicZedere\sofa_fix.jpg">
            <h2 class="text_select_sofa">Sofa Fix</h2>
        </div>
        <div class="container_select_sofa " id="select_motor_sofa">
            <img src="PicZedere\sofa_motor.jpg">
            <h2 class="text_select_sofa">Sofa Motor</h2>
        </div>
    </div>

    <!-- Modal Recliner Chair-->
    <div class="container_recliner_chair">
        <?php while($row = $callback_model_result -> fetch_assoc()): ?>
        <div class="ease_chair_container">
            <img src="PicZedere/upload_model_img/<?php echo $row['model_img']; ?>" alt="" class="image_chair">
            <div class="overlay_chair">
                <div class="text"><?php echo $row['model_name']; ?></div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="JavasciptAll/Contact_list.js"></script>
    <script src="JavasciptAll/Modal_Collection.js"></script>
    <script src="JavasciptAll/Index.js"></script>
</body>
</html>