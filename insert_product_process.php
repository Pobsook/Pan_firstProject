<?php
    session_start();
    date_default_timezone_set('Asia/Bangkok');
    require("connect.php");

    if(isset($_POST['model_name']) || isset($_POST['description_name']) || isset($_POST['color_name']) || isset($_POST['add_on_name']) || isset($_POST['upholstery_color_name']) && isset($_POST['product_check_box'])){
        if(!empty($_POST['model_name']) && !empty($_FILES['model_img']) && isset($_FILES['model_img']) && isset($_POST['product_check_box'])){
            $model_name = $_POST['model_name'];
            $products_type = $_POST['product_check_box'];
            $model_img_name = $_FILES['model_img']['name'];
            $model_img_tmp = $_FILES['model_img']['tmp_name'];
            $img_model_location = 'PicZedere/upload_model_img/' . $model_img_name;
    
            $callback_model = $connect -> prepare("SELECT * FROM model WHERE model_name = ?");
            $callback_model -> bind_param('s', $model_name);
            $callback_model -> execute();
            $callback_model_result = $callback_model -> get_result();
            $rows_model = $callback_model_result -> fetch_assoc();
            $callback_product_type = $rows_model['product_type'];
            if ($callback_model_result -> num_rows > 0) {
                $rows_model = $callback_model_result -> fetch_assoc();
                $callback_product_type = $rows_model['product_type'];
                foreach ($products_type as $product) {
                    if ($product ==  $callback_product_type) {
                        $_SESSION['result'] = "$model_name มีข้อมูลประเภทนี้อยู่ในระบบแล้ว";
                        header('location: Admin_page.php');
                        exit();
                    }else {
                        move_uploaded_file($model_img_tmp, $img_model_location);
                        $insert_model = $connect -> prepare("INSERT INTO model(model_name, product_type, model_img) VALUES(?, ?, ?)");
                        $insert_model -> bind_param('sss', $model_name, $product, $model_img_name);
                        if($insert_model -> execute()){
                            $_SESSION['result'] = 'ข้อมูลถูกเพิ่มสำเร็จ';
                            header('location: Admin_page.php');
                            exit();
                        }else{
                            $_SESSION['result'] = 'เกิดข้อผิดพลาดในการเพิ่มข้อมูล';
                            header('location: Admin_page.php');
                            exit();
                        }    
                    }
                }
            }else {
                move_uploaded_file($model_img_tmp, $img_model_location);
                foreach ($products_type as $product) {
                    $insert_model = $connect -> prepare("INSERT INTO model(model_name, product_type, model_img) VALUES(?, ?, ?)");
                    $insert_model -> bind_param('sss', $model_name, $product, $model_img_name);
                    if($insert_model -> execute()){
                        $_SESSION['result'] = 'ข้อมูลถูกเพิ่มสำเร็จ';
                        header('location: Admin_page.php');
                        exit();
                    }else{
                        $_SESSION['result'] = 'เกิดข้อผิดพลาดในการเพิ่มข้อมูล';
                        header('location: Admin_page.php');
                        exit();
                    }
                }
            }

        }elseif(!empty($_POST['description_name']) && !empty($_POST['price'])){
            $description_name = $_POST['description_name'];
            $description_detail = $_POST['description_detail'];
            $price = $_POST['price'];
            $description_img_name = $_FILES['description_img']['name'];
            $description_img_tmp = $_FILES['description_img']['tmp_name'];
            $img_description_location = 'PicZedere/upload_description_img/' . $description_img_name;

            $callback_description_name = $connect -> prepare("SELECT description_name FROM description WHERE description_name = ?");
            $callback_description_name -> bind_param('s', $description_name);
            $callback_description_name -> execute();
            $callback_description_name_result = $callback_description_name -> get_result();
            if($callback_description_name_result -> num_rows > 0){
                $_SESSION['result'] = "$description_name มีข้อมูลอยู่ในระบบแล้ว";
                header('location: Admin_page.php');
                exit();
            }else{
                $insert_description = $connect -> prepare("INSERT INTO description(description_name, description_detail, description_img, price) VALUES(?, ?, ?, ?)");
                $insert_description -> bind_param('sssi', $description_name, $description_detail, $description_img_name, $price);
                move_uploaded_file($description_img_tmp, $img_description_location);
                if($insert_description -> execute()){
                    $_SESSION['result'] = 'ข้อมูลถูกเพิ่มสำเร็จ';
                    header('location: Admin_page.php');
                    exit();
                }else{
                    $_SESSION['result'] = 'เกิดข้อผิดพลาดในการเพิ่มข้อมูล';
                    header('location: Admin_page.php');
                    exit();
                }
            }
        }elseif(!empty($_POST['color_name']) && !empty($_FILES['color_img']) && isset($_FILES['color_img'])){
            $color_name = $_POST['color_name'];
            $color_detail = $_POST['color_detail'];
            $color_img_name = $_FILES['color_img']['name'];
            $color_img_tmp = $_FILES['color_img']['tmp_name'];
            $color_img_location = 'PicZedere/upload_color_img/' . $color_img_name;

            $callback_color_name = $connect -> prepare("SELECT color_name FROM color WHERE color_name = ?");
            $callback_color_name -> bind_param('s', $color_name);
            $callback_color_name -> execute();
            $callback_color_name_result = $callback_color_name -> get_result();
            if($callback_color_name_result -> num_rows > 0){
                $_SESSION['result'] = "$color_name มีข้อมูลอยู่ในระบบแล้ว";
                header('location: Admin_page.php');
                exit();
            }else{
                if(move_uploaded_file($color_img_tmp, $color_img_location)){
                    $insert_color = $connect -> prepare("INSERT INTO color(color_name, color_detail, color_img) VALUES (?, ?, ?)");
                    $insert_color -> bind_param('sss', $color_name, $color_detail, $color_img_name);
                    $insert_color -> execute();
                    $_SESSION['result'] = 'ข้อมูลถูกเพิ่มสำเร็จ';
                    header('location: Admin_page.php');
                    exit();
                }else{
                    $_SESSION['result'] = 'เกิดข้อผิดพลาดในการเพิ่มข้อมูล';
                    header('location: Admin_page.php');
                    exit();
                }
            }
        }elseif(!empty($_POST['add_on_name'])){
            $add_on_name = $_POST['add_on_name'];
            $add_on_detail = $_POST['add_on_detail'];
            $add_on_img_name = $_FILES['add_on_img']['name'];
            $add_on_img_tmp = $_FILES['add_on_img']['tmp_name'];
            $img_add_on_location = 'PicZedere/upload_add_on_img/' . $add_on_name;

            $callback_add_on_name = $connect -> prepare("SELECT add_on_name FROM add_on WHERE add_on_name = ?");
            $callback_add_on_name -> bind_param('s', $add_on_name);
            $callback_add_on_name -> execute();
            $callback_add_on_name_result = $callback_add_on_name -> get_result();
            if($callback_add_on_name_result -> num_rows > 0){
                $_SESSION['result'] = "$add_on_name มีข้อมูลอยู่ในระบบแล้ว";
                header('location: Admin_page.php');
                exit();
            }else{
                $insert_add_on = $connect -> prepare("INSERT INTO add_on(add_on_name, add_on_detail, add_on_img) VALUES(?, ?, ?)");
                $insert_add_on -> bind_param('sss', $add_on_name, $add_on_detail, $add_on_img_name);
                move_uploaded_file($add_on_img_tmp, $img_add_on_location);
                if($insert_add_on -> execute()){
                    $_SESSION['result'] = 'ข้อมูลถูกเพิ่มสำเร็จ';
                    header('location: Admin_page.php');
                    exit();
                }else{
                    $_SESSION['result'] = 'เกิดข้อผิดพลาดในการเพิ่มข้อมูล';
                    header('location: Admin_page.php');
                    exit();
                }
            }
        }elseif(!empty($_POST['upholstery_color_name']) && !empty($_FILES['upholstery_color_img']) && isset($_FILES['upholstery_color_img']) && isset($_FILES['upholstery_color_img'])){
            $upholstery_color_name = $_POST['upholstery_color_name'];
            $upholstery_color_type = $_POST['upholstery_type'];
            $upholstery_color_detail = $_POST['upholstery_color_detail'];
            $upholstery_color_img_name = $_FILES['upholstery_color_img']['name'];
            $upholstery_color_img_tmp = $_FILES['upholstery_color_img']['tmp_name'];
            $img_upholstery_color_location = 'PicZedere/upload_upholstery_color_img/' . $upholstery_color_img_name;
            
            $callback_upholstery_color_name = $connect -> prepare("SELECT upholstery_color_name FROM upholstery_color WHERE upholstery_color_name = ?");
            $callback_upholstery_color_name -> bind_param('s', $upholstery_color_name);
            $callback_upholstery_color_name -> execute();
            $callback_upholstery_color_name_result = $callback_upholstery_color_name -> get_result();
            if($callback_upholstery_color_name_result -> num_rows > 0){
                $_SESSION['result'] = "$upholstery_color_name มีข้อมูลอยู่ในระบบแล้ว";
                header('location: Admin_page.php');
                exit();
            }else{
                if(move_uploaded_file($upholstery_color_img_tmp, $img_upholstery_color_location)){
                    $insert_upholstery_color = $connect -> prepare("INSERT INTO upholstery_color(upholstery_color_name, upholstery_color_type, upholstery_color_detail, upholstery_color_img) VALUES(?, ?, ?, ?)");
                    $insert_upholstery_color -> bind_param('ssss', $upholstery_color_name, $upholstery_color_type, $upholstery_color_detail, $upholstery_color_img_name);
                    $insert_upholstery_color -> execute();
                    if($insert_upholstery_color -> affected_rows > 0){
                        $_SESSION['result'] = 'ข้อมูลถูกเพิ่มสำเร็จ';
                        header('location: Admin_page.php');
                        exit();
                    }else{
                        $_SESSION['result'] = 'เกิดข้อผิดพลาดในการเพิ่มข้อมูล';
                        header('location: Admin_page.php');
                        exit();
                    }
                }else{
                    $_SESSION['result'] = 'เกิดข้อผิดพลาดในการเพิ่มข้อมูล';
                    header('location: Admin_page.php');
                    exit();
                }
            }
        }else{
            $_SESSION['result'] = 'การกรอกข้อมูลไม่ตรงตามเงื่อนไข';
            header('location: Admin_page.php');
            exit();
        }
    }else{
        $_SESSION['result'] = 'กรุณากรอกข้อมูลให้ครบถ้วน';
        header('location: Admin_page.php');
        exit();
    }