document.addEventListener("DOMContentLoaded", function() {

    // Recliner Sofa
    let select_recliner_sofa = document.getElementById('select_recliner_sofa');
    let modal_recliner_sofa = document.getElementById('modal_recliner_sofa');
    let close_modal_recliner_sofa = document.getElementById('close_modal_recliner_sofa');

    select_recliner_sofa.onclick = function () {
        modal_recliner_sofa.style.display = 'block';
    }
    close_modal_recliner_sofa.onclick = function () {
        modal_recliner_sofa.style.display = 'none';
    }

    // Sofa Fix
    let select_sofa_fix = document.getElementById('select_sofa_fix');
    let modal_sofa_fix = document.getElementById('modal_sofa_fix');
    let close_modal_sofa_fix = document.getElementById('close_modal_sofa_fix');

    select_sofa_fix.onclick = function () {
        modal_sofa_fix.style.display = 'block';
    }
    close_modal_sofa_fix.onclick = function () {
        modal_sofa_fix.style.display = 'none';
    }

    // Motor Sofa
    let select_motor_sofa = document.getElementById('select_motor_sofa');
    let modal_motor_sofa = document.getElementById('modal_motor_sofa');
    let close_modal_motor_sofa = document.getElementById('close_modal_motor_sofa');

    select_motor_sofa.onclick = function () {
        modal_motor_sofa.style.display = 'block';
    }
    close_modal_motor_sofa.onclick = function () {
        modal_motor_sofa.style.display = 'none';
    }

    function ajax_mix() {
        $.ajax({
            url: 'select_product_process.php',
            type: 'post',
            data: { get_session_data: true },
            success: function(sessionResponse) {
                let data = JSON.parse(sessionResponse);

                // Recliner Sofa (RS)
                $('#upholstery_rs_selected').text('Upholstery Color : ' + data.upholstery_rs);
                $('#description_rs_selected').text('Description : ' + data.description_rs);
                $('#model_rs_selected').text('Model : ' + data.model_rs);
                $('.quantity_rs').text('จำนวน : ' + data.quantity_rs + ' ชิ้น');

                $('.btn_show_description_recliner_sofa[data-description="' + data.description_rs + '"]').addClass('select_this_item');
                $('.btn_show_upholstery_rs[data-upholstery="' + data.upholstery_rs + '"]').addClass('select_this_item');

                // Sofa Fix (SF)
                $('#upholstery_sf_selected').text('Upholstery Color : ' + data.upholstery_sf);
                $('#description_sf_selected').text('Description : ' + data.description_sf);
                $('#model_sf_selected').text('Model : ' + data.model_sf);
                $('.quantity_sf').text('จำนวน : ' + data.quantity_sf + ' ชิ้น');

                $('.btn_show_description_sofa_fix[data-description="' + data.description_sf + '"]').addClass('select_this_item');
                $('.btn_show_upholstery_sf[data-upholstery="' + data.upholstery_sf + '"]').addClass('select_this_item');

                // Motor Sofa (MS)
                $('#upholstery_ms_selected').text('Upholstery Color : ' + data.upholstery_ms);
                $('#description_ms_selected').text('Description : ' + data.description_ms);
                $('#model_ms_selected').text('Model : ' + data.model_ms);
                $('.quantity_ms').text('จำนวน : ' + data.quantity_ms + ' ชิ้น');

                $('.btn_show_description_motor_sofa[data-description="' + data.description_ms + '"]').addClass('select_this_item');
                $('.btn_show_upholstery_ms[data-upholstery="' + data.upholstery_ms + '"]').addClass('select_this_item');

                // เช็คว่ามีการเลือก description แล้วจึงดึงราคา
                if (data.description_rs || data.description_sf || data.description_ms) {
                    $.ajax({
                        url: 'price_product_process2.php',
                        type: 'post',
                        data: {
                            get_price: true,
                            description_rs: data.description_rs,
                            upholstery_rs: data.upholstery_rs,
                            description_sf: data.description_sf,
                            upholstery_sf: data.upholstery_sf,
                            description_ms: data.description_ms,
                            upholstery_ms: data.upholstery_ms,
                        },
                        success: function(priceResponse) {
                            let dataPrice = JSON.parse(priceResponse);
                            $('.price_rs').text('ราคา : ' + Math.round(dataPrice.price_rs) + ' บาท');
                            $('.price_sf').text('ราคา : ' + Math.round(dataPrice.price_sf) + ' บาท');
                            $('.price_ms').text('ราคา : ' + Math.round(dataPrice.price_ms) + ' บาท');
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

    window.addquantity_rs = function(n) {
        $.ajax({
            url: 'select_product_process.php',
            type: 'post',
            data: { get_session_data: true },
            success: function(response) {
                let data = JSON.parse(response);
                let quantity = parseInt(data.quantity_rs) || 1;
                
                quantity += n;
                if (quantity < 1) quantity = 1;
    
                $.ajax({
                    url: 'select_product_process.php',
                    type: 'post',
                    data: { quantityIndex_rs: quantity },
                    success: function(saveResponse) {
                        if (saveResponse == 'เก็บข้อมูลสำเร็จ') {
                            ajax_mix();
                        }
                    }
                });
            }
        });
    }
    
    window.addquantity_sf = function(n) {
        $.ajax({
            url: 'select_product_process.php',
            type: 'post',
            data: { get_session_data: true },
            success: function(response) {
                let data = JSON.parse(response);
                let quantity = parseInt(data.quantity_sf) || 1;
    
                console.log("จำนวนเก่า SF:", quantity);
                quantity += n;
                if (quantity < 1) quantity = 1;
                console.log("จำนวนใหม่ SF:", quantity);
    
                $.ajax({
                    url: 'select_product_process.php',
                    type: 'post',
                    data: { quantityIndex_sf: quantity },
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
    
    window.addquantity_ms = function(n) {
        $.ajax({
            url: 'select_product_process.php',
            type: 'post',
            data: { get_session_data: true },
            success: function(response) {
                let data = JSON.parse(response);
                let quantity = parseInt(data.quantity_ms) || 1;
    
                console.log("จำนวนเก่า MS:", quantity);
                quantity += n;
                if (quantity < 1) quantity = 1;
                console.log("จำนวนใหม่ MS:", quantity);
    
                $.ajax({
                    url: 'select_product_process.php',
                    type: 'post',
                    data: { quantityIndex_ms: quantity },
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
    
    let slideIndexRS = 1;
    let slideIndexSF = 1;
    let slideIndexMS = 1;
    
    window.plusSlidesRS = function(n) {
        let slidesRS = document.getElementsByClassName('img_and_slideshow_rs');
        slideIndexRS = parseInt(slideIndexRS, 10);
        slideIndexRS += parseInt(n, 10);
    
        if (slideIndexRS > slidesRS.length) {
            slideIndexRS = 1;
        } else if (slideIndexRS < 1) {
            slideIndexRS = slidesRS.length;
        }
        showSlideRS(slideIndexRS);
    };
    
    window.plusSlidesSF = function(n) {
        let slidesSF = document.getElementsByClassName('img_and_slideshow_sf');
        slideIndexSF = parseInt(slideIndexSF, 10);
        slideIndexSF += parseInt(n, 10);
    
        if (slideIndexSF > slidesSF.length) {
            slideIndexSF = 1;
        } else if (slideIndexSF < 1) {
            slideIndexSF = slidesSF.length;
        }
        showSlideSF(slideIndexSF);
    };
    
    window.plusSlidesMS = function(n) {
        let slidesMS = document.getElementsByClassName('img_and_slideshow_ms');
        slideIndexMS = parseInt(slideIndexMS, 10);
        slideIndexMS += parseInt(n, 10);
    
        if (slideIndexMS > slidesMS.length) {
            slideIndexMS = 1;
        } else if (slideIndexMS < 1) {
            slideIndexMS = slidesMS.length;
        }
        showSlideMS(slideIndexMS);
    };
    
    function showSlideRS(n) {
        let slidesRS = document.getElementsByClassName('img_and_slideshow_rs');
        n = parseInt(n, 10);
        
        for (let i = 0; i < slidesRS.length; i++) {
            slidesRS[i].style.display = 'none';
        }
    
        let currentSlide = slidesRS[n - 1];
        currentSlide.style.display = 'block';
        let modelName = currentSlide.querySelector('.name_model')?.getAttribute('data-model');
    
        $.ajax({
            url: 'select_product_process.php',
            type: 'post',
            data: {
                select_model_rs: modelName,
                slideIndexRS: n,
            },
            success: function() {
                ajax_mix();
            }
        });
    }
    
    function showSlideSF(n) {
        let slidesSF = document.getElementsByClassName('img_and_slideshow_sf');
        n = parseInt(n, 10);
        
        for (let i = 0; i < slidesSF.length; i++) {
            slidesSF[i].style.display = 'none';
        }
    
        let currentSlide = slidesSF[n - 1];
        currentSlide.style.display = 'block';
        let modelName = currentSlide.querySelector('.name_model')?.getAttribute('data-model');
    
        $.ajax({
            url: 'select_product_process.php',
            type: 'post',
            data: {
                select_model_sf: modelName,
                slideIndexSF: n,
            },
            success: function() {
                ajax_mix();
            }
        });
    }
    
    function showSlideMS(n) {
        let slidesMS = document.getElementsByClassName('img_and_slideshow_ms');
        n = parseInt(n, 10);
        
        for (let i = 0; i < slidesMS.length; i++) {
            slidesMS[i].style.display = 'none';
        }
    
        let currentSlide = slidesMS[n - 1];
        currentSlide.style.display = 'block';
        let modelName = currentSlide.querySelector('.name_model')?.getAttribute('data-model');
    
        $.ajax({
            url: 'select_product_process.php',
            type: 'post',
            data: {
                select_model_ms: modelName,
                slideIndexMS: n,
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
    
                // Recliner Sofa (RS)
                $('#upholstery_rs_selected').text('Upholstery Color : ' + data.upholstery_rs);
                $('#description_rs_selected').text('Description : ' + data.description_rs);
                $('.quantity_rs').text('จำนวน : ' + data.quantity_rs + ' ชิ้น');
    
                $('.btn_show_description_recliner_sofa[data-description="' + data.description_rs + '"]').addClass('select_this_item');
                $('.btn_show_upholstery_rs[data-upholstery="' + data.upholstery_rs + '"]').addClass('select_this_item');
    
                quantityIndex_rs = data.quantity_rs;
                slideIndexRS = data.slideIndexRS;
                showSlideRS(slideIndexRS);
    
                // Sofa Fix (SF)
                $('#upholstery_sf_selected').text('Upholstery Color : ' + data.upholstery_sf);
                $('#description_sf_selected').text('Description : ' + data.description_sf);
                $('.quantity_sf').text('จำนวน : ' + data.quantity_sf + ' ชิ้น');
    
                $('.btn_show_description_sofa_fix[data-description="' + data.description_sf + '"]').addClass('select_this_item');
                $('.btn_show_upholstery_sf[data-upholstery="' + data.upholstery_sf + '"]').addClass('select_this_item');
    
                quantityIndex_sf = data.quantity_sf;
                slideIndexSF = data.slideIndexSF;
                showSlideSF(slideIndexSF);
    
                // Motor Sofa (MS)
                $('#upholstery_ms_selected').text('Upholstery Color : ' + data.upholstery_ms);
                $('#description_ms_selected').text('Description : ' + data.description_ms);
                $('.quantity_ms').text('จำนวน : ' + data.quantity_ms + ' ชิ้น');
    
                $('.btn_show_description_motor_sofa[data-description="' + data.description_ms + '"]').addClass('select_this_item');
                $('.btn_show_upholstery_ms[data-upholstery="' + data.upholstery_ms + '"]').addClass('select_this_item');
    
                quantityIndex_ms = data.quantity_ms;
                slideIndexMS = data.slideIndexMS;
                showSlideMS(slideIndexMS);
            },
        });
    });
    
    $(document).ready(function() {
        $('.btn_show_description_recliner_sofa').on('click', function() {
            let select_description_recliner_sofa = $(this).data("description");
            let btn = $(this);
            $.ajax({
                url: 'select_product_process.php',
                type: 'post',
                data: { select_description_rs: select_description_recliner_sofa },
                success: function(response) {
                    if(response == 'เก็บข้อมูลสำเร็จ') {
                        $('.btn_show_description_recliner_sofa').removeClass('select_this_item');
                        btn.addClass('select_this_item');
                        ajax_mix();
                    } else {
                        alert('เก็บข้อมูลไม่สำเร็จ');
                    }
                }
            });
        });
    
        $('.btn_show_description_sofa_fix').on('click', function() {
            let select_description_sofa_fix = $(this).data("description");
            let btn = $(this);
            $.ajax({
                url: 'select_product_process.php',
                type: 'post',
                data: { select_description_sf: select_description_sofa_fix },
                success: function(response) {
                    if(response == 'เก็บข้อมูลสำเร็จ') {
                        $('.btn_show_description_sofa_fix').removeClass('select_this_item');
                        btn.addClass('select_this_item');
                        ajax_mix();
                    } else {
                        alert('เก็บข้อมูลไม่สำเร็จ');
                    }
                }
            });
        });
    
        $('.btn_show_description_motor_sofa').on('click', function() {
            let select_description_motor_sofa = $(this).data("description");
            let btn = $(this);
            $.ajax({
                url: 'select_product_process.php',
                type: 'post',
                data: { select_description_ms: select_description_motor_sofa },
                success: function(response) {
                    if(response == 'เก็บข้อมูลสำเร็จ') {
                        $('.btn_show_description_motor_sofa').removeClass('select_this_item');
                        btn.addClass('select_this_item');
                        ajax_mix();
                    } else {
                        alert('เก็บข้อมูลไม่สำเร็จ');
                    }
                }
            });
        });
    
        $('.btn_show_upholstery_rs').on('click', function() {
            let select_upholstery_rs = $(this).data("upholstery");
            let btn = $(this);
            $.ajax({
                url: 'select_product_process.php',
                type: 'post',
                data: { select_upholstery_rs: select_upholstery_rs },
                success: function(response) {
                    if(response == 'เก็บข้อมูลสำเร็จ') {
                        $('.btn_show_upholstery_rs').removeClass('select_this_item');
                        btn.addClass('select_this_item');
                        ajax_mix();
                    } else {
                        alert('เก็บข้อมูลไม่สำเร็จ');
                    }
                }
            });
        });
    
        $('.btn_show_upholstery_sf').on('click', function() {
            let select_upholstery_sf = $(this).data("upholstery");
            let btn = $(this);
            $.ajax({
                url: 'select_product_process.php',
                type: 'post',
                data: { select_upholstery_sf: select_upholstery_sf },
                success: function(response) {
                    if(response == 'เก็บข้อมูลสำเร็จ') {
                        $('.btn_show_upholstery_sf').removeClass('select_this_item');
                        btn.addClass('select_this_item');
                        ajax_mix();
                    } else {
                        alert('เก็บข้อมูลไม่สำเร็จ');
                    }
                }
            });
        });
    
        $('.btn_show_upholstery_ms').on('click', function() {
            let select_upholstery_ms = $(this).data("upholstery");
            let btn = $(this);
            $.ajax({
                url: 'select_product_process.php',
                type: 'post',
                data: { select_upholstery_ms: select_upholstery_ms },
                success: function(response) {
                    if(response == 'เก็บข้อมูลสำเร็จ') {
                        $('.btn_show_upholstery_ms').removeClass('select_this_item');
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
