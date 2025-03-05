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
    <link rel="stylesheet" href="cssAll/edit_page.css">
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
            <a href="admin_page.php" class="dropbtn_in_pro">ประเภทที่ต้องการเพิ่มข้อมูล</a>
        </div>
    </div>

    <div class="EditDeleteCon">
        <a href="edit_delete.php" class="edit_delete">แก้ไข/ลบ</a>
    </div>

    
    <div class="text_header">
        <H2>Home - Manage Product</H2>
    </div>
    
    <div id="container_add_product">
        <!-- Add Product Container -->
        <h2 class="form_heading">Edit/Delete</h2>

        <div class="search_con">
            <input type="search" class="key_search">
            <select name="search" class="type_search">
                <option value="model">Model</option>
                <option value="description">Description</option>
                <option value="upholstery">Upholstery</option>
            </select>
            <button onclick="search()">search</button>
        </div>

        <div class="con_show_edit">
            <table id="result_table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ชื่อ</th>
                        <th>ประเภท</th>
                        <th>รายละเอียด</th>
                        <th>รูปภาพ</th>
                        <th>การจัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- ข้อมูลจะแสดงที่นี่จากการค้นหา -->
                </tbody>
            </table>
            <span class="text_error"></span>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="JavasciptAll/Admin_page.js"></script>
    <script src="JavasciptAll/Modal_Collection.js"></script>
    <script src="JavasciptAll/Index.js"></script>

</body>
</html>

