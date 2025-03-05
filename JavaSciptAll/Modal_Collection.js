// Modal Collection
let modal_collection = document.getElementById('modal_collection');
let open_modal_collection = document.getElementById('open_collection');

open_modal_collection.onclick = function(){
    modal_collection.style.display = 'flex';

}

modal_collection.onclick = function(){
    modal_collection.style.display = 'none';
}

$(document).ready(function() {
    $.ajax({
        url: 'addcart_process.php',
        type: 'post',
        data: {
            count_product: true
        },
        success: function(responseStatus) {
            if(responseStatus == 'error'){
                return;
            }
            else{
                let data = JSON.parse(responseStatus);
                $('.count_cart').text(data.count_status_cart);
                $('.count_cart').css({
                    'font-size': '10px',
                    'border-radius': '50%',
                    'background-color': '#e4730f',
                    'padding': '0 5px'
                });
            }
        }
    });
});