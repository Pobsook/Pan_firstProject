<?php
session_start();
require('connect.php');

if (isset($_POST['get_price'])) {
    $description_rs = $_POST['description_rs'] ?? '';
    $upholstery_rs = $_POST['upholstery_rs'] ?? '';
    $description_sf = $_POST['description_sf'] ?? '';
    $upholstery_sf = $_POST['upholstery_sf'] ?? '';
    $description_ms = $_POST['description_ms'] ?? '';
    $upholstery_ms = $_POST['upholstery_ms'] ?? '';

    // ตั้งค่าราคาเริ่มต้นป้องกัน JSON encode error
    $price_rs = 0;
    $price_sf = 0;
    $price_ms = 0;


    // ดึงราคาของ recliner sofa
    $callback_price_rs = $connect->prepare("SELECT price FROM description WHERE description_name = ?");
    $callback_price_rs->bind_param('s', $description_rs);
    $callback_price_rs->execute();
    $callback_price_rs_result = $callback_price_rs->get_result();
    $row_price_rs = $callback_price_rs_result->fetch_assoc();

    // ดึงประเภทของ upholstery สำหรับ recliner sofa
    $callback_type_rs = $connect->prepare("SELECT upholstery_color_type FROM upholstery_color WHERE upholstery_color_name = ?");
    $callback_type_rs->bind_param('s', $upholstery_rs);
    $callback_type_rs->execute();
    $callback_type_color_rs = $callback_type_rs->get_result();
    $row_type_rs = $callback_type_color_rs->fetch_assoc();

    // ดึงราคาของ sofa fix
    $callback_price_sf = $connect->prepare("SELECT price FROM description WHERE description_name = ?");
    $callback_price_sf->bind_param('s', $description_sf);
    $callback_price_sf->execute();
    $callback_price_sf_result = $callback_price_sf->get_result();
    $row_price_sf = $callback_price_sf_result->fetch_assoc();

    // ดึงประเภทของ upholstery สำหรับ sofa fix
    $callback_type_sf = $connect->prepare("SELECT upholstery_color_type FROM upholstery_color WHERE upholstery_color_name = ?");
    $callback_type_sf->bind_param('s', $upholstery_sf);
    $callback_type_sf->execute();
    $callback_type_color_sf = $callback_type_sf->get_result();
    $row_type_sf = $callback_type_color_sf->fetch_assoc();

    // ดึงราคาของ motor sofa
    $callback_price_ms = $connect->prepare("SELECT price FROM description WHERE description_name = ?");
    $callback_price_ms->bind_param('s', $description_ms);
    $callback_price_ms->execute();
    $callback_price_ms_result = $callback_price_ms->get_result();
    $row_price_ms = $callback_price_ms_result->fetch_assoc();

    // ดึงประเภทของ upholstery สำหรับ motor sofa
    $callback_type_ms = $connect->prepare("SELECT upholstery_color_type FROM upholstery_color WHERE upholstery_color_name = ?");
    $callback_type_ms->bind_param('s', $upholstery_ms);
    $callback_type_ms->execute();
    $callback_type_color_ms = $callback_type_ms->get_result();
    $row_type_ms = $callback_type_color_ms->fetch_assoc();

    // คำนวณราคาของ recliner sofa
    if (!empty($row_price_rs) && !empty($row_type_rs)) {
        if ($row_type_rs['upholstery_color_type'] == 'centurian_leather') {
            $price_rs = ($row_price_rs['price'] * 1.2) * $_SESSION['recliner_sofa']['quantity'];
        } elseif ($row_type_rs['upholstery_color_type'] == 'natural_leather') {
            $price_rs = $row_price_rs['price'] * $_SESSION['recliner_sofa']['quantity'];
        }
        $_SESSION['recliner_sofa']['price'] = $price_rs;
    }

    // คำนวณราคาของ sofa fix
    if (!empty($row_price_sf) && !empty($row_type_sf)) {
        if ($row_type_sf['upholstery_color_type'] == 'centurian_leather') {
            $price_sf = ($row_price_sf['price'] * 1.2) * $_SESSION['sofa_fix']['quantity'];
        } elseif ($row_type_sf['upholstery_color_type'] == 'natural_leather') {
            $price_sf = $row_price_sf['price'] * $_SESSION['sofa_fix']['quantity'];
        }
        $_SESSION['sofa_fix']['price'] = $price_sf;
    }

    // คำนวณราคาของ motor sofa
    if (!empty($row_price_ms) && !empty($row_type_ms)) {
        if ($row_type_ms['upholstery_color_type'] == 'centurian_leather') {
            $price_ms = ($row_price_ms['price'] * 1.2) * $_SESSION['motor_sofa']['quantity'];
        } elseif ($row_type_ms['upholstery_color_type'] == 'natural_leather') {
            $price_ms = $row_price_ms['price'] * $_SESSION['motor_sofa']['quantity'];
        }
        $_SESSION['motor_sofa']['price'] = $price_ms;
    }

    echo json_encode(array(
        'price_rs' => $price_rs,
        'price_sf' => $price_sf,
        'price_ms' => $price_ms,
    ));
}
?>
