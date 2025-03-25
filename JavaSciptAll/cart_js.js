document.addEventListener("DOMContentLoaded", function () {

    $(document).ready(function(){
        $('.remove_rows').on('click', function(){
            var productId = $(this).data('id');

            Swal.fire({
                title: "คุณแน่ใจหรือไม่?",
                text: "สินค้าจะถูกลบออกจากตะกร้า",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "ใช่, ลบเลย!",
                cancelButtonText: "ยกเลิก"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post('addcart_process.php', { remove_onclick: true, product_id: productId }, function(response) {
                        if ($.trim(response) === 'success') {
                            Swal.fire({
                                title: "ลบสำเร็จ!",
                                text: "สินค้าได้ถูกลบออกจากตะกร้าแล้ว",
                                icon: "success",
                                timer: 1500,
                                showConfirmButton: false
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire("เกิดข้อผิดพลาด", "ไม่สามารถลบสินค้าได้", "error");
                        }
                    }).fail(function(xhr, status, error) {
                        Swal.fire("เกิดข้อผิดพลาด", error, "error");
                    });
                }
            });
        });
    });


    var selectedItems = [];
    updateTotalPrice(selectedItems);
    $('.check_select_item').on('change', function () {
        var productId = $(this).val();
        if ($(this).is(':checked')) {
            selectedItems.push(productId);
        } else {
            selectedItems = selectedItems.filter(id => id !== productId);
        }

        console.log("Selected Products:", selectedItems);
        updateTotalPrice(selectedItems);
    });

    function updateTotalPrice(selectedItems) {

        $.ajax({
            url: 'get_total_price.php',
            type: 'POST',
            data: { selected_products: selectedItems },
            success: function (response) {
                console.log(response)
                $('.total_price').text('Total Price: ' + new Intl.NumberFormat().format(response) + ' ฿');
            },
            error: function () {
                console.error('เกิดข้อผิดพลาดในการดึงข้อมูลราคา');
            }
        });
    }

    $.ajax({
        url: 'buy_process.php',
        type: 'post',
        data:{
            get_session_ship: true
        },
        success: function(response_sess){
            if(response_sess == 'success'){
                $('.buy_button').css({
                    "background": "#07a74f",
                    "cursor": "pointer"
                })
            }
        }
    })

    $('.buy_button').on('click', function() {
        if (selectedItems.length === 0) {
            Swal.fire({
                icon: "warning",
                title: "กรุณาเลือกสินค้า!",
                text: "โปรดเลือกสินค้าก่อนทำการซื้อ",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "ตกลง"
            });
            return;
        }

        Swal.fire({
            title: "ยืนยันการสั่งซื้อ?",
            text: "คุณต้องการซื้อสินค้าที่เลือกไว้หรือไม่?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#28a745",
            cancelButtonColor: "#d33",
            confirmButtonText: "ซื้อเลย!",
            cancelButtonText: "ยกเลิก"
        }).then((result) => {
            if (result.isConfirmed) {
                $.post('buy_process.php', { selected_products: selectedItems }, function(response) {
                    console.log("Server Response:", response);
                    Swal.fire({
                        title: "สั่งซื้อสำเร็จ!",
                        text: "ขอบคุณที่สั่งซื้อสินค้า",
                        icon: "success",
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        location.reload();
                    });
                }).fail(function(xhr, status, error) {
                    Swal.fire("เกิดข้อผิดพลาด", error, "error");
                });
            }
        });
    });


    $("#add_address_button").on("click", function () {
        $("#modal_Shipping_information_background").css("visibility", "visible");
        setTimeout(() => {
            $("#modal_Shipping_information_background").css("opacity", "1");
            $("#modal_location_delivery, #modal_tax_invoice").css("display", "block");
        }, 10);
    });
    
    $(".close_modal_shipping").on("click", function () {
        $("#modal_Shipping_information_background").css("opacity", "0");
        $("#modal_location_delivery, #modal_tax_invoice").css("display", "none");
    
        setTimeout(() => {
            $("#modal_Shipping_information_background").css("visibility", "hidden");
        }, 500);
    });
    
    $(".change_modal_between_delivery_and_tax").on("click", function () {
        let isLocationVisible = $("#modal_location_delivery").css("transform") === "matrix(1, 0, 0, 1, 0, 0)";
    
        if (isLocationVisible) {
            $("#modal_location_delivery").css({
                "transform": "translateX(285%)",
                "opacity": "0",
                "visibility": "hidden"
            });

            $("#modal_tax_invoice").css({
                "transform": "translateX(186%)",
                "opacity": "1",
                "visibility": "visible"
            });

        } else {
            $("#modal_tax_invoice").css({
                "transform": "translateX(-120%)",
                "opacity": "0",
                "visibility": "hidden"
            });
    
            $("#modal_location_delivery").css({
                "transform": "translateX(0%)",
                "opacity": "1",
                "visibility": "visible"
            });
        }
    });
})
