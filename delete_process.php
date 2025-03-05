<?php 
session_start();
date_default_timezone_set('Asia/Bangkok');
require('connect.php');

if(isset($_POST['type_edit']) && isset($_POST['Iditem'])){
    $Iditem =  $_POST['Iditem'];
    $type_edit = $_POST['type_edit'];
    if($type_edit == 'model'){
        $delete = $connect -> prepare("DELETE FROM model WHERE id_model = ?");
        $delete -> bind_param('i', $Iditem);
    }elseif($type_edit == 'description'){
        $delete = $connect -> prepare("DELETE FROM description WHERE id_description = ?");
        $delete -> bind_param('i', $Iditem);
    }elseif($type_edit == 'upholstery'){
        $delete = $connect -> prepare("DELETE FROM upholstery_color WHERE id_upholstery = ?");
        $delete -> bind_param('i', $Iditem);
    }else{
        echo 'error';
    }

    if($delete -> execute()){
        echo 'success';
    }else{
        echo 'error';
    }
}