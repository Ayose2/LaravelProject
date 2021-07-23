$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

$(document).ready(function(){
    $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#list li").filter(function() {
            if (!$(this).find('.nombre-producto').text().toLowerCase().indexOf(value) > -1) {
                $(this).attr('style','display:none !important');
            }
          $(this).toggle($(this).find('.nombre-producto').text().toLowerCase().indexOf(value) > -1)
        });
      });

    setTimeout(function() {
          $("#info-message").fadeOut();
    }, 5000);
});

function eliminarProducto(id)
{
    $('#error-remove-producto').hide();
    $('#submit-remove-button').attr('data-producto',id);
    $('#remove-product-modal').modal('show');
}

function submitEliminarProducto()
{
    var id = $('#submit-remove-button').attr('data-producto');
    $.post("/producto/remove", {id: id}, function(result){
        if (result) {
            $('#error-remove-producto').hide();
            $('#remove-product-modal').modal('hide');
            location.reload();
        } else {
            $('#error-remove-producto').show();
            $('#toast-content-remove-producto').text('Hubo un error al borrar el producto, el producto no ha sido eliminado');
        }
    });
}