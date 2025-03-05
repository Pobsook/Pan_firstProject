<?php
    session_start();
    date_default_timezone_set('Asia/Bangkok');
    require("connect.php");

if (isset($_POST['edit_onclick'])) {
        $id = $_POST['id'];
        $type_edit = $_POST['type_edit'];
        $name = htmlspecialchars($_POST['name']);
        $type = htmlspecialchars($_POST['type']);
        $detail = htmlspecialchars($_POST['detail']);
        
        if (isset($_FILES['file_img']) && $_FILES['file_img']['error'] == 0) {
            $img_name = $_FILES['file_img']['name'];
            $img_tmp = $_FILES['file_img']['tmp_name'];
            
            $allowed_types = ['image/png', 'image/jpg', 'image/jpeg'];
            $new_img_name = time() . '_' . basename($img_name);
    
            if ($type_edit == 'model') {
                $location_file = 'PicZedere/upload_model_img/' . $new_img_name;
                move_uploaded_file($img_tmp, $location_file);
                $update_data = $connect->prepare("UPDATE model SET model_name = ?, product_type = ?, model_img = ? WHERE id_model = ?");
                $update_data->bind_param('sssi', $name, $type, $new_img_name, $id);
                $update_data->execute();
                echo 'success';
                exit();    
            } elseif ($type_edit == 'description') {
                $location_file = 'PicZedere/upload_description_img/' . $new_img_name;
                move_uploaded_file($img_tmp, $location_file);
                $update_data = $connect->prepare("UPDATE description SET description_name = ?, description_detail = ?, description_img = ?, description_type = ? WHERE id_description = ?");
                $update_data->bind_param('ssssi', $name, $detail, $new_img_name, $type, $id);
                $update_data->execute();
                echo 'success';
                exit();
            } elseif ($type_edit == 'upholstery') {
                $location_file = 'PicZedere/upload_upholstery_color_img/' . $new_img_name;
                move_uploaded_file($img_tmp, $location_file);
                $update_data = $connect->prepare("UPDATE upholstery_color SET upholstery_color_name = ?, upholstery_color_type = ?, upholstery_color_detail = ?, upholstery_color_img = ? WHERE id_upholstery = ?");
                $update_data->bind_param('ssssi', $name, $type, $detail, $new_img_name, $id);
                $update_data->execute();
                echo 'success';
                exit();
            } else {
                echo 'error: invalid type_edit';
                exit();
            }
    
            if (!move_uploaded_file($img_tmp, $location_file)) {
                echo 'เกิดข้อผิดพลาดในการอัพโหลดไฟล์';
                exit();
            }
        }
    
        if ($type_edit == 'model') {
            $update_data = $connect->prepare("UPDATE model SET model_name = ?, product_type = ? WHERE id_model = ?");
            $update_data->bind_param('ssi', $name, $type, $id);
        } elseif ($type_edit == 'description') {
            $update_data = $connect->prepare("UPDATE description SET description_name = ?, description_detail = ?, description_type = ? WHERE id_description = ?");
            $update_data->bind_param('sssi', $name, $detail, $type, $id);
        } elseif ($type_edit == 'upholstery') {
            $update_data = $connect->prepare("UPDATE upholstery_color SET upholstery_color_name = ?, upholstery_color_type = ?, upholstery_color_detail = ? WHERE id_upholstery = ?");
            $update_data->bind_param('sssi', $name, $type, $detail, $id);
        } else {
            echo 'error: invalid type_edit';
            exit;
        }
    
        if ($update_data->execute()) {
            echo 'success';
        } else {
            echo 'เกิดข้อผิดพลาดในการอัพเดตข้อมูล';
        }
    }
    