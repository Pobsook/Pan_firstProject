<?php
    session_start();
    date_default_timezone_set('Asia/Bangkok');
    require("connect.php");
    if(isset($_SESSION['role']) && isset($_SESSION['email_account']) && isset($_SESSION['id_account']) && isset($_SESSION['username'])){
        if($_SESSION['role'] != 'Admin'){
            $_SESSION['result'] = 'หน้านี้สงวนสิทธ์สำหรับ Admin เท่านั้น';
            header('Location: Home_page.php');
            exit();
        }
    } else {
        $_SESSION['result'] = 'หน้านี้สงวนสิทธ์สำหรับ Admin เท่านั้น';
        header('Location: Home_page.php');
        exit();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin_page</title>
    <link rel="stylesheet" href="cssAll/Admin_page.css">
    <link rel="stylesheet" href="cssAll/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <?php require("alert.php"); ?>
    <?php require("navbar.php"); ?>

    <div class="container_model_insert">
        <div class="dropdown_in_pro">
            <button class="dropbtn_in_pro">ประเภทที่ต้องการเพิ่มข้อมูล</button>
            <div class="dropdown-content_in_pro">
                <button class="input_product">MODEL</button>
                <button class="input_product">DESCRIPTION</button>
                <button class="input_product">COLOR</button>
                <button class="input_product">ADD ON</button>
                <button class="input_product">UPHOLSTERY COLOR</button>
            </div>
        </div>
    </div>

    <div class="EditDeleteCon">
        <a href="edit_delete.php" class="edit_delete">แก้ไข/ลบ</a>
    </div>

    <div class="text_header">
        <H2>Home - Manage Product</H2>
    </div>
    

    <form action="insert_product_process.php" method="post" enctype="multipart/form-data">
    <div id="container_add_product">
        <!-- Add Product Container -->
        <h2 class="form_heading">Add Product</h2>

        <div class="product_section">
            <div class="input_group">
                <label for="model_name" class="form_label">Model Name - แบบโมเดล</label>
                <input type="text" name="model_name" id="model_name" class="form_control" value="" placeholder="Enter model name">
            </div>
            <div class="input_group">
                <label for="product_type" class="form_label">Product type</label>
                <input type="checkbox" name="product_check_box[]" id="recliner_chair_type" class="product_check_box" value="recliner_chair">Recliner Chair
                <input type="checkbox" name="product_check_box[]" id="office_chair_type" class="product_check_box" value="office_chair">Office Chair
                <input type="checkbox" name="product_check_box[]" id="mortor_chair_type" class="product_check_box" value="motor_chair">Mortor Chair<br>
                <input type="checkbox" name="product_check_box[]" id="sofa_fix_type" class="product_check_box" value="sofa_fix">Sofa Fix
                <input type="checkbox" name="product_check_box[]" id="recliner_sofa_type" class="product_check_box" value="recliner_sofa">Recliner Sofa
                <input type="checkbox" name="product_check_box[]" id="motor_sofa_type" class="product_check_box" value="motor_sofa">Motor Sofa<br>
                <input type="checkbox" name="product_check_box[]" id="smart_bed_type" class="product_check_box" value="smart_bed">Smart Bed
            </div>
            <div class="input_group">
                <label for="model_img" class="form_label">Model Image</label>
                <input type="file" name="model_img" id="model_img" class="form_control" accept="image/png, image/jpg, image/jpeg">
            </div>
        </div>

        <div class="product_section">
            <div class="input_group">
                <label for="description_name" class="form_label">Description Name - รายละเอียด</label>
                <input type="text" name="description_name" id="description_name" class="form_control" value="" placeholder="Enter description name">
            </div>
            <div class="input_group">
                <label for="description_detail" class="form_label">Detail</label>
                <input type="text" name="description_detail" id="description_detail" class="form_control" value="" placeholder="Enter Detail Description">
            </div>
            <div class="input_group">
                <label for="description_img" class="form_label">Description Image</label>
                <input type="file" name="description_img" id="description_img" class="form_control" accept="image/png, image/jpg, image/jpeg">
            </div>
            <div class="input_group">
                <label for="price" class="form_label">Price</label>
                <input type="text" name="price" id="price" class="form_control" value="" placeholder="Enter Price">
            </div>
        </div>

        <div class="product_section">
            <div class="input_group">
                <label for="color_name" class="form_label">Color name - สีฐาน</label>
                <input type="text" name="color_name" id="color_name" class="form_control" value="" placeholder="Enter color name">
            </div>
            <div class="input_group">
                <label for="color_detail" class="form_label">Color detail</label>
                <input type="text" name="color_detail" id="color_detail" class="form_control" value="" placeholder="Enter color detail">
            </div>
            <div class="input_group">
                <label for="color_img" class="form_label">Color Image</label>
                <input type="file" name="color_img" id="color_img" class="form_control" accept="image/png, image/jpg, image/jpeg">
            </div>
        </div>

        <div class="product_section">
            <div class="input_group">
                <label for="add_on_name" class="form_label">Add on - ออฟชั่นเสริม</label>
                <input type="text" name="add_on_name" id="add_on_name" class="form_control" value="" placeholder="Enter Add on name">
            </div>
            <div class="input_group">
                <label for="add_on_detail" class="form_label">Add on detail</label>
                <input type="text" name="add_on_detail" id="add_on_detail" class="form_control" value="" placeholder="Enter Add on detail">
            </div>
            <div class="input_group">
                <label for="add_on_img" class="form_label">Add on Image</label>
                <input type="file" name="add_on_img" id="add_on_img" class="form_control" accept="image/png, image/jpg, image/jpeg">
            </div>
        </div>

        <div class="product_section">
            <div class="input_group">
                <label for="upholstery_color_name" class="form_label">Upholstery color name - สีและวัสดุหุ้ม</label>
                <input type="text" name="upholstery_color_name" id="upholstery_color_name" class="form_control" value="" placeholder="Enter Upholstery color name">
            </div>
            <div class="input_group">
                <label for="upholstery_type" class="form_label">Upholstery color type</label>
                <input type="text" name="upholstery_type" id="upholstery_type" class="form_control" value="" placeholder="Enter Upholstery color type">
            </div>
            <div class="input_group">
                <label for="upholstery_color_detail" class="form_label">Upholstery color detail</label>
                <input type="text" name="upholstery_color_detail" id="upholstery_color_detail" class="form_control" value="" placeholder="Enter color detail">
            </div>
            <div class="input_group">
                <label for="upholstery_color_img" class="form_label">Upholstery color Image</label>
                <input type="file" name="upholstery_color_img" id="upholstery_color_img" class="form_control" accept="image/png, image/jpg, image/jpeg">
            </div>
        </div>

        <button type="submit" class="submit_btn">Submit</button>
    </div>
</form>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="JavasciptAll/Admin_page.js"></script>
    <script src="JavasciptAll/Modal_Collection.js"></script>
    <script src="JavasciptAll/Index.js"></script>

</body>
</html>