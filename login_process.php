<?php 
session_start();
date_default_timezone_set('Asia/Bangkok');
require("connect.php");

if(isset($_POST['email_account']) && isset($_POST['password_account'])){
    if(empty($_POST['email_account']) || empty($_POST['password_account'])){
        $_SESSION['result'] = 'กรุณากรอกข้อมูลให้ครบถ้วน';
        header('Location: Home_page.php');
        exit();
    }else{
        $email_account = htmlspecialchars($_POST['email_account']);
        $password_account = htmlspecialchars($_POST['password_account']);
        $callback = $connect -> prepare("SELECT * FROM account WHERE email_account = ? ");
        $callback -> bind_param('s', $email_account);
        $callback -> execute();
        $callback_get_result = $callback -> get_result();
        if($callback_get_result -> num_rows == 1){
            $rows = $callback_get_result -> fetch_assoc();
            $callback_id_account = $rows['id_account'];
            $callback_username_account = $rows['username_account'];
            $callback_email_account = $rows['email_account'];
            $callback_password_account = $rows['password_account'];
            $callback_login_count_account = $rows['login_count_account'];
            $callback_lock_account = $rows['lock_account'];
            $callback_ban_account = $rows['ban_account'];
            $callback_role = $rows['role_account'];
            $time_duration = 30 * pow(2, $callback_lock_account-1);
            $time_duration_show = 30 * pow(2, $callback_lock_account);
            $cooldown_ban = (strtotime($callback_ban_account) + $time_duration) - time();
            if($callback_lock_account > 0 && time() < strtotime($callback_ban_account) + $time_duration){
                $_SESSION['result'] = "บัญชีของท่านถูกระงับการใช้งานชั่วคราว โปรดรออีก $cooldown_ban วินาที";
                header('Location: Home_page.php');
                exit();
            }elseif(password_verify($password_account, $callback_password_account)){
                $update_database = $connect -> prepare("UPDATE account SET login_count_account = 0, lock_account = 0, ban_account = NULL WHERE email_account = ?");
                $update_database -> bind_param('s', $email_account);
                $update_database -> execute();
                if($callback_role == 'Admin'){
                    $_SESSION['role'] = $callback_role;
                    $_SESSION['email_account'] = $email_account;
                    $_SESSION['id_account'] = $callback_id_account;
                    $_SESSION['username'] = $callback_username_account;
                    $_SESSION['result'] = 'เข้าสู่ระบบสำเร็จ';
                    header('Location: admin_page.php');
                    exit();
                }else{
                    $_SESSION['role'] = $callback_role;
                    $_SESSION['email_account'] = $email_account;
                    $_SESSION['id_account'] = $callback_id_account;
                    $_SESSION['username'] = $callback_username_account;
                    $_SESSION['result'] = 'เข้าสู่ระบบสำเร็จ';
                    header('Location: Home_page.php');
                    exit();
                }
            }else{
                $new_callback_login_count_account = $callback_login_count_account + 1;
                if($new_callback_login_count_account == 3){
                    $new_lock_account = $callback_lock_account + 1;
                    $update_fail_login_3time = $connect -> prepare("UPDATE account SET login_count_account = 0, lock_account = ?, ban_account = NOW() WHERE email_account = ? ");
                    $update_fail_login_3time -> bind_param('is', $new_lock_account, $email_account);
                    $update_fail_login_3time -> execute();
                    $_SESSION['result'] = "บัญชีถูกระงับการใช้งานชั่วคราว เป็นเวลา $time_duration_show วินาที";
                    header('Location: Home_page.php');
                    exit();
                }else{
                    $update_fail_login = $connect -> prepare("UPDATE account SET login_count_account = ? WHERE email_account = ? ");
                    $update_fail_login -> bind_param('is', $new_callback_login_count_account, $email_account);
                    $update_fail_login -> execute();
                    $_SESSION['result'] = "คุณกรอกอีเมล์หรือรหัสผ่านผิดพลาด";
                    header('Location: Home_page.php');
                    exit();
                }
            }            
        }else{
            $_SESSION['result'] = 'คุณกรอกอีเมล์หรือรหัสผ่านผิดพลาด';
            header('Location: Home_page.php');
            exit();
        }
    }
}else{
    $_SESSION['result'] = 'กรุณากรอกข้อมูลให้ครบถ้วน';
        header('Location: Home_page.php');
        exit();
}