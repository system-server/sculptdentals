$(document).ready(function() {

  $(".btn-quote-add").on('click', function(){
    $("#form-editor").show();
    $("#quote-table").hide();
  });

  $(".btn-quote-cancel").on('click', function(e){
    e.preventDefault();
    $("#form-editor").hide();
    $("#quote-table").show();
  });  

  $(".btn-quote-save").on('click', function(e){
    //e.preventDefault();
    //var data = $("#form-editor").serializeArray();
    //console.log(data);
  });

});