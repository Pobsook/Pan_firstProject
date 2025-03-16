<?php

session_start();
require('connect.php');

$redirect_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'Home_page.php';  // กำหนดหน้า default ในกรณีที่ไม่มี referer

if(isset($_POST['price_submit'])){
    if (!isset($_SESSION['email_account']) || !isset($_SESSION['id_account'])) {
        $_SESSION['result'] = 'กรุณาล็อคอินก่อนครับ';
        header("Location: $redirect_url");
        exit();
    }elseif (isset($_SESSION['email_account']) && isset($_SESSION['id_account'])) {
        $valid_type = ['recliner_chair', 'office_chair', 'motor_chair', 'recliner_sofa', 'sofa_fix', 'motor_sofa'];
        $type_add = $_POST['price_submit'];

        if(in_array($type_add, $valid_type)){
            $session_data = $_SESSION["$type_add"];
        }
        
        if (empty($session_data['model']) || empty($session_data['description']) || empty($session_data['upholstery'])) {
            $_SESSION['result'] = 'กรุณาเลือก โมเดล, แบบ และ สีหนังให้ครบถ้วน';
            header("Location: $redirect_url");
            exit();
        } elseif(isset($session_data['model']) && isset($session_data['description']) && isset($session_data['upholstery'])) {
            $status = 1;
            $insert_selected_product = $connect -> prepare("INSERT into product(id_account, model, `description`, color, upholstery, add_on, price, status_product, quantity) VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $insert_selected_product -> bind_param('isssssiii', $_SESSION['id_account'], $session_data['model'], $session_data['description'], $session_data['color'], $session_data['upholstery'], $session_data['add_on'], $session_data['price'], $status, $session_data['quantity']);
            if($insert_selected_product -> execute()){
                $_SESSION['result'] = 'เพิ่มข้อมูลลงใน cart เรียบร้อยแล้ว';
                header("Location: $redirect_url");
                exit();
            }else{
                $_SESSION['result'] = 'ไม่สามารถเพิ่มข้อมูลลงใน cart ได้โปรดตรวจสอบความถูกต้อง';
                header("Location: $redirect_url");
                exit();
            }
        }else{
            $_SESSION['result'] = 'ไม่สามารถเพิ่มข้อมูลลงใน cart ได้โปรดตรวจสอบความถูกต้อง';
            header("Location: $redirect_url");
            exit();
        }
    }
}

if (isset($_POST['count_product']) && isset($_SESSION['id_account'])) {
    $callback_status = $connect->prepare("SELECT * FROM product WHERE id_account = ? AND status_product = 1 ");
    $callback_status->bind_param('i', $_SESSION['id_account']);
    $callback_status->execute();
    $callback_status_result = $callback_status->get_result();
    $count_status_cart = $callback_status_result->num_rows;
    if($count_status_cart > 0){
        $data = array(
            'count_status_cart' => $count_status_cart
        );
        echo json_encode($data);
    }else{
        echo 'error';
    }

}

if(isset($_POST['remove_onclick'])){
    $id_product = $_POST['product_id'];
    $delete_data = $connect -> prepare("DELETE FROM product WHERE id_product = ?");
    $delete_data -> bind_param('i', $id_product);
    if($delete_data -> execute()){
        echo 'success';
    }else{
        echo 'Error';
    }
}
