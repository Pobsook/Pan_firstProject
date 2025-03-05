let input_select = document.getElementsByClassName("input_product");
let product_section = document.getElementsByClassName("product_section");

for (let n = 0; n < input_select.length; n++) {
    input_select[n].onclick = function () {
        for (let i = 0; i < product_section.length; i++) {
            product_section[i].style.display = "none";
        }
        product_section[n].style.display = "block";
    };
}

function search() {
    $(document).ready(function(){
        $.ajax({
            url: 'search_process.php',
            type: 'POST',
            data: {
                search_item: true,
                type_search: $('.type_search').val(),
                key_search: $('.key_search').val()
            },
            success: function(response) {
                console.log(response); 

                if (typeof response === "object") {
                    let $data = response;

                    let html = '';

                    if($data.type == 'model') {
                        $.each($data.item, function(index, item) {
                            html += `
                                <tr>
                                    <td>${index + 1}
                                        <input class="id_${item.id_model}" type="hidden" value="${item.id_model}">
                                        <input class="type_edit_${item.id_model}" type="hidden" value="model">
                                    </td>
                                    <td><input type="text" class="name_${item.id_model}" value="${item.model_name}"></td>
                                    <td><input type="text" class="type_${item.id_model}" value="${item.product_type}"></td>
                                    <td><input type="text" class="detail_${item.id_model}" value="${item.model_detail}"></td>
                                    <td>
                                        <div>
                                            <img src="PicZedere/upload_model_img/${item.model_img}" alt="${item.model_name}" width="50px" height="50px">
                                            <input type="file" class="img_input_${item.id_model}" accept="image/png, image/jpg, image/jpeg">
                                        </div>
                                    </td>
                                    <td class="action-buttons">
                                        <button onclick="edit(${item.id_model}, this)">Edit</button>
                                        <button onclick="deleteItem(${item.id_model})">Delete</button>
                                    </td>
                                </tr>
                            `;
                        });
                    } 
                    else if($data.type == 'description') {
                        $.each($data.item, function(index, item) {
                            html += `
                                <tr>
                                    <td>${index + 1}
                                        <input class="id_${item.id_description}" type="hidden" value="${item.id_description}">
                                        <input class="type_edit_${item.id_description}" type="hidden" value="description">
                                    </td>
                                    <td><input type="text" class="name_${item.id_description}" value="${item.description_name}"></td>
                                    <td><input type="text" class="type_${item.id_description}" value="${item.description_type}"></td>
                                    <td><input type="text" class="detail_${item.id_description}" value="${item.description_detail}"></td>
                                    <td>
                                        <div>
                                            <img src="PicZedere/upload_description_img/${item.description_img}" alt="${item.description_name}" width="50px" height="50px">
                                            <input type="file" class="img_input_${item.id_description}" accept="image/png, image/jpg, image/jpeg">
                                        </div>
                                    </td>
                                    <td class="action-buttons">
                                        <button onclick="edit(${item.id_description}, this)">Edit</button>
                                        <button onclick="deleteItem(${item.id_description})">Delete</button>
                                    </td>
                                </tr>
                            `;
                        });
                    }
                    else if ($data.type == 'upholstery') {
                        $.each($data.item, function(index, item) {
                            html += `
                                <tr>
                                    <td>${index + 1}
                                        <input class="id_${item.id_upholstery}" type="hidden" value="${item.id_upholstery}">
                                        <input class="type_edit" type="hidden" value="upholstery">
                                    </td>
                                    <td><input type="text" class="name_${item.id_upholstery}" value="${item.upholstery_color_name}"></td>
                                    <td><input type="text" class="type_${item.id_upholstery}" value="${item.upholstery_color_type}"></td>
                                    <td><input type="text" class="detail_${item.id_upholstery}" value="${item.upholstery_color_detail}"></td>
                                    <td>
                                        <div>
                                            <img src="PicZedere/upload_upholstery_color_img/${item.upholstery_color_img}" alt="${item.upholstery_color_name}" width="50px" height="50px">
                                            <input type="file" class="img_input_${item.id_upholstery}" accept="image/png, image/jpg, image/jpeg">
                                        </div>
                                    </td>
                                    <td class="action-buttons">
                                        <button onclick="edit(${item.id_upholstery}, this)">Edit</button>
                                        <button onclick="deleteItem(${item.id_upholstery})">Delete</button>
                                    </td>
                                </tr>
                            `;
                        });
                    }

                    $('#result_table tbody').html(html);  
                } else {
                    console.error('Invalid response format');
                    alert("เกิดข้อผิดพลาดในการแปลงข้อมูล JSON");
                }
            },
            error: function(xhr, status, error){
                console.error('AJAX Error: ' + status + ': ' + error);
                alert("เกิดข้อผิดพลาดในการส่งคำขอ AJAX");
            }
        });
    });
}

function edit(id, button) {
    let row = button.closest("tr");
    let fileInput = row.querySelector(`.img_input_${id}`);
    let file_img = fileInput.files[0];

    let name = row.querySelector(`.name_${id}`).value;
    let type = row.querySelector(`.type_${id}`).value;
    let detail = row.querySelector(`.detail_${id}`).value;
    let type_edit = document.querySelector('.type_search').value;

    if (file_img && !['image/png', 'image/jpg', 'image/jpeg'].includes(file_img.type)) {
        alert("โปรดเลือกไฟล์ภาพที่เป็น .png, .jpg หรือ .jpeg เท่านั้น");
        return;
    }

    if (file_img && file_img.size > 5000000) {
        alert("ขนาดไฟล์ต้องไม่เกิน 5MB");
        return;
    }

    let formData = new FormData();
    formData.append('edit_onclick', true);
    formData.append('type_edit', type_edit);
    formData.append('id', id);
    formData.append('name', name);
    formData.append('type', type);
    formData.append('detail', detail);

    if (file_img) {
        formData.append('file_img', file_img);
    }

    $.ajax({
        url: 'edit_process.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) { 
            console.log(response);
            if(response === 'success') {
                alert("ข้อมูลถูกอัพเดตสำเร็จ");
                search()
            } else {
                alert("เกิดข้อผิดพลาดในการอัพเดตข้อมูล");
            }
        },
        error: function(xhr, status, error) { 
            console.error('Error uploading file: ' + status + ': ' + error);
            alert("เกิดข้อผิดพลาดในการส่งคำขอ AJAX");
        }
    });
}

function deleteItem(deleteId) {
    try {
        let isConfirmed = confirm("ยืนยันการลบข้อมูล?");
        if (isConfirmed) {
            let type_edit = document.querySelector('.type_search').value;

            $.ajax({
                type: 'post',
                url: 'delete_process.php',
                data: {
                    type_edit: type_edit,
                    Iditem: deleteId,
                },
                success: function(response) {
                    if(response.trim() === 'success') {
                        alert("ทำการลบข้อมูลแล้ว");
                        search();
                    } else {
                        alert("เกิดข้อผิดพลาดในการลบข้อมูล");
                        search();
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error deleting item:', status, error);
                    alert("เกิดข้อผิดพลาดในการลบข้อมูล");
                }
            });
        }
    } catch (error) {
        console.error("Error in delete function:", error);
        alert("เกิดข้อผิดพลาดในการลบข้อมูล");
    }
}


