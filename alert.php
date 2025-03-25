<?php
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    
    if (isset($_SESSION['result'])) {
        $message = $_SESSION['result'];
        
        if ($message == 'การสมัครสมาชิกสำเร็จ' || $message == 'เข้าสู่ระบบสำเร็จ' || 
            $message == 'ข้อมูลถูกเพิ่มสำเร็จ' || $message == 'เพิ่มข้อมูลลงใน cart เรียบร้อยแล้ว') {
            echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'สำเร็จ!',
                    text: '$message'
                });
            </script>";
        } elseif ($message == 'ยืนยันการสั่งซื้อ') {
            echo "<script>
                Swal.fire({
                    title: 'ยืนยันการสั่งซื้อ?',
                    text: 'คุณต้องการซื้อสินค้าที่เลือกไว้หรือไม่?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#28a745',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'ซื้อเลย!',
                    cancelButtonText: 'ยกเลิก'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'buy_process.php'; // เปลี่ยนไปหน้าซื้อสินค้า
                    }
                });
            </script>";
        } else {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '$message'
                });
            </script>";
        }
        
        unset($_SESSION['result']);
    }
?>
