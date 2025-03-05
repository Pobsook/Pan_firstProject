<?php
session_start();
date_default_timezone_set('Asia/Bangkok');
require("connect.php");

if (isset($_POST['edit_onclick'])) {
    $id = intval($_POST['id']); // แปลง ID เป็นตัวเลข ป้องกัน SQL Injection
    $type_edit = $_POST['type_edit'];
    $name = trim($_POST['name']);
    $type = trim($_POST['type']);
    $detail = trim($_POST['detail']);

    // ตรวจสอบว่า `$id` ถูกต้องหรือไม่
    if ($id <= 0) {
        echo 'error: invalid ID';
        exit();
    }

    // ตรวจสอบประเภทที่อนุญาต
    $valid_types = ['model', 'description', 'upholstery'];
    if (!in_array($type_edit, $valid_types)) {
        echo 'error: invalid type_edit';
        exit();
    }

    // ตรวจสอบว่ามีไฟล์อัปโหลดหรือไม่
    $new_img_name = "";
    if (isset($_FILES['file_img']) && $_FILES['file_img']['error'] == 0) {
        $img_name = $_FILES['file_img']['name'];
        $img_tmp = $_FILES['file_img']['tmp_name'];
        $img_type = $_FILES['file_img']['type'];

        $allowed_types = ['image/png', 'image/jpg', 'image/jpeg'];
        if (!in_array($img_type, $allowed_types)) {
            echo 'ไฟล์ต้องเป็น PNG หรือ JPG เท่านั้น';
            exit();
        }

        $new_img_name = time() . '_' . basename($img_name);
        $location_file = "PicZedere/upload_{$type_edit}_img/" . $new_img_name;

        if (!move_uploaded_file($img_tmp, $location_file)) {
            echo 'เกิดข้อผิดพลาดในการอัพโหลดไฟล์';
            exit();
        }
    }

    // เตรียมคำสั่ง SQL และพารามิเตอร์ที่ต้องใช้
    switch ($type_edit) {
        case 'model':
            if ($new_img_name) {
                $query = "UPDATE model SET model_name = ?, product_type = ?, model_img = ? WHERE id_model = ?";
                $params = ['sssi', $name, $type, $new_img_name, $id];
            } else {
                $query = "UPDATE model SET model_name = ?, product_type = ? WHERE id_model = ?";
                $params = ['ssi', $name, $type, $id];
            }
            break;

        case 'description':
            if ($new_img_name) {
                $query = "UPDATE description SET description_name = ?, description_detail = ?, description_img = ?, description_type = ? WHERE id_description = ?";
                $params = ['ssssi', $name, $detail, $new_img_name, $type, $id];
            } else {
                $query = "UPDATE description SET description_name = ?, description_detail = ?, description_type = ? WHERE id_description = ?";
                $params = ['sssi', $name, $detail, $type, $id];
            }
            break;

        case 'upholstery':
            if ($new_img_name) {
                $query = "UPDATE upholstery_color SET upholstery_color_name = ?, upholstery_color_type = ?, upholstery_color_detail = ?, upholstery_color_img = ? WHERE id_upholstery = ?";
                $params = ['ssssi', $name, $type, $detail, $new_img_name, $id];
            } else {
                $query = "UPDATE upholstery_color SET upholstery_color_name = ?, upholstery_color_type = ?, upholstery_color_detail = ? WHERE id_upholstery = ?";
                $params = ['sssi', $name, $type, $detail, $id];
            }
            break;

        default:
            echo 'error: invalid type_edit';
            exit();
    }

    // ดำเนินการอัปเดตข้อมูล
    $update_data = $connect->prepare($query);
    $update_data->bind_param(...$params);
    if ($update_data->execute()) {
        echo 'success';
    } else {
        echo 'เกิดข้อผิดพลาดในการอัพเดตข้อมูล';
    }
}
?>
