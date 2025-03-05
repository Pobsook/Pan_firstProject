<?php
    require("connect.php");
    session_start();

if(isset($_POST['username_account'], $_POST['email_account'], $_POST['password_account1'], $_POST['password_account2'])){
    if(empty($_POST['username_account']) || empty($_POST['email_account']) || empty($_POST['password_account1']) || empty($_POST['password_account2'])){
        $_SESSION['result'] = 'กรุณากรอกข้อมูลให้ครบถ้วน';
        header('Location: Home_page.php');
        exit();
    }else{
        $username_account = htmlspecialchars($_POST['username_account']);
        $email_account = htmlspecialchars($_POST['email_account']);
        $password_account1 = htmlspecialchars($_POST['password_account1']);
        $password_account2 = htmlspecialchars($_POST['password_account2']);
        $callback_email_account = $connect -> prepare("SELECT * FROM account WHERE email_account = ? ");
        $callback_email_account -> bind_param('s', $email_account);
        $callback_email_account -> execute();
        $rows = $callback_email_account -> get_result();
        if (filter_var($email_account, FILTER_VALIDATE_EMAIL) === false) {
            $_SESSION['result'] = 'รูปแบบอีเมล์ไม่ถูกต้อง';
            header('Location: Home_page.php');
            exit();
        }elseif($rows -> num_rows != 0){
            $_SESSION['result'] = 'emailนี้มีการใช้งานแล้ว';
            header('Location: Home_page.php');
            exit();
        }elseif($password_account1 == $password_account2){
            $password_account = password_hash($password_account1, PASSWORD_ARGON2ID);
            $insert_account = $connect -> prepare("INSERT INTO account(username_account, email_account, role_account, password_account, image_account) VALUES (?, ?, user, ?, '')");
            $insert_account -> bind_param('sss', $username_account, $email_account, $password_account);
            if($insert_account -> execute()){
                $_SESSION['result'] = 'การสมัครสมาชิกสำเร็จ';
                header('Location: Home_page.php');
                exit();
            }else{
                $_SESSION['result'] = 'การสมัครสมาชิกล้มเหลว';
                header('Location: Home_page.php');
                exit();
            }
        }else{
            $_SESSION['result'] = 'passwordไม่ตรงกัน';
            header('Location: Home_page.php');
            exit();
        }
    }
}else{
    $_SESSION['result'] = 'กรุณากรอกข้อมูลให้ครบถ้วน';
    header('Location: Home_page.php');
    exit();
}

?>