$(function () {
    $('.invalid-feedback').hide();
    $('#almacen').selectpicker({
        noneSelectedText: 'Seleccione almacen',
        noneResultsText: 'Sin resultados'
      });

    $('#categoria').selectpicker({
        noneSelectedText: 'Seleccione categoria',
        noneResultsText: 'Sin resultados'
    });
    
});

$(document).on('click', 'form button[type=submit]', function(e) {
    e.preventDefault();
    $('.invalid-feedback').hide();
    var isValid = true;

    if ($('#nombre').val() == '' || $('#nombre').val().length < 3) {
        showError('nombre');
        isValid = false;
    }

    if ($('#precio').val() == '') {
        showError('precio');
        isValid = false;
    }

    if ($('#observaciones').val() == '') {
        showError('observaciones');
        isValid = false;
    }

    if ($('#categoria').val().length == 0) {
        showError('categoria');
        isValid = false;
    }

    if ($('#almacen').val().length == 0) {
        showError('almacen');
        isValid = false;
    }

    if (isValid) {
        $( "#form-producto" ).submit();
    }

});

