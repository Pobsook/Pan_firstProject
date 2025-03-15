<?php
session_start();
date_default_timezone_set('Asia/Bangkok');
require("connect.php");

$callback_model_recliner_chair = $connect->prepare("SELECT * FROM model WHERE product_type = 'recliner_chair'");
$callback_model_recliner_chair->execute();
$callback_model_recliner_chair_result = $callback_model_recliner_chair->get_result();

$callback_description_recliner_chair = $connect->prepare("SELECT * FROM description WHERE description_type = 'recliner_chair'");
$callback_description_recliner_chair->execute();
$callback_description_recliner_chair_result = $callback_description_recliner_chair->get_result();

$callback_model_office_chair = $connect->prepare("SELECT * FROM model WHERE product_type = 'office_chair'");
$callback_model_office_chair->execute();
$callback_model_office_chair_result = $callback_model_office_chair->get_result();

$callback_description_office_chair = $connect->prepare("SELECT * FROM description WHERE description_type = 'office_chair'");
$callback_description_office_chair->execute();
$callback_description_office_chair_result = $callback_description_office_chair->get_result();

$callback_upholstery_natural_leather_rc = $connect->prepare("SELECT * FROM upholstery_color WHERE upholstery_color_type = 'natural_leather'");
$callback_upholstery_natural_leather_rc->execute();
$callback_upholstery_natural_leather_rc_result = $callback_upholstery_natural_leather_rc->get_result();

$callback_upholstery_centurian_leather_rc = $connect->prepare("SELECT * FROM upholstery_color WHERE upholstery_color_type = 'centurian_leather'");
$callback_upholstery_centurian_leather_rc->execute();
$callback_upholstery_centurian_leather_rc_result = $callback_upholstery_centurian_leather_rc->get_result();

$callback_upholstery_natural_leather_oc = $connect->prepare("SELECT * FROM upholstery_color WHERE upholstery_color_type = 'natural_leather'");
$callback_upholstery_natural_leather_oc->execute();
$callback_upholstery_natural_leather_oc_result = $callback_upholstery_natural_leather_oc->get_result();

$callback_upholstery_centurian_leather_oc = $connect->prepare("SELECT * FROM upholstery_color WHERE upholstery_color_type = 'centurian_leather'");
$callback_upholstery_centurian_leather_oc->execute();
$callback_upholstery_centurian_leather_oc_result = $callback_upholstery_centurian_leather_oc->get_result();

$callback_model_motor_chair = $connect->prepare("SELECT * FROM model WHERE product_type = 'motor_chair'");
$callback_model_motor_chair->execute();
$callback_model_motor_chair_result = $callback_model_motor_chair->get_result();

$callback_description_motor_chair = $connect->prepare("SELECT * FROM description WHERE description_type = 'motor_chair'");
$callback_description_motor_chair->execute();
$callback_description_motor_chair_result = $callback_description_motor_chair->get_result();

$callback_upholstery_natural_leather_mc = $connect->prepare("SELECT * FROM upholstery_color WHERE upholstery_color_type = 'natural_leather'");
$callback_upholstery_natural_leather_mc->execute();
$callback_upholstery_natural_leather_mc_result = $callback_upholstery_natural_leather_mc->get_result();

$callback_upholstery_centurian_leather_mc = $connect->prepare("SELECT * FROM upholstery_color WHERE upholstery_color_type = 'centurian_leather'");
$callback_upholstery_centurian_leather_mc->execute();
$callback_upholstery_centurian_leather_mc_result = $callback_upholstery_centurian_leather_mc->get_result();

?>

<!DOCTYPE html>
<html lang="en,th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chair_collection</title>
    <link rel="stylesheet" href="cssAll/chair_collection_style.css">
    <link rel="stylesheet" href="cssAll/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="JavasciptAll/chair_collection_page.js" defer></script>
    <script src="JavasciptAll/Contact_list.js"></script>
    <script src="JavasciptAll/Modal_Collection.js"></script>
    <script src="JavasciptAll/Index.js"></script>
    
    <?php require("alert.php"); ?>
    <?php require("navbar.php"); ?>
    <?php require("contact.php"); ?>

    <div class="container_select_collection">
        <div class="text_header"><h1>เลือกประเภทสินค้าที่คุณต้องการ</h1></div>
        <div class="container_select_item" id="select_recliner_chair">
            <img src="PicZedere\recliner_chair.jpg">
            <h2 class="text_select_chair">Recliner Chair</h2>
        </div>
        <div class="container_select_item" id="select_office_chair">
            <img src="PicZedere\office_chair.jpg">
            <h2 class="text_select_chair">Office Chair</h2>
        </div>
        <div class="container_select_item " id="select_motor_chair">
            <img src="PicZedere\motor_chair.jpg">
            <h2 class="text_select_chair">Motor Chair</h2>
        </div>
    </div>

    <!-- Modal Recliner Chair-->

    <div id="Madal_recliner_chair">
        <span id="close_modal_recliner_chair">x</span>
        <div class="container_select">
            <div class="container_slideshow">
                <?php while($row_model_recliner_chair = $callback_model_recliner_chair_result -> fetch_assoc()): ?>
                <div class="img_and_slideshow_re_ch">
                    <img src="PicZedere/upload_model_img/<?php echo $row_model_recliner_chair['model_img']; ?>">
                    <h3 class="name_model" data-model="<?php echo $row_model_recliner_chair['model_name'] ?>">
                        <?php echo $row_model_recliner_chair['model_name'] ?>
                    </h3>
                </div>
                <?php endwhile; ?>
                <a class="prev" onclick="plusSlidesRC(-1)">&#10094;</a>
                <a class="next" onclick="plusSlidesRC(1)">&#10095;</a>
            </div>
            <div class="object_select">
                <div class="Description_recliner_chair">
                    <h3 style="margin: 1rem;">แบบขา</h3>
                    <div class="Description_ease">
                        <?php while($row_description_recliner_chair = $callback_description_recliner_chair_result -> fetch_assoc()): ?>
                            <div class="description_item">
                                <button class="btn_show_description_recliner_chair " data-description="<?php echo $row_description_recliner_chair['description_name'] ?>">
                                    <?php echo $row_description_recliner_chair['description_name'] ?>
                                </button>
                                <div class="show_img_description">
                                    <img style="width: 300px;" src="<?php echo 'PicZedere/upload_description_img/' . $row_description_recliner_chair['description_img'] ?>" >
                                </div>
                            </div>
                        <?php endwhile ?>
                    </div>
                </div>

                <div class="upholstery_ease">
                    <h3 style="margin: 0.5rem;">สีหนัง - Natural Leather</h3>
                    <div class="upholstery_item">
                        <?php while($row_upholstery_natural_leather_rc = $callback_upholstery_natural_leather_rc_result -> fetch_assoc()): ?>
                            <button class="btn_show_upholstery_rc" style="background-image: url(<?php echo 'PicZedere/upload_upholstery_color_img/' . $row_upholstery_natural_leather_rc['upholstery_color_img'] ?>);" data-upholstery="<?php echo $row_upholstery_natural_leather_rc['upholstery_color_name'] ?>"></button>
                        <?php endwhile ?>
                    </div>
                    <h3 style="margin: 0.5rem;">สีหนัง - Centurian Leather</h3>
                    <div class="upholstery_item">
                        <?php while($row_upholstery_centurian_leather_rc = $callback_upholstery_centurian_leather_rc_result -> fetch_assoc()): ?>
                            <button class="btn_show_upholstery_rc" style="background-image: url(<?php echo 'PicZedere/upload_upholstery_color_img/' . $row_upholstery_centurian_leather_rc['upholstery_color_img'] ?>);" data-upholstery="<?php echo $row_upholstery_centurian_leather_rc['upholstery_color_name'] ?>"></button>
                        <?php endwhile ?>
                        
                    </div>
                </div>

                <div style="border: 2px solid blue; margin: 1rem 1rem 0.5rem 0; position:relative; display:grid; grid-template: 1fr 1fr">
                    <div class="detail_product">
                        <span id="model_rc_selected" style=" font-size:larger">Model : </span><br>
                        <span id="description_rc_selected" style="font-size:larger">Description : </span><br>
                        <span id="upholstery_rc_selected" style="font-size:larger">Upholstery Color :</span>
                    </div>

                    <div class="price_container">
                        <h2 class="price_rc" style="margin: 0.5rem 2rem;">ราคา :    บาท</h2>
                        <div class="quantityAndSubmit">
                            <div class="quantity_con">
                                <button class="add_quantity" style="padding: 2px 5px;" onclick="addquantity_re_cha(-1)">&#10094;</button>
                                <span class="quantity_re_ch"> จำนวน :  ชิ้น</span>
                                <button class="add_quantity" style="padding: 2px 5px;" onclick="addquantity_re_cha(1)">&#10095;</button>
                            </div>
                            <form action="addcart_process.php" method="post">
                                <input type="hidden" value="recliner_chair" name="price_submit">
                                <button id="add_cart" type="submit">Add Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- office chair -->
    <div id="modal_office_chair">
        <span id="close_modal_office_chair">x</span>
        <div class="container_select">
            <div class="container_slideshow">
                <?php while($row_model_office_chair = $callback_model_office_chair_result->fetch_assoc()): ?>
                <div class="img_and_slideshow_oc">
                    <img src="PicZedere/upload_model_img/<?php echo $row_model_office_chair['model_img']; ?>">
                    <h3 class="name_model" data-model="<?php echo $row_model_office_chair['model_name']; ?>">
                        <?php echo $row_model_office_chair['model_name']; ?>
                    </h3>
                </div>
                <?php endwhile; ?>
                <a class="prev" onclick="plusSlidesOC(-1)">&#10094;</a>
                <a class="next" onclick="plusSlidesOC(1)">&#10095;</a>
            </div>
            <div class="object_select">
                <div class="Description_office_chair">
                    <h3 style="margin: 1rem;">แบบขา</h3>
                    <div class="Description_ease">
                        <?php while($row_description_office_chair = $callback_description_office_chair_result->fetch_assoc()): ?>
                            <div class="description_item">
                                <button class="btn_show_description_office_chair" data-description="<?php echo $row_description_office_chair['description_name']; ?>">
                                    <?php echo $row_description_office_chair['description_name']; ?>
                                </button>
                                <div class="show_img_description">
                                    <img style="width: 300px;" src="<?php echo 'PicZedere/upload_description_img/' . $row_description_office_chair['description_img']; ?>">
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>

                <div class="upholstery_ease">
                    <h3 style="margin: 0.5rem;">สีหนัง - Natural Leather</h3>
                    <div class="upholstery_item">
                        <?php while($row_upholstery_natural_leather_oc = $callback_upholstery_natural_leather_oc_result->fetch_assoc()): ?>
                            <button class="btn_show_upholstery_oc" style="background-image: url(<?php echo 'PicZedere/upload_upholstery_color_img/' . $row_upholstery_natural_leather_oc['upholstery_color_img'] ?>);" data-upholstery="<?php echo $row_upholstery_natural_leather_oc['upholstery_color_name'] ?>"></button>
                        <?php endwhile; ?>
                    </div>
                    <h3 style="margin: 0.5rem;">สีหนัง - Centurian Leather</h3>
                    <div class="upholstery_item">
                        <?php while($row_upholstery_centurian_leather_oc = $callback_upholstery_centurian_leather_oc_result->fetch_assoc()): ?>
                            <button class="btn_show_upholstery_oc" style="background-image: url(<?php echo 'PicZedere/upload_upholstery_color_img/' . $row_upholstery_centurian_leather_oc['upholstery_color_img'] ?>);" data-upholstery="<?php echo $row_upholstery_centurian_leather_oc['upholstery_color_name'] ?>"></button>
                        <?php endwhile; ?>
                    </div>
                </div>

                <div style="border: 2px solid blue; margin: 1rem 1rem 0.5rem 0; position:relative; display:grid; grid-template: 1fr 1fr">
                    <div class="detail_product">
                        <span id="model_oc_selected" style="font-size: larger">Model: </span><br>
                        <span id="description_oc_selected" style="font-size: larger">Description: </span><br>
                        <span id="upholstery_oc_selected" style="font-size: larger">Upholstery Color: </span>
                    </div>

                    <div class="price_container">
                        <h2 class="price_oc" style="margin: 0.5rem 2rem;">ราคา : บาท</h2>
                        <div class="quantityAndSubmit">
                            <div class="quantity_con">
                                <button class="add_quantity" style="padding: 2px 5px;" onclick="addquantity_oc(-1)">&#10094;</button>
                                <span class="quantity_oc"> จำนวน : ชิ้น</span>
                                <button class="add_quantity" style="padding: 2px 5px;" onclick="addquantity_oc(1)">&#10095;</button>
                            </div>
                            <form action="addcart_process.php" method="post">
                                <input type="hidden" value="office_chair" name="price_submit">
                                <button id="add_cart" type="submit">Add Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modal_motor_chair">
        <span id="close_modal_motor_chair">x</span>
        <div class="container_select">
            <div class="container_slideshow">
                <?php while($row_model_motor_chair = $callback_model_motor_chair_result->fetch_assoc()): ?>
                <div class="img_and_slideshow_mc">
                    <img src="PicZedere/upload_model_img/<?php echo $row_model_motor_chair['model_img']; ?>">
                    <h3 class="name_model" data-model="<?php echo $row_model_motor_chair['model_name']; ?>">
                        <?php echo $row_model_motor_chair['model_name']; ?>
                    </h3>
                </div>
                <?php endwhile; ?>
                <a class="prev" onclick="plusSlidesMC(-1)">&#10094;</a>
                <a class="next" onclick="plusSlidesMC(1)">&#10095;</a>
            </div>
            <div class="object_select">
                <div class="Description_motor_chair">
                    <h3 style="margin: 1rem;">แบบขา</h3>
                    <div class="Description_ease">
                        <?php while($row_description_motor_chair = $callback_description_motor_chair_result->fetch_assoc()): ?>
                            <div class="description_item">
                                <button class="btn_show_description_motor_chair" data-description="<?php echo $row_description_motor_chair['description_name']; ?>">
                                    <?php echo $row_description_motor_chair['description_name']; ?>
                                </button>
                                <div class="show_img_description">
                                    <img style="width: 300px;" src="<?php echo 'PicZedere/upload_description_img/' . $row_description_motor_chair['description_img']; ?>">
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>

                <div class="upholstery_ease">
                    <h3 style="margin: 0.5rem;">สีหนัง - Natural Leather</h3>
                    <div class="upholstery_item">
                        <?php while($row_upholstery_natural_leather_mc = $callback_upholstery_natural_leather_mc_result->fetch_assoc()): ?>
                            <button class="btn_show_upholstery_mc" style="background-image: url(<?php echo 'PicZedere/upload_upholstery_color_img/' . $row_upholstery_natural_leather_mc['upholstery_color_img'] ?>);" data-upholstery="<?php echo $row_upholstery_natural_leather_mc['upholstery_color_name'] ?>"></button>
                        <?php endwhile; ?>
                    </div>
                    <h3 style="margin: 0.5rem;">สีหนัง - Centurian Leather</h3>
                    <div class="upholstery_item">
                        <?php while($row_upholstery_centurian_leather_mc = $callback_upholstery_centurian_leather_mc_result->fetch_assoc()): ?>
                            <button class="btn_show_upholstery_mc" style="background-image: url(<?php echo 'PicZedere/upload_upholstery_color_img/' . $row_upholstery_centurian_leather_mc['upholstery_color_img'] ?>);" data-upholstery="<?php echo $row_upholstery_centurian_leather_mc['upholstery_color_name'] ?>"></button>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div style="border: 2px solid blue; margin: 1rem 1rem 0.5rem 0; position:relative; display:grid; grid-template: 1fr 1fr">
                    <div class="detail_product">
                        <span id="model_mc_selected" style="font-size: larger">Model: </span><br>
                        <span id="description_mc_selected" style="font-size: larger">Description: </span><br>
                        <span id="upholstery_mc_selected" style="font-size: larger">Upholstery Color: </span>
                    </div>

                    <div class="price_container">
                        <h2 class="price_mc" style="margin: 0.5rem 2rem;">ราคา : บาท</h2>
                        <div class="quantityAndSubmit">
                            <div class="quantity_con">
                                <button class="add_quantity" style="padding: 2px 5px;" onclick="addquantity_mc(-1)">&#10094;</button>
                                <span class="quantity_mc"> จำนวน : ชิ้น</span>
                                <button class="add_quantity" style="padding: 2px 5px;" onclick="addquantity_mc(1)">&#10095;</button>
                            </div>
                            <form action="addcart_process.php" method="post">
                                <input type="hidden" value="motor_chair" name="price_submit">
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

