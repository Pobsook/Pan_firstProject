<?php
session_start();
date_default_timezone_set('Asia/Bangkok');
require("connect.php");

$callback_model_recliner_sofa = $connect->prepare("SELECT * FROM model WHERE product_type = 'recliner_sofa'");
$callback_model_recliner_sofa->execute();
$callback_model_recliner_sofa_result = $callback_model_recliner_sofa->get_result();

$callback_description_recliner_sofa = $connect->prepare("SELECT * FROM description WHERE description_type = 'recliner_sofa'");
$callback_description_recliner_sofa->execute();
$callback_description_recliner_sofa_result = $callback_description_recliner_sofa->get_result();

$callback_model_sofa_fix = $connect->prepare("SELECT * FROM model WHERE product_type = 'sofa_fix'");
$callback_model_sofa_fix->execute();
$callback_model_sofa_fix_result = $callback_model_sofa_fix->get_result();

$callback_description_sofa_fix = $connect->prepare("SELECT * FROM description WHERE description_type = 'sofa_fix'");
$callback_description_sofa_fix->execute();
$callback_description_sofa_fix_result = $callback_description_sofa_fix->get_result();

$callback_upholstery_natural_leather_rs = $connect->prepare("SELECT * FROM upholstery_color WHERE upholstery_color_type = 'natural_leather'");
$callback_upholstery_natural_leather_rs->execute();
$callback_upholstery_natural_leather_rs_result = $callback_upholstery_natural_leather_rs->get_result();

$callback_upholstery_centurian_leather_rs = $connect->prepare("SELECT * FROM upholstery_color WHERE upholstery_color_type = 'centurian_leather'");
$callback_upholstery_centurian_leather_rs->execute();
$callback_upholstery_centurian_leather_rs_result = $callback_upholstery_centurian_leather_rs->get_result();

$callback_upholstery_natural_leather_sf = $connect->prepare("SELECT * FROM upholstery_color WHERE upholstery_color_type = 'natural_leather'");
$callback_upholstery_natural_leather_sf->execute();
$callback_upholstery_natural_leather_sf_result = $callback_upholstery_natural_leather_sf->get_result();

$callback_upholstery_centurian_leather_sf = $connect->prepare("SELECT * FROM upholstery_color WHERE upholstery_color_type = 'centurian_leather'");
$callback_upholstery_centurian_leather_sf->execute();
$callback_upholstery_centurian_leather_sf_result = $callback_upholstery_centurian_leather_sf->get_result();

$callback_model_motor_sofa = $connect->prepare("SELECT * FROM model WHERE product_type = 'motor_sofa'");
$callback_model_motor_sofa->execute();
$callback_model_motor_sofa_result = $callback_model_motor_sofa->get_result();

$callback_description_motor_sofa = $connect->prepare("SELECT * FROM description WHERE description_type = 'motor_sofa'");
$callback_description_motor_sofa->execute();
$callback_description_motor_sofa_result = $callback_description_motor_sofa->get_result();

$callback_upholstery_natural_leather_ms = $connect->prepare("SELECT * FROM upholstery_color WHERE upholstery_color_type = 'natural_leather'");
$callback_upholstery_natural_leather_ms->execute();
$callback_upholstery_natural_leather_ms_result = $callback_upholstery_natural_leather_ms->get_result();

$callback_upholstery_centurian_leather_ms = $connect->prepare("SELECT * FROM upholstery_color WHERE upholstery_color_type = 'centurian_leather'");
$callback_upholstery_centurian_leather_ms->execute();
$callback_upholstery_centurian_leather_ms_result = $callback_upholstery_centurian_leather_ms->get_result();

?>

<!DOCTYPE html>
<html lang="en,th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sofa Collection</title>
    <link rel="stylesheet" href="cssAll/Collection_style.css">
    <link rel="stylesheet" href="cssAll/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="JavasciptAll/sofa_collection_page.js" defer></script>
    <script src="JavasciptAll/Contact_list.js"></script>
    <script src="JavasciptAll/Modal_Collection.js"></script>
    <script src="JavasciptAll/Index.js"></script>


    <?php require("alert.php"); ?>
    <?php require("navbar.php"); ?>
    <?php require("contact.php"); ?>

    <div class="container_select_collection">
        <div class="text_header"><h1>เลือกประเภทโซฟาที่คุณต้องการ</h1></div>
        <div class="container_select_item" id="select_recliner_sofa">
            <img src="PicZedere/recliner_sofa.jpg">
            <h2 class="text_select_chair">Recliner Sofa</h2>
        </div>
        <div class="container_select_item" id="select_sofa_fix">
            <img src="PicZedere/sofa_fix.jpg">
            <h2 class="text_select_chair">Sofa Fix</h2>
        </div>
        <div class="container_select_item" id="select_motor_sofa">
            <img src="PicZedere/motor_sofa.jpg">
            <h2 class="text_select_chair">Motor sofa</h2>
        </div>
    </div>

    <!-- Modal Recliner Sofa -->
    <div id="modal_recliner_sofa">
        <span id="close_modal_recliner_sofa">x</span>
        <div class="container_select">
            <div class="container_slideshow">
                <?php while($row_model_recliner_sofa = $callback_model_recliner_sofa_result -> fetch_assoc()): ?>
                <div class="img_and_slideshow_rs">
                    <img src="PicZedere/upload_model_img/<?php echo $row_model_recliner_sofa['model_img']; ?>">
                    <h3 class="name_model" data-model="<?php echo $row_model_recliner_sofa['model_name'] ?>">
                        <?php echo $row_model_recliner_sofa['model_name'] ?>
                    </h3>
                </div>
                <?php endwhile; ?>
                <a class="prev" onclick="plusSlidesRS(-1)">&#10094;</a>
                <a class="next" onclick="plusSlidesRS(1)">&#10095;</a>
            </div>
            <div class="object_select">
                <div class="Description_recliner_sofa">
                    <h3 style="margin: 1rem;">Description</h3>
                    <div class="Description_ease">
                        <?php while($row_description_recliner_sofa = $callback_description_recliner_sofa_result -> fetch_assoc()): ?>
                            <div class="description_item">
                                <button class="btn_show_description_recliner_sofa" data-description="<?php echo $row_description_recliner_sofa['description_name'] ?>">
                                    <?php echo $row_description_recliner_sofa['description_name'] ?>
                                </button>
                                <div class="show_img_description">
                                    <p><?php echo $row_description_recliner_sofa['description_detail'] ?></p>
                                </div>
                            </div>
                        <?php endwhile ?>
                    </div>
                </div>

                <div class="upholstery_ease">
                    <h3 style="margin: 0.5rem;">สีหนัง - Natural Leather</h3>
                    <div class="upholstery_item">
                        <?php while($row_upholstery_natural_leather_rs = $callback_upholstery_natural_leather_rs_result -> fetch_assoc()): ?>
                            <button class="btn_show_upholstery_rs" style="background-image: url(<?php echo 'PicZedere/upload_upholstery_color_img/' . $row_upholstery_natural_leather_rs['upholstery_color_img'] ?>);" data-upholstery="<?php echo $row_upholstery_natural_leather_rs['upholstery_color_name'] ?>"></button>
                        <?php endwhile ?>
                    </div>
                    <h3 style="margin: 0.5rem;">สีหนัง - Centurian Leather</h3>
                    <div class="upholstery_item">
                        <?php while($row_upholstery_centurian_leather_rs = $callback_upholstery_centurian_leather_rs_result -> fetch_assoc()): ?>
                            <button class="btn_show_upholstery_rs" style="background-image: url(<?php echo 'PicZedere/upload_upholstery_color_img/' . $row_upholstery_centurian_leather_rs['upholstery_color_img'] ?>);" data-upholstery="<?php echo $row_upholstery_centurian_leather_rs['upholstery_color_name'] ?>"></button>
                        <?php endwhile ?>
                    </div>
                </div>

                <div style="border: 2px solid blue; margin: 1rem 1rem 0.5rem 0; position:relative; display:grid; grid-template: 1fr 1fr">
                    <div class="detail_product">
                        <span id="model_rs_selected" style=" font-size:larger">Model : </span><br>
                        <span id="description_rs_selected" style="font-size:larger">Description : </span><br>
                        <span id="upholstery_rs_selected" style="font-size:larger">Upholstery Color :</span>
                    </div>

                    <div class="price_container">
                        <h2 class="price_rs" style="margin: 0.5rem 2rem;">ราคา :    บาท</h2>
                        <div class="quantityAndSubmit">
                            <div class="quantity_con">
                                <button class="add_quantity" style="padding: 2px 5px;" onclick="addquantity_rs(-1)">&#10094;</button>
                                <span class="quantity_rs"> จำนวน :  ชิ้น</span>
                                <button class="add_quantity" style="padding: 2px 5px;" onclick="addquantity_rs(1)">&#10095;</button>
                            </div>
                            <form action="addcart_process.php" method="post">
                                <input type="hidden" value="recliner_sofa" name="price_submit">
                                <button id="add_cart" type="submit">Add Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Sofa Fix -->
    <div id="modal_sofa_fix">
        <span id="close_modal_sofa_fix">x</span>
        <div class="container_select">
            <div class="container_slideshow">
                <?php while($row_model_sofa_fix = $callback_model_sofa_fix_result -> fetch_assoc()): ?>
                <div class="img_and_slideshow_sf">
                    <img src="PicZedere/upload_model_img/<?php echo $row_model_sofa_fix['model_img']; ?>">
                    <h3 class="name_model" data-model="<?php echo $row_model_sofa_fix['model_name'] ?>">
                        <?php echo $row_model_sofa_fix['model_name'] ?>
                    </h3>
                </div>
                <?php endwhile; ?>
                <a class="prev" onclick="plusSlidesSF(-1)">&#10094;</a>
                <a class="next" onclick="plusSlidesSF(1)">&#10095;</a>
            </div>
            <div class="object_select">
                <div class="Description_sofa_fix">
                    <h3 style="margin: 1rem;">Description</h3>
                    <div class="Description_ease">
                        <?php while($row_description_sofa_fix = $callback_description_sofa_fix_result -> fetch_assoc()): ?>
                            <div class="description_item">
                                <button class="btn_show_description_sofa_fix" data-description="<?php echo $row_description_sofa_fix['description_name'] ?>">
                                    <?php echo $row_description_sofa_fix['description_name'] ?>
                                </button>
                                <div class="show_img_description">
                                <p><?php echo $row_description_sofa_fix['description_detail'] ?></p>
                                </div>
                            </div>
                        <?php endwhile ?>
                    </div>
                </div>

                <div class="upholstery_ease">
                    <h3 style="margin: 0.5rem;">สีหนัง - Natural Leather</h3>
                    <div class="upholstery_item">
                        <?php while($row_upholstery_natural_leather_sf = $callback_upholstery_natural_leather_sf_result -> fetch_assoc()): ?>
                            <button class="btn_show_upholstery_sf" style="background-image: url(<?php echo 'PicZedere/upload_upholstery_color_img/' . $row_upholstery_natural_leather_sf['upholstery_color_img'] ?>);" data-upholstery="<?php echo $row_upholstery_natural_leather_sf['upholstery_color_name'] ?>"></button>
                        <?php endwhile ?>
                    </div>
                    <h3 style="margin: 0.5rem;">สีหนัง - Centurian Leather</h3>
                    <div class="upholstery_item">
                        <?php while($row_upholstery_centurian_leather_sf = $callback_upholstery_centurian_leather_sf_result -> fetch_assoc()): ?>
                            <button class="btn_show_upholstery_sf" style="background-image: url(<?php echo 'PicZedere/upload_upholstery_color_img/' . $row_upholstery_centurian_leather_sf['upholstery_color_img'] ?>);" data-upholstery="<?php echo $row_upholstery_centurian_leather_sf['upholstery_color_name'] ?>"></button>
                        <?php endwhile ?>
                    </div>
                </div>

                <div style="border: 2px solid blue; margin: 1rem 1rem 0.5rem 0; position:relative; display:grid; grid-template: 1fr 1fr">
                    <div class="detail_product">
                        <span id="model_sf_selected" style=" font-size:larger">Model : </span><br>
                        <span id="description_sf_selected" style="font-size:larger">Description : </span><br>
                        <span id="upholstery_sf_selected" style="font-size:larger">Upholstery Color :</span>
                    </div>

                    <div class="price_container">
                        <h2 class="price_sf" style="margin: 0.5rem 2rem;">ราคา :    บาท</h2>
                        <div class="quantityAndSubmit">
                            <div class="quantity_con">
                                <button class="add_quantity" style="padding: 2px 5px;" onclick="addquantity_sf(-1)">&#10094;</button>
                                <span class="quantity_sf"> จำนวน :  ชิ้น</span>
                                <button class="add_quantity" style="padding: 2px 5px;" onclick="addquantity_sf(1)">&#10095;</button>
                            </div>
                            <form action="addcart_process.php" method="post">
                                <input type="hidden" value="sofa_fix" name="price_submit">
                                <button id="add_cart" type="submit">Add Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modal_motor_sofa">
        <span id="close_modal_motor_sofa">x</span>
        <div class="container_select">
            <div class="container_slideshow">
                <?php while($row_model_motor_sofa = $callback_model_motor_sofa_result -> fetch_assoc()): ?>
                <div class="img_and_slideshow_ms">
                    <img src="PicZedere/upload_model_img/<?php echo $row_model_motor_sofa['model_img']; ?>">
                    <h3 class="name_model" data-model="<?php echo $row_model_motor_sofa['model_name'] ?>">
                        <?php echo $row_model_motor_sofa['model_name'] ?>
                    </h3>
                </div>
                <?php endwhile; ?>
                <a class="prev" onclick="plusSlidesMS(-1)">&#10094;</a>
                <a class="next" onclick="plusSlidesMS(1)">&#10095;</a>
            </div>
            <div class="object_select">
                <div class="Description_sofa_motor">
                    <h3 style="margin: 1rem;">Description</h3>
                    <div class="Description_ease">
                        <?php while($row_description_motor_sofa = $callback_description_motor_sofa_result -> fetch_assoc()): ?>
                            <div class="description_item">
                                <button class="btn_show_description_motor_sofa" data-description="<?php echo $row_description_motor_sofa['description_name'] ?>">
                                    <?php echo $row_description_motor_sofa['description_name'] ?>
                                </button>
                                <div class="show_img_description">
                                    <p><?php echo $row_description_motor_sofa['description_detail'] ?></p>
                                </div>
                            </div>
                        <?php endwhile ?>
                    </div>
                </div>

                <div class="upholstery_ease">
                    <h3 style="margin: 0.5rem;">สีหนัง - Natural Leather</h3>
                    <div class="upholstery_item">
                        <?php while($row_upholstery_natural_leather_ms = $callback_upholstery_natural_leather_ms_result -> fetch_assoc()): ?>
                            <button class="btn_show_upholstery_ms" style="background-image: url(<?php echo 'PicZedere/upload_upholstery_color_img/' . $row_upholstery_natural_leather_ms['upholstery_color_img'] ?>);" data-upholstery="<?php echo $row_upholstery_natural_leather_ms['upholstery_color_name'] ?>"></button>
                        <?php endwhile ?>
                    </div>
                    <h3 style="margin: 0.5rem;">สีหนัง - Centurian Leather</h3>
                    <div class="upholstery_item">
                        <?php while($row_upholstery_centurian_leather_ms = $callback_upholstery_centurian_leather_ms_result -> fetch_assoc()): ?>
                            <button class="btn_show_upholstery_ms" style="background-image: url(<?php echo 'PicZedere/upload_upholstery_color_img/' . $row_upholstery_centurian_leather_ms['upholstery_color_img'] ?>);" data-upholstery="<?php echo $row_upholstery_centurian_leather_ms['upholstery_color_name'] ?>"></button>
                        <?php endwhile ?>
                    </div>
                </div>

                <div style="border: 2px solid blue; margin: 1rem 1rem 0.5rem 0; position:relative; display:grid; grid-template: 1fr 1fr">
                    <div class="detail_product">
                        <span id="model_ms_selected" style=" font-size:larger">Model : </span><br>
                        <span id="description_ms_selected" style="font-size:larger">Description : </span><br>
                        <span id="upholstery_ms_selected" style="font-size:larger">Upholstery Color :</span>
                    </div>

                    <div class="price_container">
                        <h2 class="price_ms" style="margin: 0.5rem 2rem;">ราคา :    บาท</h2>
                        <div class="quantityAndSubmit">
                            <div class="quantity_con">
                                <button class="add_quantity" style="padding: 2px 5px;" onclick="addquantity_ms(-1)">&#10094;</button>
                                <span class="quantity_ms"> จำนวน :  ชิ้น</span>
                                <button class="add_quantity" style="padding: 2px 5px;" onclick="addquantity_ms(1)">&#10095;</button>
                            </div>
                            <form action="addcart_process.php" method="post">
                                <input type="hidden" value="motor_sofa" name="price_submit">
                                <button id="add_cart" type="submit">Add Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
