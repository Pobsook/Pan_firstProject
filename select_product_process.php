<?php
session_start();
require('connect.php');

if (
    isset($_POST['select_model_rc']) || isset($_POST['select_description_rc']) || isset($_POST['select_upholstery_rc']) || isset($_POST['quantityIndex_re_ch']) || 
    isset($_POST['select_model_oc']) || isset($_POST['select_description_oc']) || isset($_POST['select_upholstery_oc']) || isset($_POST['quantityIndex_oc']) || 
    isset($_POST['select_model_mc']) || isset($_POST['select_description_mc']) || isset($_POST['select_upholstery_mc']) || isset($_POST['quantityIndex_mc']) ||
    isset($_POST['select_model_rs']) || isset($_POST['select_description_rs']) || isset($_POST['select_upholstery_rs']) || isset($_POST['quantityIndex_rs']) || 
    isset($_POST['select_model_sf']) || isset($_POST['select_description_sf']) || isset($_POST['select_upholstery_sf']) || isset($_POST['quantityIndex_sf']) || 
    isset($_POST['select_model_ms']) || isset($_POST['select_description_ms']) || isset($_POST['select_upholstery_ms']) || isset($_POST['quantityIndex_ms'])
) {
    // Recliner Chair
    if (isset($_POST['slideIndexRC'])) {
        $_SESSION['recliner_chair']['slideIndexRC'] = $_POST['slideIndexRC'];
    }
    if (isset($_POST['select_model_rc'])) {
        $_SESSION['recliner_chair']['model'] = $_POST['select_model_rc'];
    }
    if (isset($_POST['select_description_rc'])) {
        $_SESSION['recliner_chair']['description'] = $_POST['select_description_rc'];
    }
    if (isset($_POST['select_upholstery_rc'])) {
        $_SESSION['recliner_chair']['upholstery'] = $_POST['select_upholstery_rc'];
    }
    if (isset($_POST['quantityIndex_re_ch'])) {
        $_SESSION['recliner_chair']['quantity'] = intval($_POST['quantityIndex_re_ch']);
    }
    if (!isset($_POST['quantityIndex_re_ch']) && empty($_SESSION['recliner_chair']['quantity'])) {
        $_SESSION['recliner_chair']['quantity'] = 1;
    }

    // Office Chair
    if (isset($_POST['slideIndexOC'])) {
        $_SESSION['office_chair']['slideIndexOC'] = $_POST['slideIndexOC'];
    }
    if (isset($_POST['select_model_oc'])) {
        $_SESSION['office_chair']['model'] = $_POST['select_model_oc'];
    }
    if (isset($_POST['select_description_oc'])) {
        $_SESSION['office_chair']['description'] = $_POST['select_description_oc'];
    }
    if (isset($_POST['select_upholstery_oc'])) {
        $_SESSION['office_chair']['upholstery'] = $_POST['select_upholstery_oc'];
    }
    if (isset($_POST['quantityIndex_oc'])) {
        $_SESSION['office_chair']['quantity'] = intval($_POST['quantityIndex_oc']);
    }
    if (!isset($_POST['quantityIndex_oc']) && empty($_SESSION['office_chair']['quantity'])) {
        $_SESSION['office_chair']['quantity'] = 1;
    }

    // Motor Chair
    if (isset($_POST['slideIndexMC'])) {
        $_SESSION['motor_chair']['slideIndexMC'] = $_POST['slideIndexMC'];
    }
    if (isset($_POST['select_model_mc'])) {
        $_SESSION['motor_chair']['model'] = $_POST['select_model_mc'];
    }
    if (isset($_POST['select_description_mc'])) {
        $_SESSION['motor_chair']['description'] = $_POST['select_description_mc'];
    }
    if (isset($_POST['select_upholstery_mc'])) {
        $_SESSION['motor_chair']['upholstery'] = $_POST['select_upholstery_mc'];
    }
    if (isset($_POST['quantityIndex_mc'])) {
        $_SESSION['motor_chair']['quantity'] = intval($_POST['quantityIndex_mc']);
    }
    if (!isset($_POST['quantityIndex_mc']) && empty($_SESSION['motor_chair']['quantity'])) {
        $_SESSION['motor_chair']['quantity'] = 1;
    }

        // Recliner Sofa (RS)
        if (isset($_POST['slideIndexRS'])) {
            $_SESSION['recliner_sofa']['slideIndexRS'] = $_POST['slideIndexRS'];
        }
        if (isset($_POST['select_model_rs'])) {
            $_SESSION['recliner_sofa']['model'] = $_POST['select_model_rs'];
        }
        if (isset($_POST['select_description_rs'])) {
            $_SESSION['recliner_sofa']['description'] = $_POST['select_description_rs'];
        }
        if (isset($_POST['select_upholstery_rs'])) {
            $_SESSION['recliner_sofa']['upholstery'] = $_POST['select_upholstery_rs'];
        }
        if (isset($_POST['quantityIndex_rs'])) {
            $_SESSION['recliner_sofa']['quantity'] = intval($_POST['quantityIndex_rs']);
        }
        if (!isset($_POST['quantityIndex_rs']) && empty($_SESSION['recliner_sofa']['quantity'])) {
            $_SESSION['recliner_sofa']['quantity'] = 1;
        }
    
        // Sofa Fix (SF)
        if (isset($_POST['slideIndexSF'])) {
            $_SESSION['sofa_fix']['slideIndexSF'] = $_POST['slideIndexSF'];
        }
        if (isset($_POST['select_model_sf'])) {
            $_SESSION['sofa_fix']['model'] = $_POST['select_model_sf'];
        }
        if (isset($_POST['select_description_sf'])) {
            $_SESSION['sofa_fix']['description'] = $_POST['select_description_sf'];
        }
        if (isset($_POST['select_upholstery_sf'])) {
            $_SESSION['sofa_fix']['upholstery'] = $_POST['select_upholstery_sf'];
        }
        if (isset($_POST['quantityIndex_sf'])) {
            $_SESSION['sofa_fix']['quantity'] = intval($_POST['quantityIndex_sf']);
        }
        if (!isset($_POST['quantityIndex_sf']) && empty($_SESSION['sofa_fix']['quantity'])) {
            $_SESSION['sofa_fix']['quantity'] = 1;
        }
    
        // Motor Sofa (MS)
        if (isset($_POST['slideIndexMS'])) {
            $_SESSION['motor_sofa']['slideIndexMS'] = $_POST['slideIndexMS'];
        }
        if (isset($_POST['select_model_ms'])) {
            $_SESSION['motor_sofa']['model'] = $_POST['select_model_ms'];
        }
        if (isset($_POST['select_description_ms'])) {
            $_SESSION['motor_sofa']['description'] = $_POST['select_description_ms'];
        }
        if (isset($_POST['select_upholstery_ms'])) {
            $_SESSION['motor_sofa']['upholstery'] = $_POST['select_upholstery_ms'];
        }
        if (isset($_POST['quantityIndex_ms'])) {
            $_SESSION['motor_sofa']['quantity'] = intval($_POST['quantityIndex_ms']);
        }
        if (!isset($_POST['quantityIndex_ms']) && empty($_SESSION['motor_sofa']['quantity'])) {
            $_SESSION['motor_sofa']['quantity'] = 1;
        }

    echo 'เก็บข้อมูลสำเร็จ';
}

// ส่งข้อมูลเซสชันที่เก็บไว้
if (isset($_POST['get_session_data'])) {
    $data = array(
        'model_rc' => $_SESSION['recliner_chair']['model'] ?? '',
        'description_rc' => $_SESSION['recliner_chair']['description'] ?? '',
        'upholstery_rc' => $_SESSION['recliner_chair']['upholstery'] ?? '',
        'slideIndexRC' => $_SESSION['recliner_chair']['slideIndexRC'] ?? 1,
        'quantity_rc' => $_SESSION['recliner_chair']['quantity'] ?? 1,

        'model_oc' => $_SESSION['office_chair']['model'] ?? '',
        'description_oc' => $_SESSION['office_chair']['description'] ?? '',
        'upholstery_oc' => $_SESSION['office_chair']['upholstery'] ?? '',
        'slideIndexOC' => $_SESSION['office_chair']['slideIndexOC'] ?? 1,
        'quantity_oc' => $_SESSION['office_chair']['quantity'] ?? 1,

        'model_mc' => $_SESSION['motor_chair']['model'] ?? '',
        'description_mc' => $_SESSION['motor_chair']['description'] ?? '',
        'upholstery_mc' => $_SESSION['motor_chair']['upholstery'] ?? '',
        'slideIndexMC' => $_SESSION['motor_chair']['slideIndexMC'] ?? 1,
        'quantity_mc' => $_SESSION['motor_chair']['quantity'] ?? 1,

        'model_rs' => $_SESSION['recliner_sofa']['model'] ?? '',
        'description_rs' => $_SESSION['recliner_sofa']['description'] ?? '',
        'upholstery_rs' => $_SESSION['recliner_sofa']['upholstery'] ?? '',
        'slideIndexRS' => $_SESSION['recliner_sofa']['slideIndexRS'] ?? 1,
        'quantity_rs' => $_SESSION['recliner_sofa']['quantity'] ?? 1,

        'model_sf' => $_SESSION['sofa_fix']['model'] ?? '',
        'description_sf' => $_SESSION['sofa_fix']['description'] ?? '',
        'upholstery_sf' => $_SESSION['sofa_fix']['upholstery'] ?? '',
        'slideIndexSF' => $_SESSION['sofa_fix']['slideIndexSF'] ?? 1,
        'quantity_sf' => $_SESSION['sofa_fix']['quantity'] ?? 1,

        'model_ms' => $_SESSION['motor_sofa']['model'] ?? '',
        'description_ms' => $_SESSION['motor_sofa']['description'] ?? '',
        'upholstery_ms' => $_SESSION['motor_sofa']['upholstery'] ?? '',
        'slideIndexMS' => $_SESSION['motor_sofa']['slideIndexMS'] ?? 1,
        'quantity_ms' => $_SESSION['motor_sofa']['quantity'] ?? 1
        
    );
    echo json_encode($data);
}
?>
