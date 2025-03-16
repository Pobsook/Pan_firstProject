document.addEventListener("DOMContentLoaded", function() {

    let select_recliner_chair = document.getElementById('select_recliner_chair');
    let Madal_recliner_chair = document.getElementById('Madal_recliner_chair');
    let close_modal_recliner_chair = document.getElementById('close_modal_recliner_chair');

    select_recliner_chair.onclick = function () {
        Madal_recliner_chair.style.display = 'block';
    }

    close_modal_recliner_chair.onclick = function () {
        Madal_recliner_chair.style.display = 'none';
    }

    let selectOfficeChair = document.getElementById('select_office_chair');
    let modalOfficeChair = document.getElementById('modal_office_chair');
    let closeModalOfficeChair = document.getElementById('close_modal_office_chair');

    selectOfficeChair.onclick =  function(){
        modalOfficeChair.style.display = 'block';
    }
    closeModalOfficeChair.onclick =  function(){
        modalOfficeChair.style.display = 'none';
    }

    let selectmotorChair = document.getElementById('select_motor_chair');
    let modalmotorChair = document.getElementById('modal_motor_chair');
    let closeModalmotorChair = document.getElementById('close_modal_motor_chair');


    selectmotorChair.onclick =  function(){
        modalmotorChair.style.display = 'block';
    }
    closeModalmotorChair.onclick =  function(){
        modalmotorChair.style.display = 'none';
    }

    function ajax_mix() {
        $.ajax({
            url: 'select_product_process.php',
            type: 'post',
            data: { get_session_data: true },
            success: function(sessionResponse) {
                let data = JSON.parse(sessionResponse);

                // Recliner Chair (RC)
                $('#upholstery_rc_selected').text('Upholstery Color : ' + data.upholstery_rc);
                $('#description_rc_selected').text('Description : ' + data.description_rc);
                $('#model_rc_selected').text('Model : ' + data.model_rc);
                $('.quantity_re_ch').text('จำนวน : ' + data.quantity_rc + ' ชิ้น');

                $('.btn_show_description_recliner_chair[data-description="' + data.description_rc + '"]').addClass('select_this_item');
                $('.btn_show_upholstery_rc[data-upholstery="' + data.upholstery_rc + '"]').addClass('select_this_item');

                // Office Chair (OC)
                $('#upholstery_oc_selected').text('Upholstery Color : ' + data.upholstery_oc);
                $('#description_oc_selected').text('Description : ' + data.description_oc);
                $('#model_oc_selected').text('Model : ' + data.model_oc);
                $('.quantity_oc').text('จำนวน : ' + data.quantity_oc + ' ชิ้น');

                $('.btn_show_description_office_chair[data-description="' + data.description_oc + '"]').addClass('select_this_item');
                $('.btn_show_upholstery_oc[data-upholstery="' + data.upholstery_oc + '"]').addClass('select_this_item');

                // Motor Chair (MC)
                $('#upholstery_mc_selected').text('Upholstery Color : ' + data.upholstery_mc);
                $('#description_mc_selected').text('Description : ' + data.description_mc);
                $('#model_mc_selected').text('Model : ' + data.model_mc);
                $('.quantity_mc').text('จำนวน : ' + data.quantity_mc + ' ชิ้น');

                $('.btn_show_description_motor_chair[data-description="' + data.description_mc + '"]').addClass('select_this_item');
                $('.btn_show_upholstery_mc[data-upholstery="' + data.upholstery_mc + '"]').addClass('select_this_item');

                // เช็คว่ามีการเลือก description แล้วจึงดึงราคา
                if (data.description_rc || data.description_oc || data.description_mc) {
                    $.ajax({
                        url: 'price_product_process.php',
                        type: 'post',
                        data: {
                            get_price: true,
                            description_rc: data.description_rc,
                            upholstery_rc: data.upholstery_rc,
                            description_oc: data.description_oc,
                            upholstery_oc: data.upholstery_oc,
                            description_mc: data.description_mc,
                            upholstery_mc: data.upholstery_mc,
                        },
                        success: function(priceResponse) {
                            let dataPrice = JSON.parse(priceResponse);
                            $('.price_rc').text('ราคา : ' + Math.round(dataPrice.price_rc) + ' บาท');
                            $('.price_oc').text('ราคา : ' + Math.round(dataPrice.price_oc) + ' บาท');
                            $('.price_mc').text('ราคา : ' + Math.round(dataPrice.price_mc) + ' บาท');
                        },
                        error: function() {
                            alert('ไม่สามารถคำนวณราคาได้');
                        }
                    });
                }
            },
            error: function() {
                alert('ไม่สามารถโหลดข้อมูลได้');
            }
        });
    }


    window.addquantity_re_cha = function(n) {
        $.ajax({
            url: 'select_product_process.php',
            type: 'post',
            data: { get_session_data: true },
            success: function(response) {
                let data = JSON.parse(response);
                let quantity = parseInt(data.quantity_rc) || 1;

                console.log("จำนวนเก่า RC:", quantity);
                quantity += n;
                if (quantity < 1) quantity = 1;
                console.log("จำนวนใหม่ RC:", quantity);

                $.ajax({
                    url: 'select_product_process.php',
                    type: 'post',
                    data: { quantityIndex_re_ch: quantity },
                    success: function(saveResponse) {
                        console.log("ผลลัพธ์จาก PHP:", saveResponse);
                        if (saveResponse == 'เก็บข้อมูลสำเร็จ') {
                            ajax_mix();
                        }
                    }
                });
            }
        });
    }

    window.addquantity_oc = function(n)  {
        $.ajax({
            url: 'select_product_process.php',
            type: 'post',
            data: { get_session_data: true },
            success: function(response) {
                let data = JSON.parse(response);
                let quantity = parseInt(data.quantity_oc) || 1;

                quantity += n;
                if (quantity < 1) quantity = 1;

                $.ajax({
                    url: 'select_product_process.php',
                    type: 'post',
                    data: { quantityIndex_oc: quantity },
                    success: function(saveResponse) {
                        console.log("ผลลัพธ์จาก PHP:", saveResponse);
                        if (saveResponse == 'เก็บข้อมูลสำเร็จ') {
                            ajax_mix();
                        }
                    }
                });
            }
        });
    }

    window.addquantity_mc = function(n)  {
        $.ajax({
            url: 'select_product_process.php',
            type: 'post',
            data: { get_session_data: true },
            success: function(response) {
                let data = JSON.parse(response);
                let quantity = parseInt(data.quantity_mc) || 1;

                quantity += n;
                if (quantity < 1) quantity = 1;

                $.ajax({
                    url: 'select_product_process.php',
                    type: 'post',
                    data: { quantityIndex_mc: quantity },
                    success: function(saveResponse) {
                        console.log("ผลลัพธ์จาก PHP:", saveResponse);
                        if (saveResponse == 'เก็บข้อมูลสำเร็จ') {
                            ajax_mix();
                        }
                    }
                });
            }
        });
    }


    let slideIndexRC = 1;
    let slideIndexOC = 1;

    window.plusSlidesRC = function(n) {
        slideIndexRC += n;
        showSlideRC(slideIndexRC);
    }

    window.plusSlidesOC = function(n) {
        slideIndexOC += n;
        showSlideOC(slideIndexOC);
    }

    function showSlideRC(n) {
        let slidesRC = document.getElementsByClassName('img_and_slideshow_re_ch');
        console.log(slidesRC.length);
        if (n > slidesRC.length) slideIndexRC = 1;
        if (n < 1) slideIndexRC = slidesRC.length;

        for (let i = 0; i < slidesRC.length; i++) {
            slidesRC[i].style.display = 'none';
        }
        slidesRC[slideIndexRC - 1].style.display = 'block';

        let modelName = slidesRC[slideIndexRC - 1].querySelector('.name_model').getAttribute('data-model');
        $.ajax({
            url: 'select_product_process.php',
            type: 'post',
            data: {
                select_model_rc: modelName,
                slideIndexRC: slideIndexRC,
            },
            success: function() {
                ajax_mix();
            }
        });
    }

    function showSlideOC(n) {
        let slidesOC = document.getElementsByClassName('img_and_slideshow_oc');
        if (n > slidesOC.length) slideIndexOC = 1;
        if (n < 1) slideIndexOC = slidesOC.length;

        for (let i = 0; i < slidesOC.length; i++) {
            slidesOC[i].style.display = 'none';
        }
        slidesOC[slideIndexOC - 1].style.display = 'block';

        let modelName = slidesOC[slideIndexOC - 1].querySelector('.name_model').getAttribute('data-model');
        $.ajax({
            url: 'select_product_process.php',
            type: 'post',
            data: {
                select_model_oc: modelName,
                slideIndexOC: slideIndexOC,
            },
            success: function() {
                ajax_mix();
            }
        });
    }

    let slideIndexMC = 1;

    window.plusSlidesMC = function(n)  {
        slideIndexMC += n;
        showSlideMC(slideIndexMC);
    }

    function showSlideMC(n) {
        let slidesMC = document.getElementsByClassName('img_and_slideshow_mc');
        if (n > slidesMC.length) slideIndexMC = 1;
        if (n < 1) slideIndexMC = slidesMC.length;
        
        for (let i = 0; i < slidesMC.length; i++) {
            slidesMC[i].style.display = 'none';
        }
        slidesMC[slideIndexMC - 1].style.display = 'block';

        let modelName = slidesMC[slideIndexMC - 1].querySelector('.name_model').getAttribute('data-model');
        $.ajax({
            url: 'select_product_process.php',
            type: 'post',
            data: {
                select_model_mc: modelName,
                slideIndexMC: slideIndexMC,
            },
            success: function() {
                ajax_mix();
            }
        });
    }

    $(document).ready(function () {
        $.ajax({
            url: 'select_product_process.php',
            type: 'post',
            data: { get_session_data: true },
            success: function (sessionResponse) {
                let data = JSON.parse(sessionResponse);

                // Recliner Chair (RC)
                $('#upholstery_rc_selected').text('Upholstery Color : ' + data.upholstery_rc);
                $('#description_rc_selected').text('Description : ' + data.description_rc);
                $('.quantity_re_ch').text('จำนวน : ' + data.quantity_rc + ' ชิ้น');

                $('.btn_show_description_recliner_chair[data-description="' + data.description_rc + '"]').addClass('select_this_item');
                $('.btn_show_upholstery_rc[data-upholstery="' + data.upholstery_rc + '"]').addClass('select_this_item');

                quantityIndex_re_cha  = data.quantity_rc;
                slideIndexRC = data.slideIndexRC;
                showSlideRC(slideIndexRC);

                // Office Chair (OC)
                $('#upholstery_oc_selected').text('Upholstery Color : ' + data.upholstery_oc);
                $('#description_oc_selected').text('Description : ' + data.description_oc);
                $('.quantity_oc').text('จำนวน : ' + data.quantity_oc + ' ชิ้น');

                $('.btn_show_description_office_chair[data-description="' + data.description_oc + '"]').addClass('select_this_item');
                $('.btn_show_upholstery_oc[data-upholstery="' + data.upholstery_oc + '"]').addClass('select_this_item');

                quantityIndex_oc = data.quantity_oc;
                slideIndexOC = data.slideIndexOC;
                showSlideOC(slideIndexOC);

                // Motor Chair (MC) 🆕
                $('#upholstery_mc_selected').text('Upholstery Color : ' + data.upholstery_mc);
                $('#description_mc_selected').text('Description : ' + data.description_mc);
                $('.quantity_mc').text('จำนวน : ' + data.quantity_mc + ' ชิ้น');

                $('.btn_show_description_motor_chair[data-description="' + data.description_mc + '"]').addClass('select_this_item');
                $('.btn_show_upholstery_mc[data-upholstery="' + data.upholstery_mc + '"]').addClass('select_this_item');

                quantityIndex_mc = data.quantity_mc;
                slideIndexMC = data.slideIndexMC;
                showSlideMC(slideIndexMC);
            },
        });
    });


    $(document).ready(function() {
        $('.btn_show_description_recliner_chair').on('click', function() {
            let select_description_recliner_chair = $(this).data("description");
            let btn = $(this);
            $.ajax({
                url: 'select_product_process.php',
                type: 'post',
                data: {
                    select_description_rc: select_description_recliner_chair
                },
                success: function(response) {
                    if(response == 'เก็บข้อมูลสำเร็จ') {
                        $('.btn_show_description_recliner_chair').removeClass('select_this_item');
                        btn.addClass('select_this_item');
                        ajax_mix();
                    } else {
                        alert('เก็บข้อมูลไม่สำเร็จ');
                    }
                }
            });
        });

        $('.btn_show_description_office_chair').on('click', function() {
            let select_description_office_chair = $(this).data("description");
            let btn = $(this);
            $.ajax({
                url: 'select_product_process.php',
                type: 'post',
                data: {
                    select_description_oc: select_description_office_chair
                },
                success: function(response) {
                    if(response == 'เก็บข้อมูลสำเร็จ') {
                        $('.btn_show_description_office_chair').removeClass('select_this_item');
                        btn.addClass('select_this_item');
                        ajax_mix();
                    } else {
                        alert('เก็บข้อมูลไม่สำเร็จ');
                    }
                }
            });
        });

        $('.btn_show_description_motor_chair').on('click', function() {
            let select_description_motor_chair = $(this).data("description");
            let btn = $(this);
            $.ajax({
                url: 'select_product_process.php',
                type: 'post',
                data: { select_description_mc: select_description_motor_chair },
                success: function(response) {
                    if(response == 'เก็บข้อมูลสำเร็จ') {
                        $('.btn_show_description_motor_chair').removeClass('select_this_item');
                        btn.addClass('select_this_item');
                    } else {
                        alert('เก็บข้อมูลไม่สำเร็จ');
                    }
                }
            });
        });
        
        $('.btn_show_upholstery_rc').on('click', function() {
            let select_upholstery_rc = $(this).data("upholstery");
            let btn = $(this);
            $.ajax({
                url: 'select_product_process.php',
                type: 'post',
                data: {
                    select_upholstery_rc: select_upholstery_rc
                },
                success: function(response) {
                    if(response == 'เก็บข้อมูลสำเร็จ') {
                        $('.btn_show_upholstery_rc').removeClass('select_this_item');
                        btn.addClass('select_this_item');
                        ajax_mix();
                    } else {
                        alert('เก็บข้อมูลไม่สำเร็จ');
                    }
                }
            });
        });

        $('.btn_show_upholstery_oc').on('click', function() {
            let select_upholstery_oc = $(this).data("upholstery");
            let btn = $(this);
            $.ajax({
                url: 'select_product_process.php',
                type: 'post',
                data: {
                    select_upholstery_oc: select_upholstery_oc
                },
                success: function(response) {
                    if(response == 'เก็บข้อมูลสำเร็จ') {
                        $('.btn_show_upholstery_oc').removeClass('select_this_item');
                        btn.addClass('select_this_item');
                        ajax_mix();
                    } else {
                        alert('เก็บข้อมูลไม่สำเร็จ');
                    }
                }
            });
        });

        $('.btn_show_upholstery_mc').on('click', function() {
            let select_upholstery_mc = $(this).data("upholstery");
            let btn = $(this);
            $.ajax({
                url: 'select_product_process.php',
                type: 'post',
                data: { select_upholstery_mc: select_upholstery_mc },
                success: function(response) {
                    if(response == 'เก็บข้อมูลสำเร็จ') {
                        $('.btn_show_upholstery_mc').removeClass('select_this_item');
                        btn.addClass('select_this_item');
                        ajax_mix();
                    } else {
                        alert('เก็บข้อมูลไม่สำเร็จ');
                    }
                }
            });
        });
    });

})
