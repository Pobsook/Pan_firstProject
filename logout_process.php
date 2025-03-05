<?php 
session_start();
date_default_timezone_set('Asia/Bangkok');
require("connect.php");

// ลบค่าทั้งหมดใน $_SESSION
session_unset(); 

// เปลี่ยนเส้นทางไปยังหน้า Home_page.php
header('Location: Home_page.php');
exit();