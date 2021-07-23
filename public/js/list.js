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
});