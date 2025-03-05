<?php
    session_start();
    date_default_timezone_set('Asia/Bangkok');
    require("connect.php");

    header('Content-Type: application/json'); 

    if (isset($_POST['search_item']) && isset($_POST['type_search'])) {
        $type_search = htmlspecialchars($_POST['type_search']);
        $key_search = htmlspecialchars($_POST['key_search']);
        $data = array();
        
        if ($type_search == 'model') {            
            $callback_model = $connect->prepare("SELECT * FROM model WHERE model_name LIKE ? OR product_type LIKE ?");
            $search_term = "%" . $key_search . "%";
            $callback_model->bind_param('ss', $search_term, $search_term);
            $callback_model->execute();
            $callback_model_result = $callback_model->get_result();
            
            if ($callback_model_result->num_rows > 0) {
                $rows_model = $callback_model_result->fetch_all(MYSQLI_ASSOC);
                
                foreach ($rows_model as $row) {
                    $data[] = array(
                        'id_model' => $row['id_model'],
                        'model_name' => $row['model_name'],
                        'product_type' => $row['product_type'],
                        'model_img' => $row['model_img']
                    );
                }
                echo json_encode(array('type' => 'model', 'item' => $data));  // ส่งกลับข้อมูล
            } else {
                $callback_model = $connect->prepare("SELECT * FROM model");
                $callback_model->execute();
                $callback_model_result = $callback_model->get_result();
                $rows_model = $callback_model_result->fetch_all(MYSQLI_ASSOC);
                
                $data = array();
                foreach ($rows_model as $row) {
                    $data[] = array(
                        'id_model' => $row['id_model'],
                        'model_name' => $row['model_name'],
                        'product_type' => $row['product_type'],
                        'model_img' => $row['model_img'],
                    );
                }
                echo json_encode(array('type' => 'model', 'error' => 'No results found'));
            }
            
        } elseif ($type_search == 'description') {            
            $callback_description = $connect->prepare("SELECT * FROM `description` WHERE description_name LIKE ? OR description_type LIKE ? OR description_detail LIKE ?");
            $search_term = "%" . $key_search . "%";
            $callback_description->bind_param('sss', $search_term, $search_term, $search_term);
            $callback_description->execute();
            $callback_description_result = $callback_description->get_result();
            
            if ($callback_description_result->num_rows > 0) {
                $rows_description = $callback_description_result->fetch_all(MYSQLI_ASSOC);
                
                $data = array();
                foreach ($rows_description as $row) {
                    $data[] = array(
                        'id_description' => $row['id_description'],
                        'description_name' => $row['description_name'],
                        'description_detail' => $row['description_detail'],
                        'description_type' => $row['description_type'],
                        'description_img' => $row['description_img']
                    );
                }
                echo json_encode(array('type' => 'description', 'item' => $data));
            } else {
                $callback_description = $connect->prepare("SELECT * FROM `description`");
                $callback_description->execute();
                $callback_description_result = $callback_description->get_result();
                $rows_description = $callback_description_result->fetch_all(MYSQLI_ASSOC);
                
                $data = array();
                foreach ($rows_description as $row) {
                    $data[] = array(
                        'id_description' => $row['id_description'],
                        'description_name' => $row['description_name'],
                        'description_detail' => $row['description_detail'],
                        'description_type' => $row['description_type'],
                        'description_img' => $row['description_img'],
                    );
                }
                echo json_encode(array('type' => 'description', 'item' => $data, 'error' => 'No results found'));
            }
    
        } elseif ($type_search == 'upholstery') {            
            $callback_upholstery = $connect->prepare("SELECT * FROM `upholstery_color` WHERE upholstery_color_name LIKE ? OR upholstery_color_type LIKE ? OR upholstery_color_detail LIKE ?");
            $search_term = "%" . $key_search . "%";
            $callback_upholstery->bind_param('sss', $search_term, $search_term, $search_term);
            $callback_upholstery->execute();
            $callback_upholstery_result = $callback_upholstery->get_result();
            
            if ($callback_upholstery_result->num_rows > 0) {
                $rows_upholstery = $callback_upholstery_result->fetch_all(MYSQLI_ASSOC);
                
                $data = array();
                foreach ($rows_upholstery as $row) {
                    $data[] = array(
                        'id_upholstery' => $row['id_upholstery'],
                        'upholstery_color_name' => $row['upholstery_color_name'],
                        'upholstery_color_type' => $row['upholstery_color_type'],
                        'upholstery_color_detail' => $row['upholstery_color_detail'],
                        'upholstery_color_img' => $row['upholstery_color_img'],
                    );
                }
                echo json_encode(array('type' => 'upholstery', 'item' => $data));
            } else {
                $callback_upholstery = $connect->prepare("SELECT * FROM upholstery");
                $callback_upholstery->execute();
                $callback_upholstery_result = $callback_upholstery->get_result();
                $rows_upholstery = $callback_upholstery_result->fetch_all(MYSQLI_ASSOC);
                
                $data = array();
                foreach ($rows_upholstery as $row) {
                    $data[] = array(
                        'id_upholstery' => $row['id_upholstery'],
                        'upholstery_color_name' => $row['upholstery_color_name'],
                        'upholstery_color_type' => $row['upholstery_color_type'],
                        'upholstery_color_detail' => $row['upholstery_color_detail'],
                        'upholstery_color_img' => $row['upholstery_color_img'],
                    );
                }
                echo json_encode(array('type' => 'upholstery', 'item' => $data, 'error' => 'No results found'));
            }
        }else{
            echo json_encode(array('error' => 'Invalid type_search or key_search'));
        }
    }else{
        echo json_encode(array('error' => 'Error processing request: ' . $e->getMessage()));
    }
    