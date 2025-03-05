$(document).ready(function(){
    $('.remove_rows').on('click', function(){
        var productId = $(this).data('id');
        $.ajax({
            url: 'addcart_process.php',
            type: 'POST',
            data: {
                remove_onclick: true,
                product_id: productId
            },
            success: function(response) {
                if (response === 'success') {
                    window.location.reload();  
                } else {
                    alert('Error: Unable to remove item');
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + error);
            }
        });
    });
});
