$(document).ready(function(){

  $(".btn-delete-recipe").on('click', function(e){

    var id = $(this).data('recipe-id');
    $("#recipe-id-delete").val(id);
    $("#modal-recipe-delete").modal('show');

  });

  $(".btn-recipe-delete-confirm").on('click', function(e){

    var id  = $("#recipe-id-delete").val();
    var url = $("#url-delete-recipe").val();
    url     = url.replace(':id', id);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'delete',
        url : url,
        dataType: 'json',
        success: function (response) {
          $("#row-"+id).fadeOut();
          $("#modal-recipe-delete").modal('hide');
        },
        error: function (error) {
            console.log(error);
        }
    });

  });

});